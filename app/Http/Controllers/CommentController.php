<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function movie_comment($id)
    {
        $comments = DB::table('comment')->where('movie_id', $id)->get();
        return view('')->with(['comments' => $comments]);

    }

    public function delete($id)
    {
        $profile_id = DB::table('profile')->where('user_id', Auth::user()->id)->value('id');
        if (DB::table('comment')->where('id', $id)->where('profile_id', $profile_id)->delete()) {
            session(['success' => 'کامنت با موفقیت حذف شد']);
            return view('');
        } else  session(['error' => 'مشکلی پیش امد']);
        return view('');

    }

    public function user_comments($id)
    {


    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'int',
            'movie_id' => 'int',
            'profile_id' => 'int',
            'comment' => 'string',

        ]);
        $comment = $request->comment;
        $id = $request->id;
        $profile_id = $request->profile_id;
        $movie_id = $request->movie_id;
        $movies = DB::table('comment')
            ->when($comment, function ($query, $comment) {
                return $query->where('comment', 'like', '%' . $comment . '%');
            })->when($movie_id, function ($query, $movie_id) {
                return $query->where('movie_id', $movie_id);
            })->when($profile_id, function ($query, $profile_id) {
                return $query->where('profile_id', $profile_id);
            })->when($id, function ($query, $id) {
                return $query->where('categories.store_id', $id);
            })->get();
        if ($movies) {
            return view('');
        } else session(['error' => 'کامنتی یافت نشد']);
        return view('');

    }
}
