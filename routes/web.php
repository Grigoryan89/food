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

Route::view('/', 'welcome');
Route::view('/home','home');
Auth::routes();

Route::get('/users/logout','Auth\LoginController@userLogout')->name('user.logout');

Route::group(['namespace' => 'Auth', 'prefix' => 'admin'], function () {
    Route::get('/login','AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout','AdminLoginController@logout')->name('admin.logout');

    Route::post('/password/email','AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{token}','AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
Route::get('/','AdminController@dashboard')->name('admin.dashboard');
Route::post('/block/user', 'AdminController@blockUser')->name('admin.block.user');
Route::get('/users', 'AdminController@users')->name('admin.users');
});

Route::get('/categories','CategoryController@index');
Route::post('/add','CategoryController@addCategory')->name('add.category');
Route::post('/parent','CategoryController@addSub')->name('add.parent');
Route::get('/show/category','CategoryController@show')->name('show.category');
Route::get('/edit/{id}/cat','CategoryController@edit')->name('edit.subCategory');
