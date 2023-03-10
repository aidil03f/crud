<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
    
    Route::middleware('admin')->group(function () {
        Route::get('/post/edit/{id}',[PostController::class,'edit'])->name('post.edit');
        Route::put('/post/{id}',[PostController::class,'update'])->name('post.update');
        Route::delete('/post/{id}',[PostController::class,'destroy'])->name('post.destroy');
    });
    Route::get('/post',[PostController::class,'index'])->name('post.index');
    Route::get('/post/create',[PostController::class,'create'])->name('post.create');
    Route::post('/post',[PostController::class,'store'])->name('post.store');

 });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
