<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Collection;

use App\Http\Requests;

use App\Notificaciones;

use PDF;

use App;

use App\novedades;

use App\Modelos;

use App\ModelTipo;

use App\ModelDetalle;

use App\movimientos_cont;

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

	  $nombre = "Notificaciones";

	  $notifborradas = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'=','baja')->orderBy('created_at','DSC')->get();


    $novedades = novedades::where('fecha_hasta','>=',date('Y-m-d'))->orderBy('fecha_desde','DSC')->get();


    return view('vistacontr',compact('notificaciones','notificacionesnleidas','notifleid','nombre','notifborradas','novedades'));



	//return view('vistacontr');


}


public function baul()
{
	
  $notificaciones = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'=','baja')->orderBy('created_at','DSC')->get();

	//  $notificaciones = Notificaciones::where('id_recep','=',auth()->id())->get();



	 $notifleid = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'!=','baja')->where("notif_estado",'=','leido')->get();

	  $notificacionesnleidas = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'=','activo')->get();

	  $notifborradas = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'=','baja')->orderBy('created_at','DSC')->get();

	  $nombre= "Avisos Archivados";

    $novedades = novedades::where('fecha_hasta','>=',date('Y-m-d'))->orderBy('fecha_desde','DSC')->get();

	 // $modelosIntimac = Modelos::where('cuit_contrib','=',20374625323)->where('estado','=','enviado')->get();



    return view('vistacontr',compact('notificaciones','notificacionesnleidas','notifleid','nombre','notifborradas','novedades'));

}






public function imprimir_msj($id_modelo)
{
	//Descargar el archivo modelo de intimacion 
		
		$import=0;
		
		$modeloInt= Modelos::where('id','=',$id_modelo)->get();






       	//ver si hace falta guardar los detalles es decir en vez de hacer la baja logica aplicar una fisica ...

       	$modeloIntDet= ModelDetalle::where('idmodelo','=',$id_modelo)->where("estado_mdetalle",'=','guardado')->get();

   		
   		foreach ($modeloIntDet as $md) {
   			

   			$import= ($import )+ ($md->importe);

   		}

   		foreach ($modeloInt as $m ) {
   			
   			$cuitc= $m->cuit_contrib;
        $id_tip= $m->tipo_modelo;

   		}

   		
      $mdtipos = ModelTipo::where('id_tipo_model','=',$id_tip)->get();


//insertamos registro en la base de datos mov_contribuyente ---Para luego tener el historial.
//------------------------------------------------------------------------------------------.
//------------------------------------------------------------------------------------------.

    


      $notif = Notificaciones::where('adjunto','=',$id_modelo)->get();


      foreach ($notif as $nt ) {
        
         $id_noti = $nt->id_notific;

      }
     

    $modeldet= movimientos_cont::create([

    'cuit' =>  auth()->id(),
    'mov_descripcion' => 'Modelo intimacion descargado',
    'id_notificac' => $id_noti,
 

  ]);



//-------------------------------------------------------------------------------
   		
   		$view =  view('invoice', compact('id_mensaje','notificaciones','notificacionesleidas','datos_pruebamod','modeloInt','modeloIntDet','import','mdtipos'))->render();

        $pdf = App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        
       // return $pdf->download('intimacion_cuit.pdf');

        return $pdf->download("intim.$cuitc.pdf");

        //para solo descargar
        //        return $pdf->stream('invoice');

     	



        
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
        foreach ($notificaciones as $not) {
          
        }

        if ($not->notif_estado=='activo') {

          
        $affectedRows = Notificaciones::where('id_notific','=',$id_mensaje)->update(['notif_estado' => 'leido']);


          $modeldet= movimientos_cont::create([

           'mov_descripcion' => 'Mensaje leìdo',
           'id_notificac' => $id_mensaje,
           'cuit' =>  $id_recept,

            ]);


        }







      $notificacionesnleidas = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'=','activo')->get();




     // where('name', '=', $name)->where("pass", '=', $pass)->
     // 
     // 

       if ($not->adjunto > 1) {

      //aca pasariamos los datos del modelo si existe ...para generar el pdf
      
        $modeloInt= Modelos::where('id','=',$not->adjunto)->get();


        //ver si hace falta guardar los detalles es decir en vez de hacer la baja logica aplicar una fisica ...

        $modeloIntDet= ModelDetalle::where('idmodelo','=',$not->adjunto)->where("estado_mdetalle",'=','guardado')->get();


        foreach ($modeloInt as $mdtipo) {
          
          $tip_mod = $mdtipo->tipo_modelo;

        }

        $modeltip= ModelTipo::where('id_tipo_model','=',$tip_mod)->get();



      return view('vistamensaje',compact('id_mensaje','notificaciones','notificacionesleidas','modeloInt','modeloIntDet','modeltip'));
     }






      return view('vistamensaje',compact('id_mensaje','notificaciones','notificacionesnleidas'));

    //  return view('vistamensaje',compact('id_mensaje','notifs'));


    //  return view('home',compact('users'));

// ver id mensaje buscar en base de datos traer los datos del mensaje junto con el tema de la notificacion si incluye o no archivo 
// adjunto....
// 
// 
/*  $contrib= $inputs['id_recept'];

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


 // $notificaciones = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'!=','baja')->get();


  $notificacionesnleidas = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'=','activo')->get();


  	 $notificaciones = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'!=','baja')->orderBy('created_at','DSC')->get();

	//  $notificaciones = Notificaciones::where('id_recep','=',auth()->id())->get();



	 $notifleid = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'!=','baja')->where("notif_estado",'=','leido')->get();

	 $notifborradas = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'=','baja')->orderBy('created_at','DSC')->get();

	 $nombre = "Notificaciones";

       $novedades = novedades::where('fecha_hasta','>=',date('Y-m-d'))->orderBy('fecha_desde','DSC')->get();


  return view('vistacontr',compact('notificaciones','notificacionesnleidas','notifleid','notifborradas','nombre','novedades'));



}


public function delete_modedeta($id)
{



    


  $modeldet=ModelDetalle::where('id_mdetalles','=',$id)->get();


  foreach ($modeldet as $md ) {
    

    $id_tabla = $md->idmodelo;
   
  }

  $modl = Modelos::where('id','=',$id_tabla)->get();


  foreach ($modl as $modls ) {
    

    

    $model = $modls->tipo_modelo;
    $cuitcon = $modls->cuit_contrib;
  }

  $modeldet="";

   ModelDetalle::where('id_mdetalles', '=', $id)->delete();



  //ModelDetalle::destroy($id);

 // ModelDetalle::where('id_mdetalles','=',$id)->update(['estado_mdetalle' => 'baja']);


 // $modeloIntDet= ModelDetalle::where('idmodelo','=',$id_tabla)->where("estado_mdetalle",'=','guardado')->get();




         $modeloIntDet= ModelDetalle::where('idmodelo','=',$id_tabla)->where("estado_mdetalle",'!=','baja')->get();


          


        return view('prueb',compact('modeloIntDet','id_tabla','model','cuitcon'));


}







public function traerpdf($id_notific)
{

	//traer pdf.
	$not=Notificaciones::where('id_notific','=',$id_notific);


	return ;

	# code...
}


}
