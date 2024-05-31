<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CommentController;

use function Laravel\Prompts\search;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// users route
Route::resource('users', UserController::class);

// posts route
Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class);
Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('posts.search');