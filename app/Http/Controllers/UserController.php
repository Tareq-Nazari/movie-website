<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\User;
use http\Env\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile;


class UserController extends Controller
{
    /*  public function login()
     {
         if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $token = auth()->user()->createToken('NewToken')->accessToken;
             return response()->json([
                 'token' => $token,
                 'code' => 200
             ]);
         }else{
             return response()->json(['error'=>'Unauthorized']);
         }
     } */
    public function test()
    {
        return "sd";
    }

    public function register(Request $request)
    {


        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return response()->json([
                'message' => 'user created',
                'status' => '201'
            ], 201);
        } else return response()->json([

            'message' => 'fuck'

        ], 201);


    }


    public function login(Request $request)
    {


        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'message' => 'unauthrized',
                'satatus' => '401'
            ], 401);
        }

        $user = $request->user();
        if ($user->role == 'adminstrator') {
            $tokenData = $user->createToken('Personal Access Token', ['do_anything']);
        } else {
            $tokenData = $user->createToken('Personal Access Token', ['can_create']);
        }
        $token = $tokenData->token;
        if ($token->save()) {
            return response()->json([
                'user' => $user,
                'access_token' => $tokenData->accessToken,
                'token_type' => 'Bearar',
                'scop' => $tokenData->token->scopes

            ]);

        } else {
            return \response()->json([
                'msg' => 'errrrror'
            ]);
        }

    }

    public function add_comment(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'comment' => 'required|string',
            'id' => 'required|int',
        ]);

        $comment = new Comment();
        $comment->movie_id = $request->movie_id;
        $comment->comment = $request->comment;
        if ($comment->save()) {
            session(['success' => 'کامنت ثبت شد']);
            return view('');
        } else
            session(['error' => 'کامنت ثبت نشد']);
        return view('');

    }

    public function add_rate(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'movie_id' => 'required|int',
            'rate' => 'required|int',
        ]);
        $profile_id = DB::table('profile')->where('user_id', Auth::user()->id);
        $duplicate = DB::table('rate')->where('profile_id', $profile_id)
            ->where('movie_id', $request->movie_id)->delete();
        $rate = new Comment();
        $rate->movie_id = $request->movie_id;
        $rate->profile_id = $profile_id;
        $rate->rate = $request->rate;
        if ($rate->save()) {
            session(['success' => 'رای ثبت شد']);
            return view('');
        } else
            session(['error' => 'رای ثبت نشد']);
        return view('');


    }

    public function profile()
    {
        $profile = DB::table('user')->join('profile', 'user.id', '=', 'profile.user_id')
            ->select('profile.*', 'user.email as email')
            ->where('user.id', Auth::user()->id)->get();
        if ($profile) {
            return view('')->with(['profile' => $profile]);
        } else
            session(['error' => 'پروفایل یافت نشد']);
        return view('');
    }

    public function edit_profile(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'email' => 'email|unique:App\User|',
            'password' => 'password',
            'name' => 'string|max:255',
            'address' => 'string|max:255',
            'phone' => 'numeric:11',
            'role' => 'numeric:1'

        ]);

        $profile = DB::table('profile')->find('user_id', Auth::user()->id);
        $email = DB::table('user')->find('id', Auth::user()->id)->value('email');
        if (!$validator->fails()) {

            if ($request->email) {
                $email = $request->email;
            }
            if ($request->name) {
                $name = $request->name;
            } else $name = $profile->name;
            if ($request->phone) {
                $phone = $request->phone;
            } else $phone = $profile->phoe;
            if ($request->address) {
                $address = $request->address;
            } else $address = $profile->address;
            if ($request->pic) {
                $pic = $request->pic;
                $destination = base_path() . '/public/img/';
                $filename = rand(111111111, 999999999) . '.' . $pic->getClientOriginalExtension();
                $file = $pic;
                $file->move($destination, $filename);
                $pic = $filename;
            } else $pic = $profile->pic;
            if (
                DB::table('user')->update([
                    'email' => $email,
                    'name' => $name
                ]) &&
                DB::table('profile')->update([
                    'name' => $name,
                    'address' => $address,
                    'pic' => $pic,
                    'phone' => $phone,
                ])) {
                session(['success' => 'ادیت موفقیت امیز']);
                return view('');
            }
        } else
            session(['error' => 'ادیت ناموفق']);
        return view('');


    }
}
