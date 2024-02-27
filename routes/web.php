<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocalizationController;

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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/about', [PostController::class, 'about'])->name('posts.about');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/show', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/show/{id}', [PostController::class, 'show1'])->name('posts.show1');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::get('posts/showComments/{postId}', [CommentController::class,'showComments'])->name('comments.showComments');
Route::get('posts/showComments/{postId}', [CommentController::class,'showComments'])->name('comments.showComments');
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('comments/{post}/{comment}',[CommentController::class, 'destroy'])->name('comments.destroy');


Route::post('lang/{locale}', [LocalizationController::class, 'changeLanguage'])->name('lang.locale');



Route::get('/show_posts', [Controller::class, 'show_posts'])->name('show_posts');
Route::post('/show_posts', [PostController::class, 'store'])->name('posts.store');



Route::get('/admin/dashbord', [AdminController::class, 'index'])->name('admin.dashbord');
Route::get('/admin/show_users', [AdminController::class, 'show_users'])->name('admin.show_users');




Route::get('/users/create_users', [AdminController::class, 'index1'])->name('admin.create_users');
Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');