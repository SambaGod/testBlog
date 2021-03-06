<?php

use Illuminate\Support\Facades\Route;

// Route for home page
Route::get('/', function(){
    return view('layouts.home');
});

// Route for posts
Route::get('/posts', function () {
    return view('posts.index');
});
