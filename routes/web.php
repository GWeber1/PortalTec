<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PositionsController;
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

//frontend
Route::get('/', [FrontendController::class, 'index'])->name('frotend.index');

Route::get('frontend/search', [FrontendController::class, 'search'])->name('frontend.search');

Route::get('article/{pid}/{slug}', [FrontendController::class, 'article'])->name('frontend.article');

Route::get('pages/view/{pageid}/{slug}', [FrontendController::class, 'page'])->name('frontend.page');

Route::get('contact-us', [FrontendController::class, 'contactUs'])->name('frontend.contact-us');

Route::post('sendmessage', [FrontendController::class, 'sendMessage'])->name('frontend.sendmessage');

Route::middleware(['Autenticador'])->group(function() {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    
    //categorias
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');

    Route::Post('category/add', [CategoryController::class, 'add'])->name('category.add');

    Route::post('category/delete', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('category/edit/{cid}', [CategoryController::class, 'edit'])->name('category.edit');

    Route::post('category/update', [CategoryController::class, 'update'])->name('category.update');

    //posicoes
    Route::get('positions', [PositionsController::class, 'index'])->name('positions.index');

    Route::post('positions/add', [PositionsController::class, 'add'])->name('positions.add');

    Route::post('positions/delete', [PositionsController::class, 'delete'])->name('positions.delete');

    Route::get('positions/edit/{pid}', [PositionsController::class, 'edit'])->name('positions.edit');

    Route::post('positions/update', [PositionsController::class, 'update'])->name('positions.update');

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

    //paginas
    Route::get('pages', [PagesController::class, 'index'])->name('pages.index');

    Route::post('pages/add', [PagesController::class, 'add'])->name('pages.add');

    Route::get('pages/all', [PagesController::class, 'all'])->name('pages.all');

    Route::post('pages/delete', [PagesController::class, 'delete'])->name('pages.delete');

    Route::get('pages/edit/{pageid}', [PagesController::class, 'edit'])->name('pages.edit');

    Route::post('pages/update', [PagesController::class, 'update'])->name('pages.update');

    //users
    Route::get('users', [UsersController::class, 'index'])->name('users.index');

    Route::post('users/add', [UsersController::class, 'add'])->name('users.add');

    Route::post('users/delete', [UsersController::class, 'delete'])->name('users.delete');

    Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');

    Route::post('users/update', [UsersController::class, 'update'])->name('users.update');
});

Route::post('/Adminlogout', [AdminController::class, 'destroy'])->middleware('auth')->name('admin.logout');

//messages
Route::get('messages/all', [MessagesController::class, 'all'])->name('messages.all');

Route::post('messages/delete', [MessagesController::class, 'delete'])->name('messages.delete');

Route::get('/dashboard', function () {
    return view('backend.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
