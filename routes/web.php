<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

Route::get('/', [HomeController::class,'index'])->name('product.index');

Route::get('/login',[AuthController::class,'Login'])->name('login');
Route::post('/login',[AuthController::class,'doLogin']);
Route::delete('/logout',[AuthController::class,'Logout'])->name('logout');


Route::get('/produits/{slug}-{product}',[ProductController::class,'show'])->name('product.show')->where([
    'product'=>$idRegex,
    'slug'=>$slugRegex
]);

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function (){
    Route::resource('/product',\App\Http\Controllers\admin\ProductController::class)->except(['show']); 
});
