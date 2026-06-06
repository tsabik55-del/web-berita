<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;

Route::get('/', function () { return view('welcome'); });
Route::get('/beranda', function () { return view('user.beranda'); });
Route::get('/tentang', function () { return view('user.tentang'); });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/categories', CategoryController::class);
    Route::resource('/admin/articles', ArticleController::class);
});
