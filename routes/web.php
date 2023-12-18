<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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
//TODO::Админку добавлять товары и менять статусы заказам тоже самое с категориями.
//Остальные мелкие страницы с текстом(О нас и тд)

Route::get('/', HomeController::class)->name('home');
Route::get('/category/{category}', CategoryController::class)->name('category');
Route::get('/category/{category}/{sub_category}', SubCategoryController::class)->name('subcategory');

Route::get('/login', [LoginController::class, 'show'])->name('log_p');
Route::get('/register', [RegisterController::class, 'show'])->name('reg_p');

Route::post('/login', [LoginController::class, 'store'])->name('log_s');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/register/store', [RegisterController::class, 'store'])->name('reg_s');
Route::get('/item/{item}', [ItemController::class, 'show'])->name('item');

Route::middleware(['auth'])->group(function () {
    Route::post('/cart/change/amount', [CartController::class, 'change_amount'])->name('change_amount');
    Route::get('/cart', CartController::class)->name('cart');
    Route::get('/orders', OrderController::class)->name('orders');
    Route::post('/orders', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order/cancel/{order}', [OrderController::class, 'cancel'])->name('order.cancel');


    Route::post('cart/add/{item}', [ItemController::class, 'addToCart'])->name('add_to_cart');

    Route::post('get/item/{id}', [ItemController::class, 'get'])->name('get_item');
    Route::post('/cart/delete/{item}', [ItemController::class, 'delete_item_from_cart'])->name('delete_item_from_cart');
});
Route::middleware(['auth', 'admin'])->group(function () {
    //Route::get('/admin', AdminController::class)->name('admin');
    //Route::post('/admin/delete/category/{category}', [AdminController::class, 'deleteCategory'])->name('admin.category.delete');
    //Route::post('/change/order/status/{order}', [AdminController::class, 'changeOrderStatus'])->name('admin.change.status');
});
Route::post('/search', [ItemController::class, 'search'])->name('search');
Route::get('/search', [ItemController::class, 'search_p'])->name("search_p");
