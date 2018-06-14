<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Notificaciones;


class SeguimientoNotifController extends Controller
{
   


	public function index()
	{
		




		$notificac_hist = Notificaciones::where('id_personal','=',auth()->id())->where('notif_estado','!=','baja')->where('id_recep','!=',99999999)->get();

		return view('notificaciones.seg_notif',compact('notificac_hist'));


	}



}
