<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionCurso extends Model
{
    protected $table = 'asignacion_curso';
    protected $primaryKey = 'id_asignacion_curso';

    protected $fillable = ['id_grado', 'id_curso', 'id_persona', 'anio'];
    public $timestamps=false;
}
