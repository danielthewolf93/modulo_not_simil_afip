<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Message;

use App\Notificaciones;

use App\novedades;



use Illuminate\Support\Facades\Input;

use Illuminate\Database\Eloquent\Collection;


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

        if (auth()->id()==1) {
            
            
             $users = User::where('id','!=',auth()->id())->get();

            return view('home',compact('users'));
        }

        else 


             $notificaciones = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'!=','baja')->orderBy('created_at','DSC')->get();

    //  $notificaciones = Notificaciones::where('id_recep','=',auth()->id())->get();



     $notifleid = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'!=','baja')->where("notif_estado",'=','leido')->get();

      $notificacionesnleidas = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'=','activo')->get();

      $nombre = "Notificaciones";

      $notifborradas = Notificaciones::where('id_recep','=',auth()->id())->where("notif_estado",'=','baja')->orderBy('created_at','DSC')->get();


    $novedades = novedades::where('fecha_hasta','>=',date('Y-m-d'))->orderBy('fecha_desde','DSC')->get();


    return view('vistacontr',compact('notificaciones','notificacionesnleidas','notifleid','nombre','notifborradas','novedades'));

        
    }



    public function store(Request $request)

    {

    //Validacion-parte-servidor-hacer-en-todas
        /*
          'body' => 'required|max:255',
          'recipient_id' => 'required',    
         */
        
//Reglas de control para envio de mensaje


        $rules = [
        'recipient_id' => 'required',
        'body' => 'required|min:10|max:150',
         ];
        

//mensajes personalizados para controles

        $messages = [
        'body.required' => 'Agrega texto al campo.',
        'body.max' =>'Texto mayor al permitido :max caracteres.',
        'recipient_id.required' => 'Agrega el destinatario',
        'body_min.' => 'Agrega mayor longitud de texto.'
];
 
        $this->validate($request, $rules, $messages);
          
        Message::create([


            'sender_id' => auth()->id(),
            'recipient_id' => $request->recipient_id,
            'body' => $request->body,


        ]);

//guardando en tabla notificaciones
//

//puedo mejorar esto cambiando el campo texto_notif
//por id_mensaje y tener acceso a todo el cuerpo del mensaje aunq en notif tengo casi todo
//

        Notificaciones::create([


            'tipo_notific'  =>    $request->tipo_not,
            'notif_estado'  =>   'activo',
            'texto_notific' =>    $request->body,
            'adjunto'  => 'vacio',
            'id_personal' => auth()->id(),
            'id_recep' =>   $request->recipient_id,
            'notif_despac' => $request->tipo_desp,
            'tema_notif' => $request->tema_not,

            

        ]);

          //  echo "<script> alert('Tu mensaje fue enviado'); </script>";
          //  
          //  
            // echo "<script> alert('Modelo guardado'); </script>";


             //return view('home');
             

         return back()->with('message','Tu mensaje fue enviado');

         //return $request->session()->flash('status', 'Task was successful!');


/*
        Session::flash('message', "Special message goes here");
        return Redirect::back();

*/
     
        //return $request->all();
        
    }




public function storenov(Request $request)
{
  


    $rules = [
        
        'body' => 'required|min:10|max:100',
        //controlar fecha hasta sea mayor a la fecha de seleccion sino controlar con javascript.
        'fecha_hasta' => 'required'
         ];
        

//mensajes personalizados para controles

        $novedades = [
        'body.required' => 'Agrega texto al campo.',
        'body.max' =>'Texto mayor al permitido :max caracteres.',
        'fecha_hasta.required' => 'Agrega fecha',
        'body_min.' => 'Agrega mayor longitud de texto.'
];
 
        $this->validate($request, $rules, $novedades);
          

        $fecha_hoy = date('Y-m-d');


        novedades::create([

            'fecha_desde' => $request->fecha_desde,
            'fecha_hasta' => $request->fecha_hasta,
            'texto' => $request->body,
            'tipo_tema_novedad' => $request->tipo_tema,
            'id_personal' => auth()->id(),

        ]);


        return back()->with('notificac','Tu novedad fue enviada');



}



















    public function elegirmodel()
    {

//controlar el modelo y enviar datos compact al formulario.





       //$inputs=Input::all();
       //
       //$name = Input::get('name');

       





       $mode= Input::get('modeloform');


       if ($mode==null) {
           
            $mode= Input::get('auxmodel');

       }


       $cuit= Input::get('cuit');


       if ($cuit==null) {


           $cuit= Input::get('auxcuit');
           
       }


       

       $matricula= Input::get('matricula');

       $fecha= Input::get('fecha_hoy');

       $tributo= Input::get('tributo');

       $periodo = date('m/Y',strtotime(str_replace('-','/',$fecha)));

        

        if ( $mode==1) {


           return view('modelo1',compact('mode','cuit','matricula','fecha','tributo','periodo'));
           
        }
        
        if ( $mode==2) {


           $importes = Input::get('import');

           return view('modelo2',compact('mode','cuit','matricula','fecha','tributo','periodo','importes'));
       
        }

        if ( $mode==3) {

          return view('modelo3',compact('mode','cuit','matricula','fecha','tributo'));
        
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
