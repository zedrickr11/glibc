<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripcion';
    protected $primaryKey = 'id_inscripcion';
    public $timestamps = false;

    protected $fillable = ['id_alumno', 'fecha', 'condicion', 'id_plan', 'id_persona', 'cuota', 'id_grado'];

    public function alumno()
    {
        return $this->belongsTo('App\Alumno', 'id_alumno');
    }

    public function grado()
    {
        return $this->belongsTo('App\Grado', 'id_grado');
    }

    public function plan()
    {
        return $this->belongsTo('App\Plan', 'id_plan');
    }

    public function persona()
    {
        return $this->belongsTo('App\Persona', 'id_persona');
    }

    public function pagoscuotas()
    {
        return $this->hasMany('App\PagoCuota', 'id_inscripcion');
    }

    public function pagosmensualidades()
    {
        return $this->hasMany('App\PagoMensualidad', 'id_inscripcion');
    }

}
