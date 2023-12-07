<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


#Route::resource('post', PostController::class);

Route::get('post/create',[PostController::class, 'create'])->name('post.create');
Route::post('post',[PostController::class, 'store'])->name('post.store');
Route::get('post',[PostController::class, 'index'])->name('post.index');

Route::get('post/{post}/edit',[PostController::class, 'edit'])->name('post.edit');
Route::get('post/{post}',[PostController::class, 'show'])->name('post.show');
Route::put('post/{post}',[PostController::class, 'destroy'])->name('post.destroy');
Route::put('post/update/{post}',[PostController::class, 'update'])->name('post.update');




/*
Route::get('post',[PostController::class, 'index']);





*/