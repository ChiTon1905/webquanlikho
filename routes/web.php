<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductInController;
use App\Http\Controllers\ProductOutController;
use App\Models\Category;
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
    return view('index');
});

Route::get('/',[AdminController::class, 'index'])->name('index');

//category
Route::get('/category',[CategoryController::class, 'index'])->name('category.index');
Route::get('/category/insert',[CategoryController::class, 'addCategory'])->name('category.insert');
Route::post('/category/insert/store-category',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/edit-{id}',[CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update',[CategoryController::class,'update'])->name('category.update');
Route::get('/category/{id}',[CategoryController::class,'destroy'])->name('category.destroy');

//product
Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/insert',[ProductController::class,'create'])->name('product.create');
Route::post('/product/insert/store-product',[ProductController::class,'store'])->name('product.store');
Route::get('/product/edit-{id}',[ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update',[ProductController::class,'update'])->name('product.update');
Route::get('/product/{id}',[ProductController::class,'destroy'])->name('product.destroy');

//product_in
Route::get('/product_in',[ProductInController::class,'index'])->name('productIn.index');
Route::get('/product_in/insert',[ProductInController::class,'create'])->name('productIn.create');
Route::post('/product_in/insert/store-product_in',[ProductInController::class,'store'])->name('productIn.store');
Route::get('/product_in/edit-{id}',[ProductInController::class, 'edit'])->name('productIn.edit');
Route::post('/product_in/update',[ProductInController::class,'update'])->name('productIn.update');
Route::get('/product_in/{id}',[ProductInController::class,'destroy'])->name('productIn.destroy');

//product_out
Route::get('/product_out',[ProductOutController::class,'index'])->name('productOut.index');
Route::get('/product_out/insert',[ProductOutController::class,'create'])->name('productOut.create');
Route::post('/product_out/insert/store-product_out',[ProductOutController::class,'store'])->name('productOut.store');
Route::get('/product_out/edit-{id}',[ProductOutController::class, 'edit'])->name('productOut.edit');
Route::post('/product_out/update',[ProductOutController::class,'update'])->name('productOut.update');
Route::get('/product_out/{id}',[ProductOutController::class,'destroy'])->name('productOut.destroy');

//PDF
Route::get('/PDF/exportPDF',[PDFController::class,'exportPDF'])->name('exportPDF');
Route::get('/PDF/exportPDFProductOut',[PDFController::class,'exportPDFProductOut'])->name('exportPDFProductOut');

//EXCEL
Route::get('/excel/export', [ExcelController::class, 'export'])->name('exportExcel');
Route::get('/excel/exportProductOut', [ExcelController::class, 'exportProductOut'])->name('exportExcelProductOut');

