<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FormController extends Controller
{
    
    public function index()
{
    return view('form');
}
 
public function store(Request $request)
{
    $rules = [
        'student' => 'required|max:20',
    	'score' => 'required|min:1|max:10',
    ];
 
    $this->validate($request, $rules);
 
    // aquí va el procesamiento de los datos
 
    return back()->with('status','Datos cargados correctamente');
}


}
