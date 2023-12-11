<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Models\Post;

Route::get('/', function () {
    // echo '<h1>Hello Word</h1>';
    // echo '<h2 style= "text-align: center"><u>Welcome to laravel, ade</u></h2>';
    return view('welcome');
});

Route::get('/guru', function () {
    // echo '<h1>Hello Word</h1>';
    // echo '<h2 style= "text-align: center"><u>Welcome to laravel, ade</u></h2>';
    return view('guru');
});
Route::get('/siswa', function () {
    // echo '<h1>Hello Word</h1>';
    // echo '<h2 style= "text-align: center"><u>Welcome to laravel, ade</u></h2>';
    return view('siswa');
});
Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::get('/web', [PostController::class, 'portfolio'] );
Route::resource('/users', \App\Http\Controllers\UsersController::class);
Route::get('/search', [PostController::class, 'search']);

Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function (){
    Route::get('/logout', [HomeController::class, 'index']);
    Route::delete('/logot', [AuthController::class, 'logout'])->name('logout');
});