<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExpenseTypeController;
use App\Http\Controllers\ProductController;
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
Route::put('/product_type/{product_type}',[ProductTypeController::class,'update'])->name('product_type_edit.update');
Route::delete('/product_type/{product_type}',[ProductTypeController::class,'destroy'])->name('product_type.destroy');

Route::get('/expense_type',[ExpenseTypeController::class,'index'])->name('expense_type.index');
Route::post('/expense_type_register',[ExpenseTypeController::class,'store'])->name('expense_type_register.store');
Route::put('/expense_type/{expense_type}',[ExpenseTypeController::class,'update'])->name('expense_type_edit.update');
Route::delete('/expense_type/{expense_type}',[ExpenseTypeController::class,'destroy'])->name('expense_type.destroy');

Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::post('/product_register',[ProductController::class,'store'])->name('product_register.store');
Route::put('/product/{product}',[ProductController::class,'update'])->name('product_edit.update');
Route::delete('/product/{product}',[ProductController::class,'destroy'])->name('product.destroy');
