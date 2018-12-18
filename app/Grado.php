<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'grado';
    protected $primaryKey = 'id_grado';
    public $timestamps=false;

    public function detalles()
    {
        return $this->hasMany('App\Detalle', 'id_grado');
    }

    public function cursos()
    {
        return $this->belongsToMany('App\Curso', 'asignacion_curso', 'id_grado', 'id_curso');
    }

    public function persona()
    {
        return $this->belongsTo('App\Persona', 'id_persona');
    }

    public function ciclo()
    {
        return $this->belongsTo('App\Ciclo', 'id_ciclo');
    }

    public function seccion()
    {
        return $this->belongsTo('App\Seccion', 'id_seccion');
    }
}
