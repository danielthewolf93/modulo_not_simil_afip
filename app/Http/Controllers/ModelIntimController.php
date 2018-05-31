<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Collection;

use App\Notificaciones;

use App\ModelDetalle;

use App\Modelos;

use Illuminate\Support\Facades\Input;



class ModelIntimController extends Controller
{
    

public function save_model(Request $req)
{
	
	//guardar en la tabla modelos y dejar para enviar luego.
	//ir llenando una con los modelos de intimaciones.
	//
	//hacer un historial...
	

	//faltan validaciones
	


	$modeldet= ModelDetalle::create([

		'tributo' => 		$req->model_tributo,//dentro del ente de tamño 4 de longitud es el tributo
		'periodo' => 		$req->model_periodo,//mes y anio del dia elegido por el que lo intiman
		'tipo_modelo' => 	$req->model_tip,
		'texto_1' => 		$req->texto1,
		'texto_2' => 		$req->texto2,
		'texto_3' => 		$req->texto3,
		'texto_4' => 		$req->texto4,
		'texto_5' => 		$req->texto5,
		'importe' => 		$req->importe,






	]);

    $id_tabla=$modeldet->id;




	$model= Modelos::create([

		//la fecha de envio no la tengo aca porque utiliozare las notificaciones
		//en las cuales utilizo el campo adjunto como modelo y id mensaje lleva el id modelo para recuperar
		//y mostrarlo desde la base de datos.

		'id_model_detall' => 	$id_tabla,
		'estado' => 		'guardado',
		'cuit_contrib' => 	$req->model_cuit_cont,
		'id_personal' => 	$req->model_user,
		'dia_cread' => 		$req->model_fecha_creac,
		'dia_referenc' => 	$req->model_fecha_eleg,
		'dia_mod' => 		$req->model_fecha_creac,
		'matricula' => 		$req->model_cuit_matr,



	]);

if (isset($model)) {
	
	echo "<script> alert('Modelo guardado'); </script>";

}
	

	//intimaciones
	
	//return back();

	 return view('intim');

	//volver al mismo modelo



}

}
