<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
  protected $table='seccion';
  protected $primaryKey='id';

  public $timestamps=false;

  protected $fillable = [

      'nombre',
      'condicion'

  ];
}
