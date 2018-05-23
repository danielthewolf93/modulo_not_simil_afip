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

}
