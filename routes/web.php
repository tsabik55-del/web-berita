<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return redirect()->route('admin.dashboard');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Kelola Berita
    Route::resource('berita', App\Http\Controllers\Admin\BeritaController::class, [
        'as' => 'admin'
    ]);

    // Kelola Kategori
    Route::resource('kategori', App\Http\Controllers\Admin\CategoryController::class, [
        'as' => 'admin'
    ]);

    // Kelola Komentar
    Route::get('komentar', [App\Http\Controllers\Admin\CommentController::class, 'index'])->name('admin.komentar.index');
    Route::post('komentar/{id}/approve', [App\Http\Controllers\Admin\CommentController::class, 'approve'])->name('admin.komentar.approve');
    Route::delete('komentar/{id}', [App\Http\Controllers\Admin\CommentController::class, 'destroy'])->name('admin.komentar.destroy');

    // Kelola Pengguna
    Route::get('pengguna', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.pengguna.index');
    Route::delete('pengguna/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.pengguna.destroy');

    // Statistik & Laporan
    Route::get('statistik', function() {
        return view('admin.statistics.index');
    })->name('admin.statistik.index');

    // Pengaturan
    Route::match(['get', 'post'], 'pengaturan', function() {
        return view('admin.settings.index');
    })->name('admin.pengaturan.index');
});

Route::get('/dashboard', function() {
    return redirect()->route('admin.dashboard');
});
