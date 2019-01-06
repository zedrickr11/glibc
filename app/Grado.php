<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'grado';
    protected $primaryKey = 'id_grado';
    protected $fillable = ['nombre', 'descripcion', 'seccion', 'condicion', 'id_persona', 'id_carrera', 'id_seccion'];

    public $timestamps=false;

    public function cursos()
    {
        return $this->belongsToMany('App\Curso', 'asignacion_curso', 'id_grado', 'id_curso')->withPivot('id_asignacion_curso', 'id_persona', 'anio');
    }

    public function inscripciones()
    {
        return $this->hasMany('App\Inscripcion', 'id_grado');
    }

    public function persona()
    {
        return $this->belongsTo('App\Persona', 'id_persona');
    }

    public function carrera()
    {
        return $this->belongsTo('App\Carrera', 'id_carrera');
    }

    public function seccionAsignada()
    {
        return $this->belongsTo('App\Seccion', 'id_seccion');
    }
}
