<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductTypeController;
use App\Models\Product_type;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/administration',[AdminController::class,'index'])->name('administration.index');
Route::get('/product_type',[ProductTypeController::class,'index'])->name('product_type.index');
Route::post('/product_type_register',[ProductTypeController::class,'store'])->name('product_type_register.store');
