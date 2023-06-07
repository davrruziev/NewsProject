<?php

use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
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

Route::get('/lang/{lang}', function ($lang) {
    session(['lang'=>$lang]);
    return back();
});

Route::get('/', [MainController::class,'index']);
Route::get('/category/{slug}',[MainController::class,'categoryPost'])->name('categoryPost');
Route::get('/post/{slug}',[MainController::class,'postDetaile'])->name('postDetaile');
Route::get('/contact',[MainController::class,'contact'])->name('contact');
Route::get('/search',[MainController::class,'search'])->name('search');

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function(){
    Route::resource('categories',CategoryController::class);
    Route::resource('posts',PostController::class);
    Route::post('/post-image-upload',[PostController::class, 'upload'])->name('upload');
    Route::resource('tags',TagController::class);
    Route::resource('ad', AdController::class);
});



Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
