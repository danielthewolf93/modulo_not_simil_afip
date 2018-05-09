<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	//todos se pueden asignar menos el id
    protected $guarded = ['id'];
}
