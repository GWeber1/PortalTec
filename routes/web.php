<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UsersController;
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

Route::get('/', [FrontendController::class, 'index'])->name('frotend.index');

Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('article/{pid}/{slug}', [FrontendController::class, 'article'])->name('frontend.article');

//categorias
Route::get('category', [CategoryController::class, 'index'])->name('category.index');

Route::Post('category/add', [CategoryController::class, 'add'])->name('category.add');

Route::post('category/delete', [CategoryController::class, 'delete'])->name('category.delete');

Route::get('category/edit/{cid}', [CategoryController::class, 'edit'])->name('category.edit');

Route::post('category/update', [CategoryController::class, 'update'])->name('category.update');

//settings
Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');

Route::post('settings/add', [SettingsController::class, 'add'])->name('settings.add');

Route::post('settings/update', [SettingsController::class, 'update'])->name('settings.update');

//posts
Route::get('posts', [PostsController::class, 'index'])->name('posts.index');

Route::post('posts/add', [PostsController::class, 'add'])->name('posts.add');

Route::get('posts/all', [PostsController::class, 'all'])->name('posts.all');

Route::post('posts/delete', [PostsController::class, 'delete'])->name('posts.delete');

Route::get('posts/edit/{pid}', [PostsController::class, 'edit'])->name('posts.edit');

Route::post('posts/update', [PostsController::class, 'update'])->name('posts.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//users
Route::get('users', [UsersController::class, 'index'])->name('users.index');

require __DIR__.'/auth.php';
