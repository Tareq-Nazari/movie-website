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

        $movie_id = DB::table('comment')->where('id', $id)->value('movie_id');

        if (DB::table('comment')->where('id', $id)->delete()) {
            session(['success' => 'حذف موفقیت امیز']);
            return redirect('dashboard/admin/detail' . $movie_id);
        } else session(['error' => 'حذف موفقیت ناموفق']);
        return redirect('dashboard/admin/detail' . $movie_id);
    }

    public function category()
    {
        $categories = DB::table('category')->get();
        return view('adminDashboard.category')->with(['categories' => $categories]);
    }

    public function add_category(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        if ($category->save()) {
            session(['success' => ' موفقیت امیز']);
            return redirect('dashboard/admin/category');
        } else   session(['error' => 'مشکلی پیش امد']);
        return view('');
    }

    public function deleteCategory($id)
    {
        if (DB::table('category')->where('id', $id)->delete()) {
            session(['success' => 'حذف موفقیت امیز']);
            return redirect('dashboard/admin/category');
        } else   session(['error' => 'حذف موفقیت ناموفق']);
        return redirect('dashboard/admin/category');
    }

    public function changeSlider(Request $request)
    {

        $p1 = $request->name1;
        $p2 = $request->name2;
        $p3 = $request->name3;
        $p4 = $request->name4;
        $p5 = $request->name5;
        $p6 = $request->name6;
        $p7 = $request->name7;
        $p8 = $request->name8;
        $p9 = $request->name9;
        if ($p1) {
            DB::beginTransaction();
            try {
                DB::table('movie')->where('status', '1')->update([
                    'status'=>'0'
                ]);
                DB::table('movie')->where('id', $p1)->update([
                    'status' => '1'
                ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
        if ($p2) {
            DB::beginTransaction();
            try {
                DB::table('movie')->where('status', '2')->update([
                    'status'=>'0'
                ]);
                DB::table('movie')->where('id', $p2)->update([
                    'status' => '2'
                ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
        if ($p3) {
            DB::beginTransaction();
            try {
                DB::table('movie')->where('status', '3')->update([
                    'status'=>'0'
                ]);
                DB::table('movie')->where('id', $p3)->update([
                    'status' => '3'
                ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
        if ($p4) {
            DB::beginTransaction();
            try {
                DB::table('movie')->where('status', '4')->update([
                    'status'=>'0'
                ]);
                DB::table('movie')->where('id', $p4)->update([
                    'status' => '4'
                ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
        if ($p5) {
            DB::beginTransaction();
            try {
                DB::table('movie')->where('status', '5')->update([
                    'status'=>'0'
                ]);
                DB::table('movie')->where('id', $p5)->update([
                    'status' => '5'
                ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
        if ($p6) {
            DB::beginTransaction();
            try {
                DB::table('movie')->where('status', '6')->update([
                    'status'=>'0'
                ]);
                DB::table('movie')->where('id', $p6)->update([
                    'status' => '6'
                ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
        if ($p7) {
            DB::beginTransaction();
            try {
                DB::table('movie')->where('status', '7')->update([
                    'status'=>'0'
                ]);
                DB::table('movie')->where('id', $p7)->update([
                    'status' => '7'
                ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
        if ($p8) {
            DB::beginTransaction();
            try {
                DB::table('movie')->where('status', '8')->update([
                    'status'=>'0'
                ]);
                DB::table('movie')->where('id', $p8)->update([
                    'status' => '8'
                ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
        if ($p9) {
            DB::beginTransaction();
            try {
                DB::table('movie')->where('status', '9')->update([
                    'status'=>'0'
                ]);
                DB::table('movie')->where('id', $p9)->update([
                    'status' => '9'
                ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
        session('تغیرات موفق');
        return back();


    }
}
