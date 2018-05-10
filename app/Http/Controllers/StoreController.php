<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StoreController extends Controller
{
    
    public function index()
    {
    	# codigo para controlar el contenido del envio del mensaje con adjunto.
    	return view('formulario');
    	
    }
}
