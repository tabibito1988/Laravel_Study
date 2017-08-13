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

//問い合わせ
Route::get('/', 'ContactsController@index');
Route::post('store/', 'ContactsController@store');
Route::get('contacts/', 'ContactsController@contacts');
Route::get('contacts/show/{id}', 'ContactsController@show');