<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
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
//Category page
Route::resource('/categories', CategoryController::class);

//Comment
Route::post('/posts/{post}/comments',[CommentsController::class,'store'])->name('comment.store');
Route::delete('/comment/{comments}',[CommentsController::class,'destroy'])->name('comment.destroy');

//Logout
Route::get('/logout', [BlogController::class,'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('admin')->middleware('auth','isAdmin')->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('category',[\App\Http\Controllers\Admin\CategoryController::class,'index']);
    Route::get('add-category',[\App\Http\Controllers\Admin\CategoryController::class,'create']);
    Route::post('add-category',[\App\Http\Controllers\Admin\CategoryController::class,'store']);
    Route::get('edit-category/{category_id}',[\App\Http\Controllers\Admin\CategoryController::class,'edit']);
    Route::put('update-category/{category_id}',[\App\Http\Controllers\Admin\CategoryController::class,'update']);
    Route::get('delete-category/{category_id}',[\App\Http\Controllers\Admin\CategoryController::class,'destroy']);

    Route::get('posts',[\App\Http\Controllers\Admin\PostController::class,'index']);
    Route::get('users',[\App\Http\Controllers\Admin\UserController::class,'index']);
    Route::get('edit-user/{user_id}',[\App\Http\Controllers\Admin\UserController::class,'edit']);
    Route::put('update-user/{user_id}',[\App\Http\Controllers\Admin\UserController::class,'update']);

    Route::get('delete-user/{user_id}',[\App\Http\Controllers\Admin\UserController::class,'destroy']);

    Route::get('comments',[\App\Http\Controllers\Admin\CommentController::class,'index']);
    Route::get('/view/{comment_id}',[\App\Http\Controllers\Admin\CommentController::class,'show'])->name('comment.show');
    Route::delete('delete-comment/{comment_id}',[\App\Http\Controllers\Admin\CommentController::class,'destroy'])->name('admin.comment.destroy');

});

//Admin user manage
Route::get('users',[App\Http\Controllers\Admin\UserController::class,'index']);
Route::delete('users/{}',[App\Http\Controllers\Admin\UserController::class,'destroy']);