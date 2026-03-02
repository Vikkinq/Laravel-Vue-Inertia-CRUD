<?php

use Inertia\Inertia;

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserNameController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return Inertia::render('Home');
});

// Notes App
Route::get('/shop', [TestController::class, 'index'])->name('test.index');


// User CRUD
// Route::get('/users', [UserNameController::class, 'index'])->name('users.index');
// Route::post('/users', [UserNameController::class, 'store'])->name('users.store');
// Route::delete('/users/{id}', [UserNameController::class, 'destroy']);
// Route::get('/users/{id}/edit', [UserNameController::class, 'edit'])->name('users.edit');
// Route::put('/users/{id}', [UserNameController::class, 'update'])->name('users.update');

// Post CRUD
// resource‑style
// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::resource('posts', PostController::class);
