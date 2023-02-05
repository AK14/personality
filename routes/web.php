<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedisController;
use \App\Http\Controllers\ProductController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::redirect('/', 'login');

Route::middleware('auth')->group(function(){
    Route::get('products', Array(ProductController::class, 'index') )->name('products.index');
    Route::middleware('is_admin')->group(function (){
        Route::get('products/create',Array(ProductController::class, 'create') )->name('products.create');
        Route::post('products',Array(ProductController::class, 'store') )->name('products.store');
        Route::get('products/{product}/edit', Array( ProductController::class,'edit') )->name('products.edit');
        Route::put('products/{product}', Array( ProductController::class,'update') )->name('products.update');
        Route::delete('products/{product}', Array( ProductController::class,'destroy') )->name('products.destroy');
    });
});

Route::get('pub',function (){
    return view('landing.index');
});

//Route::resource('products', \App\Http\Controllers\ProductController::class)->middleware('auth');

Auth::routes();