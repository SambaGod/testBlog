<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;

// Route for Home Page
Route::get('/', function(){
    return view('layouts.home');
})->name('home');

// Route for Register
Route::get('/register', [RegisterController::class, 'index'])->name('register'); // where ever this name() is called, this route will respond
Route::post('/register', [RegisterController::class, 'store']); // It will ingerit name() from top

// Route for Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'signin']);

// Route for Logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Route for Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard')
->middleware('auth');

// Route for posts
Route::get('/posts',[PostController::class, 'index'])->name('posts'); // Get them
Route::post('/posts',[PostController::class, 'store']); // Store them
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy'); // Delete them

// Route for post likes
Route::post('/posts/{post}/likes',[PostLikeController::class, 'store'])->name('posts.likes'); // Single {} for post (name of the model)!
Route::delete('/posts/{post}/likes',[PostLikeController::class, 'destroy']);