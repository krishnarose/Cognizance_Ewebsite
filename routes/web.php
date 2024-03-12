<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/category/{slug}', [App\Http\Controllers\Client\MenuController::class, 'index']);
// Route::get('/cart/{id}/add', [App\Http\Controllers\Client\ShopController::class, 'add_to_cart'])->name('shop.cart.add');
// Route::post('/cart/{user_id}/update', [App\Http\Controllers\Client\ShopController::class,'update_cart'])->name('shop.cart.update');
// Route::post('/address/create', [App\Http\Controllers\Client\AddressController::class, 'store'])->name('address.create');

// Route::get('/razorpay/{price}', [App\Http\Controllers\Payment\RazorpayController::class, 'index'])->name('razorpay.payment');
// Route::post('/order/store', [App\Http\Controllers\Client\OrderController::class, 'store'])->name('order.store');


Auth::routes();

Route::get('/email/verify', [App\Http\Controllers\Client\EmailVerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Client\EmailVerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [App\Http\Controllers\Client\EmailVerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::get('/user/shop', [App\Http\Controllers\Client\ShopController::class, 'shop'])->name('shop');


Route::get('/cart', [App\Http\Controllers\Client\CartController::class, 'index'])->name('cart');


Route::prefix('user')->middleware(['auth', 'email-verify', 'user-type:user'])->group(function () {

    Route::get('/category/{slug}', [App\Http\Controllers\Client\MenuController::class, 'index']);
    Route::get('/cart/{id}/add', [App\Http\Controllers\Client\ShopController::class, 'add_to_cart'])->name('shop.cart.add');
    Route::post('/cart/{user_id}/update', [App\Http\Controllers\Client\ShopController::class,'update_cart'])->name('shop.cart.update');
    Route::post('/address/create', [App\Http\Controllers\Client\AddressController::class, 'store'])->name('address.create');
    
    Route::get('/checkout', [App\Http\Controllers\Client\CartController::class, 'view_checkout'])->name('checkout');

    Route::post('/order/store', [App\Http\Controllers\Client\OrderController::class, 'store'])->name('order.store');
    Route::get('/razorpay/{price}', [App\Http\Controllers\Payment\RazorpayController::class, 'index'])->name('razorpay.payment');

    Route::get('/dashboard', [HomeController::class, 'user'])->name('user');




});

Route::prefix('admin')->middleware(['auth', 'user-type:admin'])->group(function () {

    Route::get('/dashboard',[App\Http\Controllers\Admin\DahboardController::class, 'index']);

    //CATEGORIES ROUTES
    Route::get('/categories',[App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('/trash',[App\Http\Controllers\Admin\CategoryController::class, 'trash']);
    Route::get('/trash/restore/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'restore'])->name('admin.trash.restore');
    Route::get('/trash/delete/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin.trash.delete');

    //featured ROUTES
    Route::get('/featured/categories', [App\Http\Controllers\Admin\featuredController::class, 'View_featured_categories']);
    Route::post('/featured/categories/store', [App\Http\Controllers\Admin\featuredController::class, 'store_featured_category']);
    Route::get('/featured/courses', [App\Http\Controllers\Admin\featuredController::class, 'View_featured_courses']);
    Route::get('/featured/categories/delete/{id}', [App\Http\Controllers\Admin\featuredController::class, 'remove_featured_courses']);


    // PRODUCTS ROUTES
    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class,'index'])->name('admin.products');
    Route::get('/product/create', [App\Http\Controllers\Admin\ProductController::class,'create'])->name('admin.product.create');
    Route::post('/product/store', [App\Http\Controllers\Admin\ProductController::class,'store'])->name('admin.product.store');
    Route::get('/product/{id}/show', [App\Http\Controllers\Admin\ProductController::class,'show'])->name('admin.product.show');
    Route::get('/product/{id}/edit', [App\Http\Controllers\Admin\ProductController::class,'edit'])->name('admin.product.edit');
    Route::post('/product/{id}/update', [App\Http\Controllers\Admin\ProductController::class,'update'])->name('admin.product.update');
    Route::get('/product/{id}/delete', [App\Http\Controllers\Admin\ProductController::class,'destroy'])->name('admin.product.delete');




});



