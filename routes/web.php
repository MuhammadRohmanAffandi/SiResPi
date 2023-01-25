<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'index'])->name('home');


Auth::routes();
Route::get('logout', function () {
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

// Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('admin', [HomeController::class, 'admin'])->name('admin')->middleware('roleuser');

//Blog
Route::get('blog', [BlogController::class, 'index'])->name('blog')->middleware('roleuser');
Route::post('blog/save', [BlogController::class, 'store'])->middleware('roleuser');
Route::get('blog/edit/{id}', [BlogController::class, 'show'])->middleware('roleuser');
Route::post('blog/update', [BlogController::class, 'update'])->middleware('roleuser');
Route::get('blog/delete/{id}', [BlogController::class, 'destroy'])->middleware('roleuser');
//Resep
Route::get('resep', [ResepController::class, 'index'])->name('resep')->middleware('roleuser');
Route::post('resep/save', [ResepController::class, 'store'])->middleware('roleuser');
Route::get('resep/edit/{id}', [ResepController::class, 'show'])->middleware('roleuser');
Route::post('resep/update', [ResepController::class, 'update'])->middleware('roleuser');
Route::get('resep/delete/{id}', [ResepController::class, 'destroy'])->middleware('roleuser');
//Review
Route::get('review', [ReviewController::class, 'index'])->name('review')->middleware('roleuser');
Route::post('review/save', [ReviewController::class, 'store']);
Route::get('review/delete/{id}', [ReviewController::class, 'destroy'])->middleware('roleuser');
//Review
Route::get('user/review', [ReviewController::class, 'user'])->name('user.review');
Route::get('user/blog', [BlogController::class, 'user'])->name('user.blog');
Route::get('user/resep', [ResepController::class, 'user'])->name('user.resep');
Route::get('user/search', [ResepController::class, 'search']);
Route::get('user/detail/{id}', [ResepController::class, 'detail'])->name('user.detail');
Route::get('user/breakfast', [ResepController::class, 'breakfast']);
Route::get('user/main', [ResepController::class, 'main']);
Route::get('user/dessert', [ResepController::class, 'dessert']);
Route::get('user/beverage', [ResepController::class, 'beverage']);
//about
Route::get('/about', function () {
    return view('user.about');
});
Route::get('/ss', function () {
    return view('user.screenshot');
});
