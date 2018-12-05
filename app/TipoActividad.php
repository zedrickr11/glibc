<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoActividad extends Model
{
  protected $table='tipo_actividad';
  protected $primaryKey='id_tipo_actividad';

  public $timestamps=false;

  protected $fillable = [

      'nombre'

  ];
}
