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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', ['as' => 'welcome', 'uses' => 'Admin\IndexController@show']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@change')->name('home');
Route::get('/users/confirmation{token}', 'Auth\RegisterController@confirmation')->name('confirmation');

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/changeuser', 'AdminController@ChangeUser')->name('change');
	Route::post('/changeuser', 'AdminController@ChangeUser')->name('change');
	Route::get('/canceladmin', 'AdminController@cancelAdmin')->name('cancel');
	Route::post('/canceladmin', 'AdminController@cancelAdmin')->name('cancel');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/showuser', 'AdminController@showUsers')->name('show.users');
	Route::get('/showadmins', 'AdminController@showAdmins')->name('show.admins');
	Route::get('/find', 'AdminController@find')->name('find');
	Route::post('/find', 'AdminController@findresult')->name('find.result');

});	