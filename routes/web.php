<?php

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

//Route::view('/lallaa', 'Home.wechat',['url2'=>'']);

# 展示二维码
Route::get('/index','Home\IndexController@index');

# 支付页面
Route::get('/pay/{unique}','Home\IndexController@pay');

# 选择支付方式
Route::get('/pays/{pay_type}','Home\IndexController@pays');

# 微信支付
Route::get('/wechat/{money?}','Home\IndexController@wechat')->name('wechat');


# 支付宝支付
Route::get('/alipay/{money?}','Home\IndexController@alipay')->name('alipay');

Route::get('/test','Home\IndexController@test');//->name('alipay');

Route::get('/Unifiedorder','Home\IndexController@wpay');