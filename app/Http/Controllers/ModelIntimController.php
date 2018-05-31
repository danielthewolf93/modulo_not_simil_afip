<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ModelIntimController extends Controller
{
    //
    //
    //
   

public function save_model(Request $request)
{
	
	//guardar en la tabla modelos y dejar para enviar luego.
	//ir llenando una con los modelos de intimaciones.
	//
	//hacer un historial...
	

	//faltan validaciones
	


	ModelDetalle::create([

		'tributo'=>$request->model_tributo,//dentro del ente de tamño 4 de longitud es el tributo
		'periodo'=>$request->model_periodo,//mes y anio del dia elegido por el que lo intiman
		'tipo_modelo'=>$request->model_tip,
		'texto_1'=>$request->texto1,
		'texto_2'=>$request->texto2,
		'texto_3'=>$request->texto3,
		'texto_4'=>$request->texto4,
		'texto_5'=>$request->texto5,
		'importe'=>$request->importe,






	]);


	ModelosIntimaciones::create([

		//la fecha de envio no la tengo aca porque utiliozare las notificaciones
		//en las cuales utilizo el campo adjunto como modelo y id mensaje lleva el id modelo para recuperar
		//y mostrarlo desde la base de datos.

		'id_model_detall'=>'id_anterior_model_detalle',
		'estado'=>'guardado',
		'cuit_contrib'=>$request->model_cuit_cont,
		'id_personal'=>$request->model_user,
		'dia_cread'=>$request->model_fecha_creac,
		'dia_referenc'=>$request->model_fecha_eleg,
		'dia_mod'=>$request->model_fecha_creac,
		
		'matricula'=>$request->model_cuit_matr,



	]);




	  return back()->with('flash','Modelo de Intimacion Guardado');



}

}
