<?php

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\PostController;

Route::get('/', [PagesController::class, 'home']);




Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth'],
function(){
    Route::get('/', [AdminController::class, 'index'])->middleware('auth')->name('dashboard');
    Route::get('posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('create', [PostController::class, 'create'])->name('admin.posts.create');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
