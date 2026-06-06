<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;

Route::get('/', function () { return view('welcome'); });
Route::get('/beranda', function () { return view('user.beranda'); });
Route::get('/tentang', function () { return view('user.tentang'); });

Auth::routes();

Route::get('/home', function() {
    return redirect()->route('admin.dashboard');
});
Route::get('/dashboard', function() {
    return redirect()->route('admin.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/categories', CategoryController::class);
    Route::resource('/admin/articles', ArticleController::class);

    // Re-added original routes to prevent RouteNotFoundException on sidebar
    Route::get('/admin/komentar', [App\Http\Controllers\Admin\CommentController::class, 'index'])->name('admin.komentar.index');
    Route::post('/admin/komentar/{id}/approve', [App\Http\Controllers\Admin\CommentController::class, 'approve'])->name('admin.komentar.approve');
    Route::delete('/admin/komentar/{id}', [App\Http\Controllers\Admin\CommentController::class, 'destroy'])->name('admin.komentar.destroy');

    Route::get('/admin/statistik', function() {
        return view('admin.statistics.index');
    })->name('admin.statistik.index');

    Route::match(['get', 'post'], '/admin/pengaturan', function() {
        return view('admin.settings.index');
    })->name('admin.pengaturan.index');
});
