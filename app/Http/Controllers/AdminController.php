<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function detailMovie($id)
    {


        $movie = DB::table('movie')
            ->leftJoin('rate', 'movie.id', '=', 'rate.movie_id')
            ->select('movie.*', DB::raw('AVG(rate.rate) as rate '))
            ->where('movie.id', $id)
            ->groupBy('movie.id')
            ->get();;
        $comments = DB::table('comment')->where('movie_id', $id)
            ->join('profile', 'comment.profile_id', '=', 'profile.id')
            ->select('comment.*', 'profile.name as name')->get();
        return view('adminDashboard.single')->with(['movie' => $movie, 'comments' => $comments]);
    }


    public function comments()
    {
        $comments = DB::table('comment')->get();
        return view('')->with(['comment' => $comments]);
    }

    public function delete_comment($id)
    {

        $movie_id=DB::table('comment')->where('id',$id)->value('movie_id');

        if (DB::table('comment')->where('id',$id)->delete()) {
            session(['success' => 'حذف موفقیت امیز']);
            return redirect('dashboard/admin/detail'.$movie_id);
        } else session(['error' => 'حذف موفقیت ناموفق']);
        return redirect('dashboard/admin/detail'.$movie_id);
    }

    public function category()
    {
        $categories=DB::table('category')->get();
        return view('adminDashboard.category')->with(['categories'=>$categories]);
    }

    public function add_category(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        if ($category->save()){
            session(['success' => ' موفقیت امیز']);
            return redirect('dashboard/admin/category');
        } else   session(['error' => 'مشکلی پیش امد']);
        return view('');
    }

    public function deleteCategory($id)
    {
        if (DB::table('category')->where('id',$id)->delete()){
            session(['success' => 'حذف موفقیت امیز']);
            return redirect('dashboard/admin/category');
        } else   session(['error' => 'حذف موفقیت ناموفق']);
        return redirect('dashboard/admin/category');
    }
    public function changeSlider(Request $request){

    }



}
