<?php

namespace App\Http\Controllers;

use Response;

use Illuminate\Http\Request;

use App\User;

use App\rm_padron6;

use Session;

use App\Message;

use App\ModelDetalle;

use App\Notificaciones;

use Illuminate\Support\Facades\Input;

use Illuminate\Database\Eloquent\Collection;

use App\Modelos;

use App\ModelTipo;




class IntimController extends Controller
{
    



    public function index()
    {
    	



        $mode="";

    	return view('intim',compact('mode'));


    }




public function mas(Request $req)
{
    
    echo "Modelo Guardado";

    return back();

}









    public function agregar($id_mensaje,$id_recept)
    {

        //necesito retornar una vista donde este bloqueada o no aparezcan el modelo y el cuit para que no puedan seleccionars
        //puedo mostrar el tipo de modelo elegido los cuales paso por url
        //como asi tambien su cuit
        //debe ser la misma vista solamente que debo hacer con ajax para poder actualizar una parte de la pagina y no toda
        //tomo los datos
        //matricula
        //tributo
        //periodo
        //
        //
        //con el modelo y cuit elegido.
        //
        
//fijarme como pasar los datos del formulario a la otra vista

        $modelo_tipo= 1;

        $cuit = 20374625323;

    	return view('intim',compact('modelo_tipo','cuit'));


    }

        public function agregarconajax()
    {

        //debe ser la misma vista solamente que debo hacer con ajax para poder actualizar una parte de la pagina y no toda
        //puedo mostrar el tipo de modelo elegido
        //como asi tambien su cuit
       
        //tomo los datos
        //matricula
        //tributo
        //periodo
        //
        //
        //con el modelo y cuit elegido.

        return view('intim');

    }

