<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Movie_cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MongoDB\Driver\Session;
use function GuzzleHttp\Psr7\copy_to_string;

class MovieController extends Controller


{
    public function editHome()
    {
        return view('adminDashboard/homeEdit');
    }

    public function index()
    {
        $cats = DB::table('category')->get();
        return view('adminDashboard/index')->with(['cats' => $cats]);
    }

    public function category()
    {
        return view('adminDashboard/category');
    }

    public function comments()
    {
        return view('adminDashboard/comments');
    }


    public function editMovie()
    {
        return view('adminDashboard/editMovie');
    }

    public function all()
    {
        $movies = DB::table('movie')
            ->select('movie.id', 'movie.image', 'movie.name')
            ->get();
        return view('adminDashboard.allMovie')->with(['movies' => $movies]);

    }

    public function home()
    {
        $movies = DB::table('movie')->whereIn('status',[1,2,3,4,5,6,7,8,9])
            ->select('movie.id', 'movie.image', 'movie.name','movie.status as status')
            ->get();
        return view('/index')->with(['movies' => $movies]);


    }
    public function detail($id)
    {
        $movie = DB::table('movie')
            ->leftJoin('rate', 'movie.id', '=', 'rate.movie_id')
            ->select('movie.*', DB::raw('AVG(rate.rate) as rate '))
            ->where('movie.id', $id)
            ->groupBy('movie.id')
            ->get();;
        $comments = DB::table('comment')->where('movie_id', $id)
            ->join('profile', 'comment.profile_id', '=', 'profile.id')
            ->select('comment.comment as comment', 'profile.name as name')->get();
        return view('single')->with(['movie' => $movie, 'comments' => $comments]);
    }

    public function search_index()
    {
        $cats = DB::table('category')->get();
        $movies=null;
        return view('search')->with(['cats' => $cats,'movies'=>$movies]);
    }

