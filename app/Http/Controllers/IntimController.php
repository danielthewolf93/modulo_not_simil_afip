<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\User;

use App\Message;

use App\Notificaciones;

use Illuminate\Support\Facades\Input;

use Illuminate\Database\Eloquent\Collection;

use App\Modelos;

use App\ModelTipo;



class IntimController extends Controller
{
    



    public function index()
    {
    	

    	return view('intim');


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
