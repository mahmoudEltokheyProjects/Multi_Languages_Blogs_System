<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Website\CategoryController as WebsiteCategoryController;
use App\Http\Controllers\Website\IndexController;
use App\Http\Controllers\Website\PostController as WebsitePostController;
use Illuminate\Support\Facades\Auth;
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

// ############################ FrontEnd website Routes ############################
// 1- Show "root page"
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/categories/{category}', [WebsiteCategoryController::class, 'show'])->name('category');
Route::get('/posts/{post}', [WebsitePostController::class, 'show'])->name('post');



// ############################ Dashboard Routes #########################

// ++++++++++++++++++++++++ Dashboard Route ++++++++++++++++++++++++
// 1- user must be logged in(auth middleware) And has "status = admin" or "status = writer" ( checkLogin middleware)
Route::group(['prefix'=>'dashboard', 'as'=>'dashboard.', 'middleware'=>['auth', 'checkLogin']], function() {
    Route::get('/', function(){
        return view('dashboard.layouts.layout');
    });
    // ++++++++++++++++++++++++ settings Route ++++++++++++++++++++++++
    // Show "settings" page
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    // Update "settings" Form
    Route::post('/settings/update/{setting}', [SettingController::class, 'update'])->name('settings.update');
    // ++++++++++++++++++++++++ users Route ++++++++++++++++++++++++
    Route::get('/users/all', [UserController::class, 'getUsersDatatable'])->name('users.all');
    Route::post('/users/delete', [UserController::class, 'delete'])->name('users.delete');
    // ++++++++++++++++++++++++ categories Route ++++++++++++++++++++++++
    // 1- show "categories" in "dataTable"
    Route::get('/category/all', [CategoryController::class, 'getCategoriesDatatable'])->name('category.all');
    // 2- delete "category"
    Route::post('/category/delete', [CategoryController::class, 'delete'])->name('category.delete');
    // ++++++++++++++++++++++++ posts Route ++++++++++++++++++++++++
    // 1- show "posts" in "dataTable"
    Route::get('/posts/all', [PostController::class, 'getPostsDatatable'])->name('posts.all');
    // 2- delete "post"
    Route::post('/posts/delete', [PostController::class, 'delete'])->name('posts.delete');
    // ++++++++++++++++++++++++ 3 Resource Controller : UserController , CategoryController , PostController ++++++++++++++++++++++++
    Route::resources([
        'users' => UserController::class,
        'category' => CategoryController::class,
        'posts' => PostController::class,
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
