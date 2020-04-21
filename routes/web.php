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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login','AuthController@index');
Route::post('login','AuthController@CheckLogin');
Route::get('signup','AuthController@SignupForm');
Route::post('signup','AuthController@Signup');
Route::get('logout','AuthController@Logout');
/* For Admin */
Route::resource('admin','DashboardAdminController');
Route::resource('userType','UserTypeController');
Route::resource('user','UserController');
Route::resource('category','CategoryController');
Route::resource('recipientUser','RecipientUserController');
