<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';
    protected $primaryKey = 'id';
    public $timestamps=false;

    protected $fillable = ['id_persona', 'primer_nombre', 'segundo_nombre', 'tercer_nombre', 
    'primer_apellido', 'segundo_apellido', 'fechanacimiento', 'genero', 'telefono', 'direccion', 'foto',
    'fe_edad', 'carnet', 'codigo_alumno', 'condicion', 'papeleria', 'observacion'];

    public function notas()
    {
        return $this->hasMany('App\Nota', 'id_alumno');
    }

    public function asistencias()
    {
        return $this->hasMany('App\Asistencia', 'id_alumno');
    }

    public function notasunidad()
    {
        return $this->hasMany('App\NotaUnidad', 'id_alumno');
    }

    public function inscripciones()
    {
        return $this->hasMany('App\Inscripcion', 'id_alumno');
    }

    public function persona()
    {
        return $this->belongsTo('App\Persona', 'id_persona');
    }
}