    public function agregarcuit(Request $req)
    {
        
            $dato=$req->input('cuit');

            $dat="Cuit no encontrado";

            $ent ="Cuit no encontrado";

            $pd_nom ="Cuit no encontrado";

            $contrib_nomen ="Cuit no encontrado";

                   // $modeloIntDet= ModelDetalle::where('idmodelo','=',$id_tabla)->where("estado_mdetalle",'=','guardado')->get();


          //  $contrib = rm_padron6::where('pad_cuit_index','=',$dato)->get();


             $contrib_nomen = rm_padron6::where('pad_cuit_index','=',$dato)->get();

           //20069524959
           //
           //
                
               if (sizeof($contrib_nomen)==0) {

                $contrib_nomen="Cuit no encontrado";
               }




          
             return Response::json($contrib_nomen);
            


    }

public function agregartribut(Request $req)
{
    

    //controlar esto depende de que modelo es los datos que va a guardar y segun eso mostrar el immporte


    $dato=$req->input('cuit');

    $dato2=$req->input('_modelofo');

    $dato3=$req->input('_matricula');

    $dato4=$req->input('_tributo');

    $dato5=$req->input('_importe');



    

    $dato6=$req->input('_fecha');



    $periodo = date('m/Y',strtotime(str_replace('-','/',$dato6)));


    //guardar todo esto en el modelo y en la lista de modelos detalles...
    //relacionar todo esto
    //y luego ver q devolver.
    //lo ultimo



    $modeldet= ModelDetalle::create([

        'idmodelo' =>       999999,
        'tributo' =>        $dato4,//dentro del ente de tamño 4 de longitud es el tributo...pueden ser varios
        'periodo' =>        $periodo,//mes y anio del dia elegido por el que lo intiman...pueden ser varios
        'tipo_modelo' =>    $dato2,
        'texto_1' =>        "",
        'texto_2' =>        "",
        'texto_3' =>        "",
        'texto_4' =>        "",
        'texto_5' =>        "",
        'importe' =>        $dato5,
        'estado_mdetalle' => 'guardado',
        'matricula_inscripcion' => $dato3,






    ]);

        $mode=$dato2;
        $cuitt=$dato;
        $id_tablass=999;



    $modelos_det= ModelDetalle::where('idmodelo','=',999999)->where('estado_mdetalle','=','guardado')->get();




    return view('imtim_1',compact('modelos_det','mode','cuitt','id_tablass'));

    //return back(compact('modelos_det'));

    

      //return Response::json($periodo);
            


}



public function masuno_serv(Request $req)
{
    //+1 desde el lado del servidor...agregar detalle

    $dato=$req->input('cuit');

    $dato2=$req->input('_modelofo');

    $dato3=$req->input('_matricula');

    $dato4=$req->input('_tributo');

    $dato5=$req->input('_importe');



    

    $dato6=$req->input('_fecha');



    $periodo = date('m/Y',strtotime(str_replace('-','/',$dato6)));


    $modeldet= ModelDetalle::create([

        'idmodelo' =>       999999,
        'tributo' =>        $dato4,//dentro del ente de tamño 4 de longitud es el tributo...pueden ser varios
        'periodo' =>        $periodo,//mes y anio del dia elegido por el que lo intiman...pueden ser varios
        'tipo_modelo' =>    $dato2,
        'texto_1' =>        "",
        'texto_2' =>        "",
        'texto_3' =>        "",
        'texto_4' =>        "",
        'texto_5' =>        "",
        'importe' =>        $dato5,
        'estado_mdetalle' => 'guardado',
        'matricula_inscripcion' => $dato3,






    ]);

        $mode=$dato2;
        $cuitt=$dato;
        $id_tablass=999;



    $modelos_det= ModelDetalle::where('idmodelo','=',999999)->where('estado_mdetalle','=','guardado')->get();

    return view('imtim_1',compact('modelos_det','mode','cuitt','id_tablass'));




}


//prueba para ver de agregar la lista de detalles de modelos para ir agregando

public function prueba()
{
    

    return view('prueb');

}

public function p_agregar(Request $req)
{
    
    $va=0;

    $va = $req->id_m;



    if ($va>1) {


        //agregamos detalles_modelos_del_modelo_que_est
        //
    
    $importe_tributo= 0;

    $fecha= Input::get('fecha_hoy');

    $tributo= Input::get('tributo');

    $periodo = date('m/Y',strtotime(str_replace('-','/',$fecha)));

    $importe_tributo = Input::get('importe_tributo');

    $matricula= Input::get('matricula');


    $cuitcon = $req->cuit_m_det;
    $model=$req->mod_det;
    $id_tabla= $va;


     $this->validate($req, [
        'tributo' => 'required|min:1',
        'matricula' => 'required',
    ]);




    $modeldet= ModelDetalle::create([

        'idmodelo' =>       $id_tabla,
        'tributo' =>        $tributo,//dentro del ente de tamño 4 de longitud es el tributo...pueden ser varios
        'periodo' =>        $periodo,//mes y anio del dia elegido por el que lo intiman...pueden ser varios
        'tipo_modelo' =>    $model,
        'texto_1' =>        ' ',
        'texto_2' =>        ' ',
        'texto_3' =>        ' ',
        'texto_4' =>        ' ',
        'texto_5' =>        ' ',
        'importe' =>        $importe_tributo,
        'estado_mdetalle' => 'guardado',
        'matricula_inscripcion' => $matricula,






    ]);



         $modeloIntDet= ModelDetalle::where('idmodelo','=',$id_tabla)->where("estado_mdetalle",'!=','baja')->get();


          return view('prueb',compact('modeloIntDet','model','cuitcon','id_tabla','modeldet'));

    }

    else{

            //el modelo no esta creado y necesito crear y asociar el primer modelo_detalle

         $mode= Input::get('modeloform');

       $cuit= Input::get('cuit');

       $matricula= Input::get('matricula');

       $fecha_creac = Input::get('fecha_creac');

       $fecha= Input::get('fecha_hoy');

       $tributo= Input::get('tributo');

       $periodo = date('m/Y',strtotime(str_replace('-','/',$fecha)));

       $importe_tributo = Input::get('importe_tributo');

        //-----------------------------
 



        $model= Modelos::create([

        //la fecha de envio no la tengo aca porque utiliozare las notificaciones
        //en las cuales utilizo el campo adjunto como modelo y id mensaje lleva el id modelo para recuperar
        //y mostrarlo desde la base de datos.

        //'id_model_detall' =>  $id_tabla,
        'estado' =>         'guardado',
        'cuit_contrib' =>    $cuit,//pasar variables.
        'id_personal' =>    auth()->id(),
        'dia_cread' =>      $fecha_creac,
        'dia_referenc' =>   $fecha,
        'dia_mod' =>        $fecha_creac,
        'matricula' =>      $matricula,//sacar esta matricula 
        'tipo_modelo' =>    $mode,



    ]);

    $id_tabla=$model->id;


    $modeldet= ModelDetalle::create([

        'idmodelo' =>       $id_tabla,
        'tributo' =>        $tributo,//dentro del ente de tamño 4 de longitud es el tributo...pueden ser varios
        'periodo' =>        $periodo,//mes y anio del dia elegido por el que lo intiman...pueden ser varios
        'tipo_modelo' =>    $mode,
        'texto_1' =>        ' ',
        'texto_2' =>        ' ',
        'texto_3' =>        ' ',
        'texto_4' =>        ' ',
        'texto_5' =>        ' ',
        'importe' =>        $importe_tributo,
        'estado_mdetalle' => 'guardado',
        'matricula_inscripcion' => $matricula,






    ]);

         $modeloIntDet= ModelDetalle::where('idmodelo','=',$id_tabla)->where("estado_mdetalle",'=','guardado')->get();

        $model=$mode;

        $cuitcon=$cuit;

        return view('prueb',compact('modeloIntDet','id_tabla','model','cuitcon'));


    }


   




  // return Redirect::('intimacion/prueba');
}

//-----------------------------------------------------------------------------





