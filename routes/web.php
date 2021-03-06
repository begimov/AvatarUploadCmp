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

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::group([
      'namespace' => 'Account',
      'prefix' => 'account',
      'middleware' => 'auth'
    ], function () {
      Route::post('avatar', 'AvatarController@store')->name('account.avatar.store');
      Route::patch('', 'AccountController@update')->name('account.update');
});
