<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController as I;
use App\Http\Controllers\SubCategoryController as SC;
use App\Http\Controllers\CategoryController as C;
use App\Http\Controllers\PageController as P;


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
    return view('main.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('items')->name('i_')->group(function () {
    Route::get('/', [I::class, 'index'])->name('index');
    Route::get('/create', [I::class, 'create'])->name('create');
    Route::post('/create', [I::class, 'store'])->name('store');
    Route::get('/show/{items}', [I::class, 'show'])->name('show');
    Route::delete('/delete/{items}', [I::class, 'destroy'])->name('delete');
    Route::get('/edit/{items}', [I::class, 'edit'])->name('edit');
    Route::put('/edit/{items}', [I::class, 'update'])->name('update');
    Route::get('/subcategory-list/{category_id}', [I::class, 'subcategoryList']);
});

Route::prefix('category')->name('c_')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index');
    Route::get('/create', [C::class, 'create'])->name('create');
    Route::post('/create', [C::class, 'store'])->name('store');
    Route::get('/show/{category}', [C::class, 'show'])->name('show');
    Route::delete('/delete/{category}', [C::class, 'destroy'])->name('delete');
    Route::get('/edit/{category}', [C::class, 'edit'])->name('edit');
    Route::put('/edit/{category}', [C::class, 'update'])->name('update');
});

Route::prefix('subCategory')->name('subc_')->group(function () {
    Route::get('/', [SC::class, 'index'])->name('index');
    Route::get('/create', [SC::class, 'create'])->name('create');
    Route::post('/create', [SC::class, 'store'])->name('store');
    Route::get('/show/{subCategory}', [SC::class, 'show'])->name('show');
    Route::delete('/delete/{subCategory}', [SC::class, 'destroy'])->name('delete');
    Route::get('/edit/{subCategory}', [SC::class, 'edit'])->name('edit');
    Route::put('/edit/{subCategory}', [SC::class, 'update'])->name('update');
});

Route::prefix('main')->name('m_')->group(function () {
    Route::get('/', [P::class, 'index'])->name('index');
    Route::get('/list', [P::class, 'list'])->name('list');
    Route::get('/show/{items}', [P::class, 'show'])->name('show');
    Route::post('/create', [P::class, 'store'])->name('store');
    Route::get('/show/{items}', [P::class, 'show'])->name('show');

});