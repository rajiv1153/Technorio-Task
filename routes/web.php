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
});

Auth::routes();
Route::get('/admin/create',[App\Http\Controllers\MovieController::class, 'create'])->name('create.movie');
Route::POST('/admin/store',[App\Http\Controllers\MovieController::class, 'store'])->name('movie.store');
Route::get('/edit/movie/{id}',[App\Http\Controllers\MovieController::class, 'edit'])->name('movie.edit');
Route::POST('/update/movie/{id}',[App\Http\Controllers\MovieController::class, 'update'])->name('movie.update');


Route::get('/fav/movie/{id}',[App\Http\Controllers\FavoritesController::class, 'add'])->name('movie.fav');
Route::get('/fav/list',[App\Http\Controllers\FavoritesController::class, 'mylist'])->name('list.Favorites');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin/list/users', [App\Http\Controllers\HomeController::class, 'getUsers'])->name('admin.list.user');

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
