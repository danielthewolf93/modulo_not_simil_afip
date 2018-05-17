<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Message;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::where('id','!=',auth()->id())->get();

        return view('home',compact('users'));
    }

//funcion
//para traer usuarios de la tabla de usuarios rentas aplicativ
//pero recordar que esto ya traemos de las variables de usuario que viene de la aplicacion principal
    public function index2()
    {

        $users2 = User::where()->get();

        return view('home2',compact('users2'));
    }



    public function store(Request $request)
{
    $rules = [
        'student' => 'required|max:20',
        'score' => 'required|numeric|min:1|max:10',
    ];
 
    $this->validate($request, $rules);




    public function store(Request $request)

    {

        //Validacion-parte-servidor-hacer-en-todas
        /*
          'body' => 'required|max:255',
          'recipient_id' => 'required',    
         */
        

        $rules = [
        'recipient_id' => 'required',
        'body' => 'required|min:10|max:150',
         ];
        
        

        $this->validate($request, $rules);

          
        Message::create([


            'sender_id' => auth()->id(),
            'recipient_id' => $request->recipient_id,
            'body' => $request->body,


        ]);

        return back()->with('flash','Tu mensaje fue enviado');
        //return $request->all();
        
    }



    public function elegirmodel()
    {

        if ($modelo==0) {

            //controlo y devuelvo para que seleccione algun tipo y notifico del error
            //
        }

        if ($modelo==1) {


           return view('modelo1',compact('cuitcont','matricula'));
           
        }
        
        if ($modelo==2) {


           return view('modelo2',compact('cuitcont','matricula'));
       
        }

        if ($modelo==3) {


           return view('modelo3',compact('cuitcont','matricula'));
        
        }




    }


//
//validacion  en el envio de datos /validacion por parte del servidor.
    
/*
    public function validaciones(Request $request)
    {

        $this->validate($request,[

        'title' => 'required|unique|max:255',
        'body' => 'required',

        ]);
        


    }  */



   

}
