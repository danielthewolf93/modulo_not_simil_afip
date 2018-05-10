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



Route::get('mensaje',function() {

return view('mensajes');

});

/*
Route::get('/modelo1','HomeController@modelo1')->name('model1');
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/messages', 'HomeController@store')->name('messages.store');



Route::get('/modelo1',['as'=>'modelo1',function() {

return view('modelo1');

}]);


