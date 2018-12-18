<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
  protected $table='ciclo';
  protected $primaryKey='id_ciclo';

  public $timestamps=false;

  protected $fillable = [
    
      'año',
      'fecha_inicio',
      'fecha_fin',
      'condicion',
      'nombre'
  ];
}
