<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;

// Route for Home Page
Route::get('/', function(){
    return view('layouts.home');
})->name('home');

// Route for Register
Route::get('/register', [RegisterController::Class, 'index'])->name('register'); // where ever this name() is called, this route will respond
Route::post('/register', [RegisterController::Class, 'store']); // It will ingerit name() from top

// Route for Login
Route::get('/login', [LoginController::Class, 'index'])->name('login');
Route::post('/login', [LoginController::Class, 'signin']);

// Route for Logout
Route::post('/logout', [LogoutController::Class, 'logout'])->name('logout');

// Route for Dashboard
Route::get('/dashboard', [DashboardController::Class, 'index'])
->name('dashboard')
->middleware('auth');

// Route for posts
Route::get('/posts', function () {
    return view('posts.index');
})->name('posts');
