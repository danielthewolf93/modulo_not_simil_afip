<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Collection;

use App\Http\Requests;

use App\ModelDetalle;

use App\Modelos;

use  DB;

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

		$listamodel = DB::table('model_detalles')
            ->join('modelos', 'model_detalles.idmodelo', '=', 'modelos.id')
            ->select('model_detalles.*', 'modelos.estado', 'modelos.cuit_contrib','modelos.matricula')
            ->get();

       

		return view('LModelos',compact('modelos','listamodel'));



	}

}
