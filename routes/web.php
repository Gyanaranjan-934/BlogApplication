<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//home page
Route::get('/', [WelcomeController::class,'index'])->name('welcome.index');
//blog page 
Route::get('/blog', [BlogController::class,'index'])->name('blog.index');
//create page
Route::get('/blog/create', [BlogController::class,'create'])->name('blog.create') ;
//single page
Route::get('/blog/{post:slug}', [BlogController::class,'show'])->name('blog.show'); 
// edit single page
Route::get('/blog/{post}/edit', [BlogController::class,'edit'])->name('blog.edit'); 
// update edit single page
Route::put('/blog/{post}', [BlogController::class,'update'])->name('blog.update'); 
// delete single page
Route::delete('/blog/{post}', [BlogController::class,'destroy'])->name('blog.destroy'); 
//store page
Route::post('/blog', [BlogController::class,'store'])->name('blog.store');
//about page
Route::get('/about', function () {
    return view('about');
})->name('about');
//contact page
Route::get('/contact',[ContactController::class,'index'])->name('contact'); 
Route::resource('/categories', CategoryController::class);

// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
// Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
// Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
// Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
// Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
