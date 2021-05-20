<?php

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PostsController;

Route::get('/', [PagesController::class, 'home']);
Route::get('/blog/{post}', [PostsController::class, 'show'])->name('posts.show');




Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth'],
function(){
    Route::get('/', [AdminController::class, 'index'])->middleware('auth')->name('dashboard');
    Route::get('posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('posts/{post}', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
