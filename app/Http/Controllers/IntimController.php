<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;


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


    public function agreg()
    {
        //

        return view('imtim_1');



    }
}
