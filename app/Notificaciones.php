<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Notifications\Notifiable;

class Notificaciones extends Model
{

	//dato que no asigno en la tabla
      protected $guarded = ['id_notific'];
}
