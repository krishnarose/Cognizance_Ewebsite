<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::prefix('user')->middleware(['auth', 'user-type:user'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'user'])->name('user');
    Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
    Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
    Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

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


    Route::get('/featured/categories', [App\Http\Controllers\Admin\featuredController::class, 'View_featured_categories']);
    Route::post('/featured/categories/store', [App\Http\Controllers\Admin\featuredController::class, 'store_featured_category']);
    Route::get('/featured/courses', [App\Http\Controllers\Admin\featuredController::class, 'View_featured_courses']);
    Route::get('/featured/categories/delete/{id}', [App\Http\Controllers\Admin\featuredController::class, 'remove_featured_courses']);




});



