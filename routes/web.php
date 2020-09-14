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

Route::get('/', function () {
    return view('welcome');
})->name('/');
Route::prefix('movie')->group(function (){
    Route::post('/add',[\App\Http\Controllers\MovieController::class,'create']);
    Route::get('/all',[\App\Http\Controllers\MovieController::class,'all']);
    Route::post('/edit',[\App\Http\Controllers\MovieController::class,'edit']);
    Route::get('/delete{id}',[\App\Http\Controllers\MovieController::class,'delete']);
    Route::get('/detail{id}',[\App\Http\Controllers\MovieController::class,'detail']);
    Route::post('/search',[\App\Http\Controllers\MovieController::class,'search'])->name('search');
    Route::get('/comments{id}',[\App\Http\Controllers\CommentController::class,'movie_comment']);
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
