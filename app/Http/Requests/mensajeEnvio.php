<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class mensajeEnvio extends Request
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

                'email' => ['required', 'email', 'max:255', 'unique:users'],
                'name' => ['required','text','max:80', ''],
                'mensaje' => ['required','text','min:10','max:250']
            //
        ];
    }
}
