<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController as I;
use App\Http\Controllers\SubCategoryController as SC;
use App\Http\Controllers\CategoryController as C;
use App\Http\Controllers\PageController as P;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\DashboardController as A;
use App\Http\Controllers\OrdersController as O;
use App\Http\Controllers\UserAddressController as UA;


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
    Route::get('/', [I::class, 'index'])->name('index')->middleware('gate:admin');
    Route::get('/create', [I::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [I::class, 'store'])->name('store')->middleware('gate:admin');
    Route::get('/show/{items}', [I::class, 'show'])->name('show')->middleware('gate:admin');
    Route::delete('/delete/{items}', [I::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{items}', [I::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{items}', [I::class, 'update'])->name('update')->middleware('gate:admin');
    Route::get('/subcategory-list/{category_id}', [I::class, 'subcategoryList'])->middleware('gate:admin');
});

Route::prefix('category')->name('c_')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index')->middleware('gate:admin');
    Route::get('/create', [C::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [C::class, 'store'])->name('store')->middleware('gate:admin');
    Route::get('/show/{category}', [C::class, 'show'])->name('show')->middleware('gate:admin');
    Route::delete('/delete/{category}', [C::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{category}', [C::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{category}', [C::class, 'update'])->name('update')->middleware('gate:admin');
});

Route::prefix('subCategory')->name('subc_')->group(function () {
    Route::get('/', [SC::class, 'index'])->name('index')->middleware('gate:admin');
    Route::get('/create', [SC::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [SC::class, 'store'])->name('store')->middleware('gate:admin');
    Route::get('/show/{subCategory}', [SC::class, 'show'])->name('show')->middleware('gate:admin');
    Route::delete('/delete/{subCategory}', [SC::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{subCategory}', [SC::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{subCategory}', [SC::class, 'update'])->name('update')->middleware('gate:admin');
});

Route::get('/', [P::class, 'index'])->name('index');
Route::get('/list', [P::class, 'list'])->name('list');
Route::get('/show/{items}', [P::class, 'show'])->name('show');
Route::post('/create', [P::class, 'store'])->name('store');
Route::put('/rate/{items}', [P::class, 'rate'])->name('rate')->middleware('gate:user');



Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

Route::prefix('admin')->name('a_')->group(function () {
    Route::get('dashboard', [A::class, 'index'])->name('index')->middleware('gate:admin');
});


Route::prefix('order')->name('o_')->group(function () {
    Route::get('/', [O::class, 'index'])->name('index')->middleware('gate:user');
    Route::get('/list', [O::class, 'list'])->name('list')->middleware('gate:admin');
    Route::post('/create', [O::class, 'store'])->name('store')->middleware('gate:user');
    Route::delete('/delete/{order}', [O::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{order}', [O::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{orders}', [O::class, 'update'])->name('update')->middleware('gate:admin');
});

Route::prefix('address')->name('ua_')->group(function () {
    Route::get('/', [UA::class, 'index'])->name('index')->middleware('gate:user');
    Route::get('/list', [UA::class, 'list'])->name('list')->middleware('gate:admin');
    Route::get('/create', [UA::class, 'create'])->name('create')->middleware('gate:user');
    Route::post('/create', [UA::class, 'store'])->name('store')->middleware('gate:user');
    Route::delete('/delete/{userAddress}', [UA::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{userAddress}', [UA::class, 'edit'])->name('edit')->middleware('gate:user');
    Route::put('/edit/{userAddress}', [UA::class, 'update'])->name('update')->middleware('gate:user');
});