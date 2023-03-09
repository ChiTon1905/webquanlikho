<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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


Route::get('/category',[CategoryController::class, 'index'])->name('category.index');
Route::get('/category/insert',[CategoryController::class, 'addCategory'])->name('category.insert');
Route::post('/category/insert/store-category',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/edit-{id}',[CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update',[CategoryController::class,'update'])->name('category.update');
Route::get('/category/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
