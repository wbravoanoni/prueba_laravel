<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\web\BlogController;
use Illuminate\Support\Facades\Route;

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




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['prefix'=>'dashboard','middleware'=>['auth','admin']],function(){
    Route::resources([
        'post' => App\Http\Controllers\PostController::class,
        'category' => App\Http\Controllers\CategoryController::class,
    ]);
});

Route::group(['prefix'=>'blog'],function(){
    Route::controller(BlogController::class)->group(function(){
        Route::get('/', 'index')->name('web.blog.index');
        Route::get('/{post}', 'show')->name('web.blog.show');
    });
});

require __DIR__.'/auth.php';
