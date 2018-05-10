<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();



Route::get('/home', 'HomeController@index')->name('home');
Route::post('/messages', 'HomeController@store')->name('messages.store');



Route::get('/modelo1',['as'=>'model1',function(){


return view('modelo1');



}]);

Route::get('/modelo2',['as'=>'model2',function(){


return view('modelo2');



}]);

Route::get('/modelo3',['as'=>'model3',function(){


return view('modelo3');



}]);


//Route::get('formulario/$modelo','HomeController@elegirmodel')->name('formulario');

Route::get('formulario','StoreController@index');->name('formulario');

