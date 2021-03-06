<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VendorController;

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
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin'])->name('login.post');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'postRegister'])->name('register.post');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('/view/{id}', [UserController::class, 'view'])->name('user.view');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/edit/{id}', [UserController::class, 'editPost'])->name('user.edit.post');
        Route::post('/delete', [UserController::class, 'delete'])->name('user.delete');
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::get('/new', [CategoryController::class, 'new']);
        Route::get('/view/{id}', [CategoryController::class, 'view'])->name('category.view');
        Route::post('/new', [CategoryController::class, 'postNew'])->name('category.new.post');
        Route::post('/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/delete', [CategoryController::class, 'delete'])->name('category.delete');
    
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::get('/new', [ProductController::class, 'new'])->name('product.new');
        Route::post('/new', [ProductController::class, 'postNew'])->name('product.new.post');
        Route::get('/view/{id}', [ProductController::class, 'view'])->name('product.view');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/edit/{id}', [ProductController::class, 'editPost'])->name('product.edit.post');
    }); 

    Route::prefix('criteria')->group(function () {
        Route::get('/', [CriteriaController::class, 'index'])->name('criteria');
    }); 

    Route::prefix('vendor')->group(function () {
        Route::get('/', [VendorController::class, 'index'])->name('vendor');
    });
});