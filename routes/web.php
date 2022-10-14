<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('order/pdf', [OrderController::class, 'downloadPdf'])->name('order.pdf');
Route::resource('order', OrderController::class);


Route::get('/product/trash', [ProductController::class, 'trash'])->name('product.trash');
Route::get('/product/{id}/restore', [ProductController::class, 'restore'])->name('product.restore');
Route::delete('/product/{id}/delete', [ProductController::class, 'delete'])->name('product.delete');
Route::get('product/pdf', [ProductController::class, 'downloadPdf'])->name('product.pdf');
Route::resource('product', ProductController::class);



Route::get('category/pdf', [CategoryController::class, 'downloadPdf'])->name('category.pdf');
Route::resource('category', CategoryController::class);
