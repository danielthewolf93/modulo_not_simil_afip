<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


class SearchController extends Controller
{
    


   

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
