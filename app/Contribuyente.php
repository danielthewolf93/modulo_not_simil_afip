<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
 
class Contribuyente extends Model
{
  ...
  use Eloquence;
  
  // campos para busqueda
  protected $searchableColumns = ['pad_cuit_index', 'pad_nomenclatura'];
  ...
}