    public function search_form(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'quality' => 'nullable|string',
            'language' => 'nullable|string',
            'janre' => 'nullable|string',
            'product' => 'nullable|string',
            'director' => 'nullable|string',
            'actors' => 'nullable|string',
            'summary' => 'nullable|string',
            'trailler' => 'nullable|string',
            'image' => 'nullable|string',
            'p_year' => 'nullable|int',
        ]);
        $cats = DB::table('category')->get();
        $name = $request->name;
        $janre = $request->janre;
        $id = $request->id;
        $director = $request->director;
        $actors = $request->actors;
        $summary = $request->summary;
        $movies = DB::table('movie')->join('rate', 'movie.id', '=', 'rate.movie_id')
            ->select('movie.*', DB::raw('AVG(rate.rate) as rate '))
            ->when($name, function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })->when($actors, function ($query, $actors) {
                return $query->where('actors', 'like', '%' . $actors . '%');
            })->when($summary, function ($query, $summary) {
                return $query->where('summary', 'like', '%' . $summary . '%');
            })->when($director, function ($query, $director) {
                return $query->where('director', 'like', '%' . $director . '%');
            })->when($janre, function ($query, $janre) {
                return $query->where('janre', 'like', '%' . $janre . '%');
            })->when($id, function ($query, $id) {
                return $query->where('movie.id', $id);
            })
            ->groupBy('movie.id')
            ->get();

        return view('search')->with(['movies' => $movies,'cats'=>$cats]);

    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'quality' => 'required|string',
            'language' => 'required|string',
            'janre' => 'required|array',
            'product' => 'required|string',
            'director' => 'required|string',
            'actors' => 'required|string',
            'summary' => 'required|string',
            'trailler' => 'required|string',
            'image' => 'required|image',
            'p_year' => 'required|int',
        ]);


        $movie = new Movie();
        $movie->language = $request->language;
        $movie->quality = $request->quality;
        $movie->actors = $request->actors;
        $image = $request->image;
        $destination = base_path() . '/public/images/';
        $filename = rand(111111111, 999999999) . '.' . $image->getClientOriginalExtension();
        $file = $image;
        $file->move($destination, $filename);
        $movie->image = $filename;
        $movie->summary = $request->summary;
        $movie->p_year = $request->p_year;
        $movie->trailler = $request->trailler;
        $movie->director = $request->director;
        $movie->product = $request->product;
        $movie->name = $request->name;
        $janre = $request->janre;
        $movie->janre = implode($janre, '.');
        if ($movie->save()) {
            \session(['success' => 'فیلم اضافه شد']);
            return "shod";
        } else \session(['error' => 'خطا']);
        return "kam";
    }

    public function delete($id)
    {
        if (DB::table('movie')->where('id', $id)->delete() && DB::table('comment')
                ->where('movie_id', $id)->delete() && DB::table('rate')->where('movie_id', $id)->delete()) {
            \session(['success' => 'حذف موفقیت امیز بود']);
            return redirect('dashboard/admin/all');
        } else
            \session(['error' => 'مشکلی پیش امد']);
        return redirect('dashboard/admin/all');
    }

    public function edit_index($id)
    {
        $movie=DB::table('movie')->find($id);
        $cats=DB::table('category')->get();
        return view('adminDashboard.editMoviePage')->with(['movie'=>$movie,'cats'=>$cats]);
    }

    public function edit_form(Request $request)
    {
        $request->validate([
            'name' => 'string|nullable',
            'quality' => 'string|nullable',
            'language' => 'string|nullable',
            'janre' => 'array|nullable',
            'product' => 'string|nullable',
            'director' => 'string|nullable',
            'actors' => 'string|nullable',
            'summary' => 'string|nullable',
            'trailler' => 'string|nullable',
            'image' => 'string|nullable',
            'p_year' => 'int|nullable',
            'id' => 'int|nullable',
        ]);
            $movie = DB::table('movie')->find($request->id);
        if ($request->language) {
            $language = $request->language;
        } else $language = $movie->language;


        if ($request->actors) {
            $actors = $request->actors;
        } else $actors = $movie->actors;
        if ($request->image) {
            $pic = $request->image;
            $destination = base_path() . '/public/images/';
            $filename = rand(111111111, 999999999) . '.' . $pic->getClientOriginalExtension();
            $file = $pic;
            $file->move($destination, $filename);
            $image = $filename;
        } else $pic = $movie->image;
        if ($request->summary) {
            $summary = $request->summary;
        } else $summary = $movie->summary;
        if ($request->p_year) {
            $p_year = $request->p_year;
        } else $p_year = $movie->p_year;
        if ($request->trailer) {
            $trailler = $request->trailer;
        } else$trailler = $movie->trailler;
        if ($request->director) {
            $director = $request->director;
        } else $director = $movie->director;
        if ($request->product) {
            $product = $request->product;
        } else $product = $movie->product;
        if ($request->name) {
            $name = $request->name;
        } else $name = $movie->name;
        if ($request->janre) {
            $janre = $request->janre;
            $janre=implode($janre,'.');
        }else $janre=$movie->janre;
        if (DB::table('movie')->where('id', $request->id)->update([
            'name' => $name,
            'language' => $language,
            'product' => $product,
            'director' => $director,
            'actors' => $actors,
            'summary' => $summary,
            'trailler' => $trailler,
            'image' => $pic,
            'p_year' => $p_year,
            'janre' => $janre,


        ])) {
            \session(['success' => 'اپدیت موفقیت امیز']);
            return redirect('dashboard/admin/detail'.$request->id);
        }
        \session(['error' => 'مشکلی پیش امد']);
        return redirect('dashboard/admin/editIndex'.$request->id);

    }

    public function pp(Request $request)
    {
        $p = $request->v;
        $p = implode(',', $p);
        dd($p);

    }

    public function test()
    {
//        \session(['p' => 'sddsdsd']);
        return view('test');
    }
}
