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

}

}
