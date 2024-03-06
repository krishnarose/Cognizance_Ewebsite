<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\kris;

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



Route::middleware(['auth', 'user-type:user'])->group(function () {
    Route::get('/user-dashboard', [HomeController::class, 'user'])->name('user');


});

Route::middleware(['auth', 'user-type:admin'])->group(function () {
    Route::get('/admin-dashboard', [HomeController::class, 'admin'])->name('admin');


});



