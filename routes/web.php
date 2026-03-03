<?php

use Inertia\Inertia;

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserNameController;
use App\Http\Controllers\TestController;

// Route::get('/', function () {
//     return Inertia::render('Home');
// });

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
Route::get('/notes', [PostController::class, 'index'])->name('notes.index');
Route::get('/notes/create', [PostController::class, 'create'])->name('notes.create');
Route::post('/notes', [PostController::class, 'store'])->name('notes.store');
Route::get('/notes/{post}/edit', [PostController::class, 'edit'])->name('notes.edit');
Route::put('/notes/{post}/update', [PostController::class, 'update'])->name('notes.update');
Route::delete('/notes/{post}/delete', [PostController::class, 'destroy'])->name('notes.destroy');
Route::get('/notes/{post}', [PostController::class, 'show'])->name('notes.show');

// Route::resource('notes', PostController::class);
