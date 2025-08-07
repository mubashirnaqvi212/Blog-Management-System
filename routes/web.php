<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Homepage with public posts and Login button
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [PostController::class, 'adminIndex'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Routes that require login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ✅ Explicitly define create route before {post}
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    
    // ✅ Resource routes (excluding show)
    Route::resource('posts', PostController::class)->except(['show']);
});

// ✅ Finally, add this AFTER ALL /posts/* routes
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Debug routes
Route::get('/test-manual-create', function () {
    return view('posts.create');
});
Route::get('/test-create', function () {
    return 'Test route works';
});
Route::get('/check-auth', function () {
    return auth()->check() ? '✅ Logged in' : '❌ Not logged in';
});

// Auth
require __DIR__.'/auth.php';
