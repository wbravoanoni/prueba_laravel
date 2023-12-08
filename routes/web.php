<?php

use App\Http\Controllers\CategoryController;
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

Route::get('category',[CategoryController::class,'index'])->name('category.index');
Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('category',[CategoryController::class,'store'])->name('category.store');
Route::get('category/{category}',[CategoryController::class,'show'])->name('category.show');
Route::get('category/{category}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::put('category/update/{category}',[CategoryController::class,'update'])->name('category.update');
Route::put('category/{category}',[CategoryController::class, 'destroy'])->name('category.destroy');



/*
Route::get('post',[PostController::class, 'index']);





*/