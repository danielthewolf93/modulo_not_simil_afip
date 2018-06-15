<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Collection;

use App\Http\Requests;

use App\ModelDetalle;

use App\Modelos;

use App\ModelTipo;

use App\Notificaciones;

use  DB;

use PDF;

use App;

date_default_timezone_set('America/Argentina/Catamarca');

class LModelosController extends Controller
{
    


	public function index()
	{
		

			//Join para traer el resultado como una sola tabla y asi trabajar mas facil para luego hacer el foreach
			//solo traer los modelos con estado guardado
			//
			//creo que debemos no permitir borrar los datos del modelo
			//sino el contribuyente no podra visualizarlos
			//y generar el modelo correspondiente

		$modelos = Modelos::where('id_personal','=',auth()->id())->where('estado','=','guardado')->get();


//ver como traer id de la tabla modelos...
//se repite el campo en la tabla modelos_detalles seria algo : modelos.id as idmodelo 

		

            $listamodel= Modelos::where('id_personal','=',auth()->id())->where('estado','=','guardado')->get();


           

			return view('LModelos',compact('modelos','listamodel','id_m'));


	}



	public function delete_not($id_mod)
    {
        





		  Modelos::where('id','=',$id_mod)->update(['estado' => 'baja']);


		 // $notificaciones = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'!=','baja')->get();


		  //$modelos = Modelos::where('id_personal','=',auth()->id())->where('estado','=','guardado')->get();


		//ver como traer id de la tabla modelos...
		//se repite el campo en la tabla modelos_detalles seria algo : modelos.id as idmodelo 

/*

		$listamodel = DB::table('model_detalles')
            ->join('modelos', 'model_detalles.idmodelo', '=', 'modelos.id')
            ->select('model_detalles.*', 'modelos.estado', 'modelos.cuit_contrib','modelos.matricula')
            ->get();

       
*/
            $listamodel= Modelos::where('id_personal','=',auth()->id())->where('estado','=','guardado')->get();

            $modelos= Modelos::where('id_personal','=',auth()->id())->where('estado','=','guardado')->get();


           

			return view('LModelos',compact('modelos','listamodel','id_m'));

  


    }




    public function visualizar_pdf_mod($id_modelo)
    {
    	


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
     

//-------------------------------------------------------------------------------
   		
   		$view =  view('invoice', compact('id_mensaje','notificaciones','notificacionesleidas','datos_pruebamod','modeloInt','modeloIntDet','import','mdtipos'))->render();

        $pdf = App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        
       // return $pdf->download('intimacion_cuit.pdf');

        return $pdf->stream("intim.$cuitc.pdf");

        //para solo descargar
        //        return $pdf->stream('invoice');

     	










    }

}
