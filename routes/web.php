<?php

use App\Http\Controllers\BasicUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SaveCartController;
use App\Http\Controllers\ShopController;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[BasicUserController::class,'index'])->name('user.login');
Route::post('/check',[BasicUserController::class,'check'])->name('user.check');
Route::delete('/delete',[BasicUserController::class,'destroy'])->name('user.logout');

Route::get('/profile',[LandingPageController::class,'profile'])->name('profile.index');

Route::get('/home',[LandingPageController::class,'index'])->name('landing.page');

Route::get('/shop',[ShopController::class,'index'])->name('shop.index');

Route::get('/shop/{product}',[ShopController::class,'show'])->name('shop.show');

Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::get('/saveCart',[CartController::class,'saveCart'])->name('cart.save');
Route::post('/cart',[CartController::class,'store'])->name('cart.store');
Route::patch('/cart/{product}',[CartController::class,'update'])->name('cart.update');
Route::delete('/cart/{product}',[CartController::class,'destroy'])->name('cart.destroy');
Route::post('/cart/switchToSaveCart/{product}',[CartController::class,'switchToSaveCart'])->name('cart.switchToSaveCart');

Route::delete('/saveCart/{product}',[SaveCartController::class,'destroy'])->name('saveCart.destroy');
Route::post('/saveCart/switchToCart/{product}',[SaveCartController::class,'switchToCart'])->name('saveCart.switchToCart');

Route::post('/coupon',[CouponsController::class,'store'])->name('coupon.store');
Route::delete('/coupon',[CouponsController::class,'destroy'])->name('coupon.destroy');

route::get('/empty',function (){
    Cart::instance('default')->destroy();
});
Route::view('/thankyou','thankyou');
Route::view('/login','login');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
