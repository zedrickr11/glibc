<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoCuota extends Model
{
    protected $table = 'pagocuota';
    protected $primaryKey = 'id_pagocuota';
    public $timestamps=false;

    protected $fillable = ['id_inscripcion', 'id_cuota', 'monto', 'fecha', 'observacion', 'anio'];

    public function inscripcion()
    {
        return $this->belongsTo('App\Inscripcion', 'id_inscripcion');
    }

    public function cuota()
    {
        return $this->belongsTo('App\Cuota', 'id_cuota');
    }
}
