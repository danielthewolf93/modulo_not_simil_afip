<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Notificaciones;

class VisualisConController extends Controller
{
    

public function index()
{
	


	  $notificaciones = Notificaciones::where('id_recep','=',auth()->id())->get();

      return view('vistacontr',compact('notificaciones'));



	//return view('vistacontr');


}

public function cuerpo_msj()
{
	
	//controlamos que el id del contrib == id del mensaje q quiere entrar sino sale un error
	//
	//controlar que el id del mensaje conrresponda con el id del mensaje del contrib
	//
	//Luego de eso traer todos los datos del mensaje desde la base de datos....
	
/*
	$inputs=Input::all();
	$escritor_id = $inputs['id];
	
	tambien debo guardar un registro del movimiento de lo que estoy haciendo ademas de poder hacer
	un update para actualizar el campo updated_at y tambien notif_estado a leido una vez que se acceda y cada vez que se acceda actualizar todo pero guardar registro de todo en notificaciones_movimiento.
	*/

	return view('vistamensaje');

}

}
