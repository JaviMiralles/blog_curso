<?php

use App\Http\Controllers\Admin\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;

Route::get('/', [PagesController::class, 'home']);


Route::get('/home', [HomeController::class, 'index'])->middleware('auth');


Route::group(['
    prefix' => 'admin',
    'middleware' => 'auth'],
    function(){
    Route::get('posts', [PostController::class, 'index'])->name('admin.posts,index');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
