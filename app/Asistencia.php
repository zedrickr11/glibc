<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table='asistencia';
    protected $primaryKey='id_asistencia';

    public $timestamps=false;

    protected $fillable = [
        'fecha',
        'condicion',
        'observacion',
        'id_asignacion_curso',
        'id_alumno'
    ];

    public function asignacionCurso()
    {
        return $this->belongsTo('App\AsignacionCurso', 'id_asignacion_curso');
    }

    public function alumno()
    {
        return $this->belongsTo('App\Alumno', 'id_alumno');
    }
}
