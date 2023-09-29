<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LoginController;


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
Route::get('/products', [ProductController::class,'index'])->name('products.index');
Route::get('/products/find', [ProductController::class,'find'])->name('products.find');
Route::get('/products/{product}',[ProductController::class,'show'])->name('products.show');
Route::get('/myadmin',[LoginController::class,'index'])->name('myadmin.index');
Route::post('/myadmin',[LoginController::class,'login'])->name('myadmin.login');
Route::get('/myadmin/store',[LoginController::class,'show'])->name('myadmin.show');
Route::get('/myadmin/list',[LoginController::class,'list'])->name('myadmin.list');

Route::get('/myadmin/{product}/edit',[LoginController::class,'edit'])->name('myadmin.edit');
Route::put('/myadmin/{product}',[LoginController::class,'update'])->name('myadmin.update');

Route::post('/myadmin/store',[LoginController::class,'store'])->name('myadmin.store');
Route::delete('/myadmin',[LoginController::class,'logout'])->name('myadmin.logout');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/favorite',[FavoriteController::class,'index'])->name('favorite.index');
    Route::post('/favorite',[FavoriteController::class, 'store'])->name('favorite.store');
    Route::delete('/favorite/{favorite}',[FavoriteController::class, 'destroy'])->name('favorite.delete');
});

require __DIR__.'/auth.php';
