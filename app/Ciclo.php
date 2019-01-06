<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
  protected $table='ciclo';
  protected $primaryKey='id_ciclo';

  public $timestamps=false;

  protected $fillable = [

      'anio',
      'fecha_inicio',
      'fecha_fin',
      'condicion',
      'nombre'
  ];

  public function carreras()
  {
      return $this->belongsToMany('App\Carrera', 'detalle', 'id_ciclo', 'id_carrera');
  }
    
  public function inscripciones()
  {
    return $this->hasMany('App\Inscripcion', 'id_ciclo');
  }

}
