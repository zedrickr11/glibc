<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carrera';

    protected $fillable = ['nombre', 'condicion', 'id_jornada'];
    public $timestamps=false;

    public function jornada()
    {
        return $this->belongsTo('App\Jornada', 'id_jornada');
    }

    public function grados()
     {
         return $this->hasMany('App\Grado', 'id_carrera');
     }
    public function ciclos()
    {
        return $this->belongsToMany('App\Ciclo', 'detalle', 'id_carrera', 'id_ciclo');

    }
}
