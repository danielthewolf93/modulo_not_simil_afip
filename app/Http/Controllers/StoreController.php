<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    
    public function index()
    {
    	# codigo para controlar el contenido del envio del mensaje con adjunto.
    	return view('new');
    	
    }



   


// http://localhost:8000/prueba3/public/storage/nombre_de_archivo 


	public function guardar(Request $request)
	{
		$file = $request->file('file');

		$nombre = $file->getClientOriginalName();

		\Storage::disk('local')->put($nombre,\File::get($file));


		return "archivo guardado";
	}

}
