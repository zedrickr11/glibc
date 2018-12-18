<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $table = 'detalle';
    protected $primaryKey = 'id';
    public $timestamps=false;

    public function ciclo()
    {
        return $this->belongsTo('App\Ciclo', 'id_ciclo');
    }

    public function jornada()
    {
        return $this->belongsTo('App\Jornada', 'id_jornada');
    }

    public function grado()
    {
        return $this->belongsTo('App\Grado', 'id_grado');
    }

    public function carrera()
    {
        return $this->belongsTo('App\Carrera', 'id_carrera');
    }

    public function inscripciones()
    {
        return $this->hasMany('App\Inscripcion', 'id_detalle');
    }
}
