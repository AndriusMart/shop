<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController as I;
use App\Http\Controllers\SubCategoryController as SC;
use App\Http\Controllers\CategoryController as C;

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
    return view('admin.index');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('items')->name('i_')->group(function () {
    Route::get('/', [I::class, 'index'])->name('index');
    Route::get('/create', [I::class, 'create'])->name('create');
    Route::post('/create', [I::class, 'store'])->name('store');
    Route::get('/show/{items}', [I::class, 'show'])->name('show');
    Route::delete('/delete/{items}', [I::class, 'destroy'])->name('delete');
    Route::get('/edit/{items}', [I::class, 'edit'])->name('edit');
    Route::put('/edit/{items}', [I::class, 'update'])->name('update');
});

Route::prefix('category')->name('c_')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index');
    Route::get('/create', [C::class, 'create'])->name('create');
    Route::post('/create', [C::class, 'store'])->name('store');
    Route::get('/show/{items}', [C::class, 'show'])->name('show');
    Route::delete('/delete/{items}', [C::class, 'destroy'])->name('delete');
    Route::get('/edit/{items}', [C::class, 'edit'])->name('edit');
    Route::put('/edit/{items}', [C::class, 'update'])->name('update');
});

Route::prefix('subCategory')->name('subc_')->group(function () {
    Route::get('/', [SC::class, 'index'])->name('index');
    Route::get('/create', [SC::class, 'create'])->name('create');
    Route::post('/create', [SC::class, 'store'])->name('store');
    Route::get('/show/{items}', [SC::class, 'show'])->name('show');
    Route::delete('/delete/{items}', [SC::class, 'destroy'])->name('delete');
    Route::get('/edit/{items}', [SC::class, 'edit'])->name('edit');
    Route::put('/edit/{items}', [SC::class, 'update'])->name('update');
});