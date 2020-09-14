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
    public function index()
    {
        return view('adminDashboard/index');
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
            ->join('rate', 'movie.id', '=', 'rate.movie_id')
            ->select('movie.*', DB::raw('AVG(rate.rate) as rate '))
            ->groupBy('movie.id')
            ->get();
        return view('index')->with(['movies' => $movies]);

    }

    public function detail($id)
    {
        $movie = DB::table('movie')
            ->join('rate', 'movie.id', '=', 'rate.movie_id')
            ->select('movie.*', DB::raw('AVG(rate.rate) as rate '))
            ->where('movie.id', $id)
            ->groupBy('movie.id')
            ->get();;
        $comments = DB::table('comment')->where('movie_id', $id)
            ->join('profile','comment.profile_id','=','profile.id')
            ->select('comment.comment as comment','profile.name as name')->get();
        return view('single')->with(['movie' => $movie, 'comments' => $comments]);
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'quality' => 'string',
            'language' => 'string',
            'janre' => 'string',
            'product' => 'string',
            'director' => 'string',
            'actors' => 'string',
            'summary' => 'string',
            'trailler' => 'string',
            'image' => 'string',
            'p_year' => 'int',
        ]);
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

        return view()->with(['movies' => $movies]);

    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'quality' => 'string',
            'language' => 'string',
            'janre' => 'string',
            'product' => 'string',
            'director' => 'string',
            'actors' => 'string',
            'summary' => 'string',
            'trailler' => 'string',
            'image' => 'string',
            'p_year' => 'int',
        ]);

        if (!$validator->fails()) {
            $movie = new Movie();
            $movie->language = $request->language;
            $movie->quality = $request->quality;
            $movie->actors = $request->actors;
            $movie->image = image_store($request->image);
            $movie->summary = $request->summary;
            $movie->p_year = $request->p_year;
            $movie->trailler = $request->trailler;
            $movie->director = $request->director;
            $movie->product = $request->product;
            $movie->name = $request->name;
            $movie->janre = $request->janre;
            \session(['success' => 'فیلم اضافه شد']);
            return view('');
        } else \session(['error' => 'خطا']);
        return view('');
    }

    public function delete($id)
    {
        if (DB::table('movie')->where('id', $id)->delete()) {
            \session(['success' => 'حذف موفقیت امیز بود']);
            return view('');
        } else
            \session(['error' => 'مشکلی پیش امد']);
        return view('');
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'quality' => 'string',
            'language' => 'string',
            'janre' => 'int',
            'product' => 'string',
            'director' => 'string',
            'actors' => 'string',
            'summary' => 'string',
            'trailler' => 'string',
            'image' => 'string',
            'p_year' => 'int',
            'id' => 'int',
        ]);

        if (!$validator->fails()) {
            $movie = DB::table('movie')->find($request->id);
            if ($request->language) {
                $language = $request->language;
            } else $language = $movie->language;
            if ($request->quality) {
                $quality = $request->quality;
            } else $quality = $movie->quality;

            if ($request->actors) {
                $actors = $request->actors;
            } else $actors = $movie->actors;
            if ($request->image) {
                $pic = $request->image;
                $destination = base_path() . '/public/img/';
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
            } else $trailler = $movie->trailler;
            if ($request->product) {
                $product = $request->product;
            } else $product = $movie->product;
            if ($request->name) {
                $name = $request->name;
            } else $name = $movie->name;
            if ($request->janre) {
                $janre = $request->janre;
            }
            if (DB::table('movie')->where('id', $request->id)->update([
                'name' => $name,
                'quality' => $quality,
                'language' => $language,
                'product' => $product,
                'director' => $director,
                'actors' => $actors,
                'summary' => $summary,
                'trailler' => $trailler,
                'image' => $image,
                'p_year' => $p_year,
                'janre' => $janre,


            ])) {
                \session(['success' => 'اپدیت موفقیت امیز']);
                return view('');
            }
            \session(['error' => 'مشکلی پیش امد']);
            return view('');
        }
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
