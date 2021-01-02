<?php

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


Route::group(['namespace' => 'App\Http\Controllers'], function() {
	Route::get('login','LoginController@getLogin')->name('getLogin');
	Route::post('login','LoginController@postLogin')->name('postLogin');
	Route::get('logout','LoginController@getLogout')->name('getLogout');
});

Route::group(['prefix' => "fashionshop",'namespace' => 'App\Http\Controllers\user'], function() {
	Route::get('login','UserLoginController@getLogin')->name('userGetLogin');
	Route::post('login','UserLoginController@postLogin')->name('userPostLogin');
	Route::get('logout','UserLoginController@getLogout')->name('userLogout');
});

Route::group(['prefix' => "fashionshop",'namespace' => 'App\Http\Controllers\user'], function() {
	Route::get('register','UserRegisterController@getRegister')->name('userGetRegister');
	Route::post('register','UserRegisterController@postRegister')->name('userPostRegister');
});

Route::group(['middleware' => 'CheckAdminLogin','prefix' => "Ad" ,'namespace' => 'App\Http\Controllers\admin'], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin_index');
    Route::resource('catgroup', CategoryGroupController::class);
    Route::resource('product', ProductController::class);
    Route::resource('user',UserController::class);
    Route::resource('bill',BillController::class);
    
});

Route::group(['prefix' => "fashionshop" ,'namespace' => 'App\Http\Controllers\frontend'],function(){
    Route::get('/','IndexController@index')->name('index-shop');
    Route::get('product/{id}',"IndexController@product")->name('product');
    Route::get('Category/{id}','IndexController@listProductCategory')->name('category');
    Route::get('checkout','IndexController@checkOut')->name('checkOut');
});

Route::get('fashionshop/AddCart/{id}','App\Http\Controllers\user\CartController@addCart')->name('addCart');
Route::get('fashionshop/ListCart','App\Http\Controllers\user\CartController@viewListCart')->name('listCart');
Route::get('fashionshop/DeleteListCartItem/{id}','App\Http\Controllers\user\CartController@deleteListCartItem')->name('deleteListCartItem');
Route::get('fashionshop/SaveListCartItem/{id}/{quatity}','App\Http\Controllers\user\CartController@saveListCartItem')->name('saveListCartItem');
Route::get('fashionshop/ClearCart','App\Http\Controllers\user\CartController@clearCart')->name('clearCart');
Route::post('fashionshop/checkout','App\Http\Controllers\user\CartController@postCheckout')->name('postCheckOut');

Route::get('/','App\Http\Controllers\frontend\IndexController@index')->name('index-shop');


//Bill
Route::get('fashionshop/Bill/{id}','App\Http\Controllers\user\BillController@showBill')->name('showBill');
Route::get('fashionshop/Bill/Detail/{id}','App\Http\Controllers\user\BillController@billDetail')->name('billDetail');
Route::get('fashionshop/Bill/Cancel/{id}','App\Http\Controllers\user\BillController@userCancelBill')->name('userCancelBill');