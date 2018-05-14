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
/*
Route::get('formulario','StoreController@index')->name('formulario');*/

Route::get('/intim','IntimController@index')->name('intim');


//Almacenar los documentos 
Route::get('/formulario','StoreController@index')->name('formu');



//ruta que procesa los datos

Route::post('/prueba3/public/storage/create', 'StoreController@guardar')->name('proces');



//
//con esto borro los pdf.
//Storage::delete('file.jpg');
//Storage::delete(['file1.jpg', 'file2.jpg']);
//
//


//Para ver el archivo
//tambien lo descarga
//
Route::get('storage/{archivo}', function ($archivo) {
     $public_path = public_path();
     $url = $public_path.'/storage/'.$archivo;
     //verificamos si el archivo existe y lo retornamos
     if (Storage::exists($archivo))
     {
       return response()->download($url);

     }
     //si no se encuentra lanzamos un error 404.
     abort(404);

});

//Route::get('/prueba3/public/storage/create','StoreController@mostrar');



Route::get('/visualizacioncont','VisualisConController@index')->name('visualcon');