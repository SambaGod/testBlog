<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

// Route for Register
Route::get('/register', [RegisterController::Class, 'index'])->name('register'); // where ever this name() is called, this route will respond
Route::post('/register', [RegisterController::Class, 'store']); // It will ingerit name() from top
// Route for posts
Route::get('/posts', function () {
    return view('posts.index');
});
