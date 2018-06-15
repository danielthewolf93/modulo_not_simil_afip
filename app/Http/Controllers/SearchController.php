<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

date_default_timezone_set('America/Argentina/Catamarca');


class SearchController extends Controller
{
    



public function index() {
	//retorna todos los registros de rm_padron6 puedo utilizarlo para mostrar todo el movimiento de un contribuyente
	//
	//Puede servir para ver la cantidad de mensajes que envio un empleado en un dia , mes, etc.
  $posts = rm_padron6::search(Input::get('search'))->orderBy('pad_cuit_index', 'pad_nomenclatura');
  
  return view('posts', ['posts' => $posts]);
}

/*

    public function autocomplete(Request $request)
    {
   		$term = $request->get('q')
    
    	$results = array();
    
	    $queries = DB::table('rm_padron6')
	        ->where('pad_cuit_index', 'LIKE', '%'.$term.'%')
	        ->take(4)->get();
	    
		    foreach ($queries as $query)
		    {
		        $results[] = [ 'id' => $query->pad_cuit_index, 'value' => $query->pad_nomenclatura ];
		    }
			
			return response()->json($results);

		    }
*/


public function autocomplete()
{
	$term = request('term');
        $result = DB::table('rm_padron6')->Where('pad_cuit_index', 'LIKE', '%' . $term . '%')->get(['id', 'pad_cuit_index as value']);
        return response()->json($result);
}


}
