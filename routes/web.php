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

Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');
 
Route::group(['middleware' => 'auth'], function () {
 
    Route::get('home', 'SudinController@index')->name('home');
    Route::get('logout', 'AuthController@logout')->name('logout');
    
 
});


Route::resource('masuk', 'MasukController');
Route::resource('keluar', 'KeluarController');


Route::post('masuk/{id}', 'MasukController@delete')->name('masuk-delete');
Route::post('keluar/{id}', 'KeluarController@delete')->name('keluar-delete');

Route::resource('manjuser', 'ManjUserController');
Route::post('manjuser/{id}', 'ManjUserController@delete')->name('user-delete');
