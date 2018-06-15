<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Collection;

use App\Notificaciones;

use App\ModelDetalle;

use App\Modelos;

use Illuminate\Support\Facades\Input;

date_default_timezone_set('America/Argentina/Catamarca');


class ModelIntimController extends Controller
{
    

public function save_model(Request $req)
{

	//-------------------------------------------------------------------
	//*Cambiar tabla de modelos debo crear una relacion de 1 a muchos
	//1 modelo puede tener + de un modelo detalle
	//-------------------------------------------------------------------


	//guardar en la tabla modelos y dejar para enviar luego.
	//ir llenando una con los modelos de intimaciones.
	//
	//hacer un historial...
	

	//faltan validaciones
	


	$model= Modelos::create([

		//la fecha de envio no la tengo aca porque utiliozare las notificaciones
		//en las cuales utilizo el campo adjunto como modelo y id mensaje lleva el id modelo para recuperar
		//y mostrarlo desde la base de datos.

		//'id_model_detall' => 	$id_tabla,
		'estado' => 		'guardado',
		'cuit_contrib' => 	$req->model_cuit_cont,
		'id_personal' => 	$req->model_user,
		'dia_cread' => 		$req->model_fecha_creac,
		'dia_referenc' => 	$req->model_fecha_eleg,
		'dia_mod' => 		$req->model_fecha_creac,
		'matricula' => 		$req->model_cuit_matr,
		'tipo_modelo' =>    $req->model_mode



	]);

    $id_tabla=$model->id;


	$modeldet= ModelDetalle::create([

		'idmodelo' =>       $id_tabla,
		'tributo' => 		$req->model_tributo,//dentro del ente de tamño 4 de longitud es el tributo...pueden ser varios
		'periodo' => 		$req->model_periodo,//mes y anio del dia elegido por el que lo intiman...pueden ser varios
		'tipo_modelo' => 	$req->model_tip,
		'texto_1' => 		$req->texto1,
		'texto_2' => 		$req->texto2,
		'texto_3' => 		$req->texto3,
		'texto_4' => 		$req->texto4,
		'texto_5' => 		$req->texto5,
		'importe' => 		$req->importe,
		'estado_mdetalle' => 'guardado',
		'matricula_inscripcion' => $req->model_cuit_matr,






	]);




if (isset($modeldet)) {
	
	echo "<script> alert('Modelo guardado'); </script>";

}
	

	//intimaciones
	
	//return back();

	 //return view('intim');
	 //
	 

	 return redirect('/intim')->withInput();


	//volver al mismo modelo



}

}
