<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Notificaciones;

use Illuminate\Support\Facades\Input;

class VisualisConController extends Controller
{
    

public function index()
{
	
	//agregar un segundo campo de notificacion para ver el tema de el estado notificacion debido a los mensajes masivos
	//
	//*Ver notificaciones masivas como visualizarlas y poder borrarlas para ese usuario pero sin sacar las notificaciones de los
	//demas

	 $notificaciones = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'!=','baja')->orderBy('created_at','DSC')->get();

	//  $notificaciones = Notificaciones::where('id_recep','=',auth()->id())->get();



	 $notifleid = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'!=','baja')->where("notif_estado",'=','leido')->get();

	  $notificacionesnleidas = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'=','activo')->get();



      return view('vistacontr',compact('notificaciones','notificacionesnleidas','notifleid'));



	//return view('vistacontr');


}

public function cuerpo_msj($id_mensaje,$id_recept)
{


	
	
	//controlamos que el id del contrib == id del mensaje q quiere entrar sino sale un error
	//
	//controlar que el id del mensaje conrresponda con el id del mensaje del contrib
	//
	//Luego de eso traer todos los datos del mensaje desde la base de datos....
	
/*
	$inputs=Input::all();
	$escritor_id = $inputs['id];

	if ($req->id_contrib==auth()->id()) {
		# code...
	}
	
	tambien debo guardar un registro del movimiento de lo que estoy haciendo ademas de poder hacer
	un update para actualizar el campo updated_at y tambien notif_estado a leido una vez que se acceda y cada vez que se acceda actualizar todo pero guardar registro de todo en notificaciones_movimiento.
	*/





	$inputs=Input::all();

	//$mensaje= $req['id_notific'];


	$notificaciones = Notificaciones::where('id_notific','=',$id_mensaje)->get();


	// $notificaciones = Notificaciones::where('id_recep','=',auth()->id())->get();
	



/*
	 Notificaciones::update([

	 		'id_notific' => $request->id_notif,
            'tipo_notific'  =>    $request->tipo_not,
            'notif_estado'  =>   'leido',
            'texto_notific' =>    $request->body,
            'adjunto'  => 'vacio',
            'id_personal' => auth()->id(),
            'id_recep' =>   $request->recipient_id,
            'notif_despac' => 'COBRANZA RENTAS CAT.',
            'tema_notif' => $request->tema_not,

            

        ]);

*/

      $affectedRows = Notificaciones::where('id_notific','=',$id_mensaje)->update(['notif_estado' => 'leido']);



      $notificacionesnleidas = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'=','activo')->get();

     // where('name', '=', $name)->where("pass", '=', $pass)->


      return view('vistamensaje',compact('id_mensaje','notificaciones','notificacionesnleidas'));

    //  return view('vistamensaje',compact('id_mensaje','notifs'));


    //	return view('home',compact('users'));

// ver id mensaje buscar en base de datos traer los datos del mensaje junto con el tema de la notificacion si incluye o no archivo 
// adjunto....
// 
// 
/*	$contrib= $inputs['id_recept'];

	$mensaje= $inputs['id_notif'];


*/

/*

	 Notificaciones::update([

	 		'id_notific' => $request->id_notif,
            'tipo_notific'  =>    $request->tipo_not,
            'notif_estado'  =>   'leido',
            'texto_notific' =>    $request->body,
            'adjunto'  => 'vacio',
            'id_personal' => auth()->id(),
            'id_recep' =>   $request->recipient_id,
            'notif_despac' => 'COBRANZA RENTAS CAT.',
            'tema_notif' => $request->tema_not,

            

        ]);



*/


        


	

}


public function delete_not($id_notific)
{


  Notificaciones::where('id_notific','=',$id_notific)->update(['notif_estado' => 'baja']);


  $notificaciones = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'!=','baja')->get();


  $notificacionesnleidas = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'=','activo')->get();


  return view('vistacontr',compact('notificaciones','notificacionesnleidas'));



}



}
