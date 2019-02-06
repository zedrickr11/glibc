<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table='record';
    protected $primaryKey='id_record';

    public $timestamps=false;

    protected $fillable = [
        'observacion',
        'observaciondos',
        'id_alumno',
        'id_grado',
        'id_curso',
        'id_persona',
        'fecha',
        'anio'
    ];

    public function alumno()
    {
        return $this->belongsTo('App\Alumno', 'id_alumno');
    }

    public function grado()
    {
        return $this->belongsTo('App\Grado', 'id_grado');
    }

    public function curso()
    {
        return $this->belongsTo('App\Curso', 'id_curso');
    }

    public function persona()
    {
        return $this->belongsTo('App\Persona', 'id_persona');
    }
}
