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


//ver esto id_mensaje_ id_recept y controlar si el id_recept es igual al id auth ... si es asi pase sino volver y dar un msj de 
//error
//y controlar el id_mensaje si existe sino mostrar una advertencia.
//con un cuadro de javascript

Route::get('/visualizacioncont/mensaje/{id_mensaje}/cuit/{id_recept}'
    ,'VisualisConController@cuerpo_msj')->name('msj_notif');



Route::get('/visualizacioncont/{id_notific}','VisualisConController@delete_not')->name('delete_not');


Route::get('C:/wamp/www/prueba3/public/storage/{id_notific}','VisualisConController@traerpdf')->name('pdf_get');



//Generar pdf
Route::get('/visualizacioncont/mensaje/cuit/modelo/{id_modelo}'
    ,'VisualisConController@imprimir_msj')->name('imprimir_msj');

 // Route::get('crear-obra/{id}', ['as' => 'crear_obra', 'uses' => 'ObrasController@create']);



/*
Route::get('model/{idmodel}/{cuit}/{matricula}/{fecha_hoy}/los',['as'=>'model1',function(idmodel,cuit,matricula,fecha_hoy){



if (idmodel==1) {
    return view('modelo1');

}

if (idmodel==2) {
    return view('modelo2');

}
if (idmodel==3) {
    return view('modelo3');
}




}]);*/

Route::post('/model','HomeController@elegirmodel')->name('model1');

/*
Route::get('k_calificacion/{id}/{idk}/asignar', [
            'uses' => 'K_calificacionController@asignar',
            'as'=>'k_calificacion.asignar']);
*/


Route::get('/modelo2',['as'=>'model2',function(){


return view('modelo2');



}]);

Route::get('/modelo3',['as'=>'model3',function(){


return view('modelo3');



}]);


//Route::get('formulario/$modelo','HomeController@elegirmodel')->name('formulario');
/*
Route::get('formulario','StoreController@index')->name('formulario');*/


//Modelos de intimaciones

Route::get('/intim','IntimController@index')->name('intim');


//Route::get('/intim/modelo_tipo/{modelo_tipo?}/cuit/{cuit?}','IntimController@agregar')->name('agregar_model_list');

Route::get('/intims','IntimController@agreg')->name('intims');



Route::post('/intimsss','IntimController@agreg2')->name('intimsss');
//---------------------------------------------------------


//Lista de Modelos

Route::get('/lista_modelos','LModelosController@index')->name('lista_modelos');


//Almacenar los documentos 
Route::get('/formulario','StoreController@index')->name('formul');



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

Route::get('/borrado','StoreController@borrar')->name('borrar_arch');



//Route::get('/prueba3/public/storage/create','StoreController@mostrar');



Route::get('/visualizacioncont','VisualisConController@index')->name('visualcon');


Route::get('/visualizacionconts','VisualisConController@baul')->name('baul');


//Rutas del modelo

Route::get('/model_save','ModelIntimController@save_model')->name('save_model');



/*
Route::get('/intim','IntimController@buscar')->name('intim2');
*/

/*
Route::get('/visualizacioncont','VisualisConController@busqueda')->name('busqueda');

*/

Route::get('search/autocomplete', 'SearchController@autocomplete')->name('search-autocomplete');


//controles para el ingreso en el formulario desde el servidor.
//debo controlar la entrada a personas ajenas

Route::get('/form', 'FormController@index')->name('formu') ;

Route::post('/form', 'FormController@store')->name('formus');



//Route::any('/formulario/contribuyente','ForController@contrib')->name('formularioss');


/*---Hacer 2 :layouts 1 para los contribuyentes y otro para los empleados normales. */



//--Rutas de Lista de Modelos---
//
Route::get('/lista_modelos/{id_mod}','LModelosController@delete_not')->name('delete_not_list');


//Generar pdf
Route::get('/lista_modelos/modelo/{id_modelo}'
    ,'LModelosController@visualizar_pdf_mod')->name('visualizar_modelo');