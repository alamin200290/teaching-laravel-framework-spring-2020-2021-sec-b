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
    //return view('welcome');
    echo "welcome";
});


Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@verify');
Route::get('/logout', 'LogoutController@index');
//Route::get('/home', 'HomeController@index');

Route::group(['middleware'=> 'sess'], function(){
    Route::get('/home', ['uses'=>'HomeController@index']);
    
    Route::get('/home/create', 'HomeController@create')->middleware('sess')->name('home.create');
    Route::post('/home/create', 'HomeController@store');
    Route::get('/home/userlist', 'HomeController@userlist')->name('home.userlist');
    Route::get('/home/edit/{id}', 'HomeController@edit')->name('home.edit');
    Route::post('/home/edit/{id}', 'HomeController@update');
    Route::get('/home/delete/{id}', 'HomeController@delete');
    Route::post('/home/delete/{id}', 'HomeController@destroy');
    Route::get('/home/details/{id}', 'HomeController@show');

    Route::resource('/product', 'ProductController');
    //Route::get('/product/abc/{id}', 'ProductController@xyz');
});


