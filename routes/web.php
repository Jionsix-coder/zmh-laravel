<?php

use App\Http\Controllers\BasicUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\OrderController;
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
Route::get('/english',[BasicUserController::class,'indexenglish'])->name('user.loginenglish');

Route::post('/check',[BasicUserController::class,'check'])->name('user.check');
Route::post('/check/english',[BasicUserController::class,'checkenglish'])->name('user.checkenglish');

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

Route::post('/order',[OrderController::class,'store'])->name('order.store');
Route::get('/search',[ShopController::class,'search'])->name('shop.search');

Route::post('/basicuser',[BasicUserController::class,'update'])->name('basicuser.update');

Route::get('/armakhan',[NavbarController::class,'armakhan'])->name('navbar.armakhan');
Route::get('/discipline',[NavbarController::class,'discipline'])->name('navbar.discipline');
Route::get('/newmember',[NavbarController::class,'newmember'])->name('navbar.newmember');
Route::get('/aboutmember',[NavbarController::class,'aboutmember'])->name('navbar.aboutmember');

Route::get('/contact',[PagesController::class,'contactUs'])->name('pages.contactUs');
Route::get('/about',[PagesController::class,'aboutUs'])->name('pages.aboutUs');
Route::get('/comming-soon',[PagesController::class,'commingSoon'])->name('pages.commingSoon');
Route::get('/faqs',[PagesController::class,'faqs'])->name('pages.faqs');

Route::get('/thankyou',[ConfirmationController::class,'index'])->name('confirmation.index');
Route::view('/login','login');

route::get('/empty',function (){
    Cart::instance('default')->destroy();
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
