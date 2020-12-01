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




Route::group(['prefix' => "Ad" ,'namespace' => 'App\Http\Controllers\admin'], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('catgroup', CategoryGroupController::class);
    Route::resource('product', ProductController::class);
});

// Route::get('fashionshop','App\Http\Controllers\frontend\TestController@pushData');

Route::get('fashionshop',function(){
    return view('shop.index');
});

