<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function comments()
    {
        $comments = DB::table('comment')->get();
        return view('')->with(['comment' => $comments]);
    }

    public function delete_comment($id)
    {
        if (DB::table('comment')->find($id)->delete()) {
            session(['success' => 'حذف موفقیت امیز']);
            return view('');
        } else session(['error' => 'حذف موفقیت ناموفق']);
        return view('');
    }

    public function category()
    {
        $categories=DB::table('category')->get();
        return view('')->with(['categories'=>$categories]);
    }

    public function add_category(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        if ($category->save()){
            session(['success' => ' موفقیت امیز']);
            return view('');
        } else   session(['error' => 'مشکلی پیش امد']);
        return view('');
    }

    public function delete_category($id)
    {
        if (DB::table('category')->find($id)->delete()){
            session(['success' => 'حذف موفقیت امیز']);
            return view('');
        } else   session(['error' => 'حذف موفقیت ناموفق']);
        return view('');
    }

}
