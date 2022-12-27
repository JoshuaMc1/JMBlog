<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('posts.index');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    Route::get('/category/{category}', 'category')->name('posts.category');
    Route::get('/tag/{tag}', 'tag')->name('posts.tag');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('image/upload', [ImageController::class, 'upload'])
    ->name('image.upload');
