<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
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
    return view('welcome');
});

Route::get('/',function(){
    return view('index');
});

Route::resource('products',ProductController::class);
Route::resource('carts',CartController::class);
Route::resource('cart_items',CartItemController::class);
Route::post('signup',[AuthController::class,'signup']);
Route::post('login',[AuthController::class,'login']);
Route::group(['middleware'=>'auth:api'],function(){
 Route::get('user',[AuthController::class,'user']);
 Route::get('logout',[AuthController::class,'logout']);
});