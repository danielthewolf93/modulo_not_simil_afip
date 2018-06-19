<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use DB;

use Datatables;

use App\User;

use App\movimientos_cont;

use App\Http\Requests;

use App\Notificaciones;

//date_default_timezone_set('America/Argentina/Catamarca');


class SeguimientoNotifController extends Controller
{
   


	public function index()
	{
		
/*
		SELECT movimientos_conts.id_mov_contr, movimientos_conts.id_notificac, movimientos_conts.cuit, movimientos_conts.mov_descripcion,notificaciones.tema_notif,notificaciones.notif_despac,notificaciones.id_personal,movimientos_conts.updated_at,notificaciones.created_at
FROM movimientos_conts
INNER JOIN notificaciones ON movimientos_conts.id_notificac=notificaciones.id_notific;



		$notificac_hist = Notificaciones::where('id_personal','=',auth()->id())->where('notif_estado','!=','baja')->where('id_recep','!=',99999999)->get();


	$notificac_hist = movimientos_cont::select('movimientos_cont.id_mov_contr, movimientos_cont.id_notificac, movimientos_cont.cuit, movimientos_cont.mov_descripcion,notificaciones.tema_notif,notificaciones.notif_despac,notificaciones.id_personal,movimientos_cont.updated_at,notificaciones.created_at')
    ->join('notificaciones', 'notificaciones.id_notific', '=', 'movimientos_cont.id_notificac')
    ->where('notificaciones.id_recep','!=',99999999)
    ->get();
*/




    $notificac_hist = DB::table('movimientos_conts')
            ->join('notificaciones', 'movimientos_conts.id_notificac', '=', 'notificaciones.id_notific')
            ->select('movimientos_conts.*', 'notificaciones.tema_notif', 'notificaciones.notif_despac','notificaciones.id_personal','notificaciones.created_at','notificaciones.notif_estado','notificaciones.id_recep')
            ->where('notificaciones.id_personal','=',auth()->id())
            ->get();



	return view('notificaciones.seg_notif',compact('notificac_hist'));


	}

	public function prueba()
	{
		
		Session::flash('warning','Mensaje Nuevo');

		return view('pruebaloca');

	}


	public function  tabla()
	{
		
		    $notificac_hist = DB::table('movimientos_conts')
            ->join('notificaciones', 'movimientos_conts.id_notificac', '=', 'notificaciones.id_notific')
            ->select('movimientos_conts.*', 'notificaciones.tema_notif', 'notificaciones.notif_despac','notificaciones.id_personal','notificaciones.created_at','notificaciones.notif_estado','notificaciones.id_recep')
            ->where('notificaciones.id_personal','=',auth()->id())
            ->get();

			$tasks = movimientos_cont::select(['id_mov_contr','cuit','mov_descripcion','created_at']);
 
        	return Datatables::of($tasks)
 
            ->make(true);


	// return view('notificaciones.seg_notif',compact('notificac_hist'));


	}


		public function  tabla_notif()
	{
		
		    $notificac_hist = DB::table('movimientos_conts')
            ->join('notificaciones', 'movimientos_conts.id_notificac', '=', 'notificaciones.id_notific')
            ->select('movimientos_conts.*', 'notificaciones.tema_notif', 'notificaciones.notif_despac','notificaciones.id_personal','notificaciones.created_at','notificaciones.notif_estado','notificaciones.id_recep')
            ->where('notificaciones.id_personal','=',auth()->id())
            ->get();

			$tasks = movimientos_cont::select(['id_mov_contr','cuit','mov_descripcion','created_at']);
 
        	return Datatables::of($tasks)
 
            ->make(true);


	// return view('notificaciones.seg_notif',compact('notificac_hist'));


	}





}
