<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Notificaciones;

class VisualisConController extends Controller
{
    

public function index()
{
	
//buscar usuario con este id o en la vista ...muestro el nombre del usuario emisor...aunque nos si es bueno que sepa esto sino que diga rentas o algo asi....ya vemos como hacemos la parte del emisor.
//pero externament creo q no es bueno saber quien te envia el msj ....sino solamente mostrar desde que lugar....despacho Rentas?
//tesoreriaç???
//buscar la direccion??.-..
//o permitir elegirla.... hacer y proponer algo en base a eso mejorar

	  $notificaciones = Notificaciones::where('id_recep','=',auth()->id())->get();

      return view('vistacontr',compact('notificaciones'));



	//return view('vistacontr');


}

}
