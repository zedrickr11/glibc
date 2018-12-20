<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'grado';
    protected $primaryKey = 'id_grado';
    protected $fillable = ['nombre', 'descripcion', 'seccion', 'condicion', 'id_persona', 'id_ciclo', 'id_seccion'];

    public $timestamps=false;

    public function detalles()
    {
        return $this->hasMany('App\Detalle', 'id_grado');
    }

    public function cursos()
    {
        return $this->belongsToMany('App\Curso', 'asignacion_curso', 'id_grado', 'id_curso')->withPivot('id_asignacion_curso', 'id_persona');
    }

    public function persona()
    {
        return $this->belongsTo('App\Persona', 'id_persona');
    }

    public function ciclo()
    {
        return $this->belongsTo('App\Ciclo', 'id_ciclo');
    }

    public function seccionAsignada()
    {
        return $this->belongsTo('App\Seccion', 'id_seccion');
    }
}