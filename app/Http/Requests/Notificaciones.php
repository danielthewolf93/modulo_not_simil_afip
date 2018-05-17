<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Notificaciones extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {   

        

        return false;


    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            //reglas de validaciones desde el servidor.
            // 'body'=> 'required|max:25       //             'recipient_id' => 'required',

           
            'recipient_id' => 'required',
            'body'=> 'required|max:25'

            


            
        ];
    }
}
