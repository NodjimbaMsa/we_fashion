<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

Auth::routes();

Route::controller(HomeController::class)->group(function() {
    Route::get('/','homepage')->name('homepage');
    Route::get('products/{filters}','filterProduct')->name('product.filter')->where('filters', '[A-Za-z]+');
    Route::get('/product/{id}', 'productDetails')->name('product.detail')->where(['id' => '[0-9]+']);
});

Route::get('/admin',[LoginController::class, 'showLoginForm'])->name('admin');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('home');

Route::prefix('/dashboard')
    ->middleware(['auth'])
    ->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
    });


// Route::get('/product', function () {
//     return view('product');
// });

// Route::controller(BookController::class)->prefix('book')->group(function () {
// 	Route::get('/', 'index')->name('book.list');
// 	// Route::get('/{id}', 'show')->name('show.book')->where('id', '[0-9]+');
// 	Route::get('/{book}', 'show')->name('show.book')->where('book', '[0-9]+');
// });

// Route::get('/product/{id}', 'show')->name('show.book')->where('id', '[0-9]+');

// Route::get('/products',[HomeController::class, 'homepage'])->name('homepage');

// Route::get('/admin',[LoginController::class, 'showLoginForm'])->name('admin');
