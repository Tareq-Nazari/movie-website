<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/',[\App\Http\Controllers\MovieController::class,'home']);
Route::get('/detail{id}',[\App\Http\Controllers\MovieController::class,'detail'])->name('detail');
Route::get('/search_index',[\App\Http\Controllers\MovieController::class,'search_index'])->name('search');
Route::post('/search_form',[\App\Http\Controllers\MovieController::class,'search_form'])->name('search_form');
Route::get('/about', function () {
    return view('about');
});
Route::get('/single', function () {
    return view('single');
});
Route::get('/review',[\App\Http\Controllers\MovieController::class,'review'] );
Route::get('/search', function () {
    return view('search');
});
Route::get('/offer', function () {
    return view('offer');
});
Route::prefix('dashboard')->group(function () {
    Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'],function () {

        Route::get('/', [\App\Http\Controllers\MovieController::class, 'index']);
        Route::get('/home',[\App\Http\Controllers\MovieController::class,'home']);
        Route::get('/editmovie', [\App\Http\Controllers\MovieController::class, 'editMovie']);
        Route::get('/category', [\App\Http\Controllers\AdminController::class, 'category']);
        Route::get('/deleteCategory{id}', [\App\Http\Controllers\AdminController::class, 'deleteCategory']);
        Route::post('/add_category', [\App\Http\Controllers\AdminController::class, 'add_category'])->name('add_category');
        Route::get('/comments', [\App\Http\Controllers\MovieController::class, 'comments']);
        Route::get('/edithome',[\App\Http\Controllers\MovieController::class, 'editHome']);
        Route::post('/edit_home_movie',[\App\Http\Controllers\AdminController::class, 'changeSlider'])->name('edit_home_movie');
        Route::post('/add', [\App\Http\Controllers\MovieController::class, 'create'])->name('add_film');
        Route::get('/all', [\App\Http\Controllers\MovieController::class, 'all']);
        Route::get('/editIndex{id}', [\App\Http\Controllers\MovieController::class, 'edit_index']);
        Route::post('/edit_form', [\App\Http\Controllers\MovieController::class, 'edit_form'])->name('edit_film');
        Route::get('/delete{id}', [\App\Http\Controllers\MovieController::class, 'delete']);
        Route::get('/detail{id}', [\App\Http\Controllers\AdminController::class, 'detailMovie'])->name('detail_film');
        Route::post('/search', [\App\Http\Controllers\MovieController::class, 'search']);
        Route::get('/comments{id}', [\App\Http\Controllers\CommentController::class, 'movie_comment']);
        Route::get('/comment/delete{id}', [\App\Http\Controllers\AdminController::class, 'delete_comment']);
    });
});
Route::prefix('comment')->group(function () {
    Route::get('/delete{id}',[\App\Http\Controllers\CommentController::class,'delete']);

});
Route::prefix('user')->group(function () {
    Route::post('/add_comment',[\App\Http\Controllers\UserController::class,'add_comment']);
    Route::get('/profile',[\App\Http\Controllers\UserController::class,'profile']);
    Route::post('/edit_profile',[\App\Http\Controllers\UserController::class,'edit_profile']);
    Route::post('/add_rate',[\App\Http\Controllers\UserController::class,'add_rate']);

});
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/test',[\App\Http\Controllers\MovieController::class,'test']);
});
//Route::get('/test',[\App\Http\Controllers\MovieController::class,'test']);
Route::get('/test{id}',[\App\Http\Controllers\MovieController::class,'detail'])->name('pp');
//Route::post('/register',[\App\Actions\Fortify\CreateNewUser::class,'create']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
