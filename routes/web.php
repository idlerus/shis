<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
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

Route::group(['middleware' => '\App\Http\Middleware\CategoriesMiddleware'], function() {
    Route::get('login',     [LoginController::class, 'indexLogin'])->name('loginIndex');
    Route::post('login',    [LoginController::class, 'login'])->name('login');
    Route::get('register',  [LoginController::class, 'indexRegister'])->name('registerIndex');
    Route::post('register', [LoginController::class, 'register'])->name('register');
    Route::get('logout',    [LoginController::class, 'logOut'])->name('logout');

    Route::get('/', function () {return view('welcome');});
    Route::get('/category/{category}',      [CategoryController::class, 'show']);
    Route::get('/products',                 [ProductController::class, 'index']);
    Route::get('/products/{product}',       [ProductController::class, 'show']);
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/products/create/post',        [ProductController::class, 'create']);
        Route::post('/products/create/post',       [ProductController::class, 'store']);
        Route::get('/products/{product}/edit',     [ProductController::class, 'edit']);
        Route::put('/products/{product}/edit',     [ProductController::class, 'update']);
        Route::put('/products/{product}/publish',  [ProductController::class, 'publish']);
        Route::delete('/products/{product}',       [ProductController::class, 'destroy']);
        Route::post('/products/{product}/comment', [ProductController::class, 'commentCreate']);
        Route::post('/products/{product}/rating',  [ProductController::class, 'rating']);
    });
    Route::group(['middleware' => '\App\Http\Middleware\RoleMiddleware:admin'], function() {
        Route::view('/admin', 'admin.dashboard');
        Route::get('/admin/categories/create',           [CategoryController::class, 'create']);
        Route::post('/admin/categories/create',          [CategoryController::class, 'store']);
        Route::put('/admin/categories/{category}/edit',  [CategoryController::class, 'update']);
        Route::get('/admin/categories',                  [CategoryController::class, 'adminIndex']);
        Route::delete('/admin/categories/{category}',    [CategoryController::class, 'destroy']);
        Route::get('/admin/products/publish',            [ProductController::class, 'indexPublishAdmin']);
        Route::get('/admin/tags',                        [TagController::class, 'adminIndex']);
        Route::get('/admin/tags/create',                 [TagController::class, 'create']);
        Route::post('/admin/tags/create',                [TagController::class, 'store']);
    });
});


