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


//LANGUAGE ROUTES
/*Route::resource('/language/',"LanguagesController" );

Route::patch('/language/{id}/update',['as'=>'language.update', 'uses'=>'LanguagesController@update']);

Route::get('/language/{id}/edit',['as'=>'language.edit', 'uses'=>'LanguagesController@edit']);



Route::patch('/language/update/{id}',['as'=>'language.update', 'uses'=>'LanguagesController@update']);

Route::get('/language/edit/{id}',['as'=>'language.edit', 'uses'=>'LanguagesController@edit']);






*/
//Route::resource('language',"LanguagesController" );

/*Route::get('language',"LanguagesController@index" );

Route::get('language/create',"LanguagesController@create" );

Route::get('language/{id}',['as'=>'show', 'uses'=>'LanguagesController@show'] );

Route::post('language', 'LanguagesController@store');

Route::get('language/{id}/edit',['as'=>'edit', 'uses'=>'LanguagesController@edit'] );

Route::put('language/{id}', 'LanguagesController@update');
*/


Route::resource('language',"LanguagesController" );


Route::resource('user',"UsersController" );




//REGSITRATION
Route::get('register',"RegisterController@index" );

Route::get('login', 'PagesController@getLogin');

Route::get('about', 'PagesController@getAbout');

Route::get('contact', 'PagesController@getContact');

Route::get('/',"PagesController@getIndex" );

Auth::routes();

Route::get('/home', 'HomeController@index');