    public function agreg(Request $req)
    {
        //damos de alta un modelo y su correspondiente valor de modelo detalle ...luego traemos el id del modelo para llevarlo a la vista.
        
        //el  modelo tendra el estado guardado.
        




       $mode= Input::get('modeloform');

       $cuit= Input::get('cuit');

       $matricula= Input::get('matricula');

       $fecha_creac = Input::get('fecha_creac');

       $fecha= Input::get('fecha_hoy');

       $tributo= Input::get('tributo');

       $periodo = date('m/Y',strtotime(str_replace('-','/',$fecha)));

       $importe_tributo = Input::get('importe_tributo');

        //-----------------------------
 



        $model= Modelos::create([

        //la fecha de envio no la tengo aca porque utiliozare las notificaciones
        //en las cuales utilizo el campo adjunto como modelo y id mensaje lleva el id modelo para recuperar
        //y mostrarlo desde la base de datos.

        //'id_model_detall' =>  $id_tabla,
        'estado' =>         'guardado',
        'cuit_contrib' =>    20374625323,//pasar variables.
        'id_personal' =>    auth()->id(),
        'dia_cread' =>      $fecha_creac,
        'dia_referenc' =>   $fecha,
        'dia_mod' =>        $fecha_creac,
        'matricula' =>      1,//sacar esta matricula 
        'tipo_modelo' =>    $mode,



    ]);

    $id_tabla=$model->id;


    $modeldet= ModelDetalle::create([

        'idmodelo' =>       $id_tabla,
        'tributo' =>        $tributo,//dentro del ente de tamño 4 de longitud es el tributo...pueden ser varios
        'periodo' =>        $periodo,//mes y anio del dia elegido por el que lo intiman...pueden ser varios
        'tipo_modelo' =>    $mode,
        'texto_1' =>        ' ',
        'texto_2' =>        ' ',
        'texto_3' =>        ' ',
        'texto_4' =>        ' ',
        'texto_5' =>        ' ',
        'importe' =>        $importe_tributo,
        'estado_mdetalle' => 'guardado',
        'matricula_inscripcion' => $matricula,






    ]);


        $modeloIntDet= ModelDetalle::where('idmodelo','=',$id_tabla)->where("estado_mdetalle",'=','guardado')->get();

        return view('imtim_1',compact('id_tabla','mode','cuit'));



    }



    
}
