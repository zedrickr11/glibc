<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoMensualidad extends Model
{
    protected $table = 'pagomensualidad';
    protected $primaryKey = 'id_pagomensualidad';
    public $timestamps=false;

    protected $fillable = ['monto', 'fecha', 'mora', 'id_inscripcion', 'id_mensualidad', 'id_mora', 'anio'];

    public function inscripcion()
    {
        return $this->belongsTo('App\Inscripcion', 'id_inscripcion');
    }

    public function mensualidad()
    {
        return $this->belongsTo('App\Mensualidad', 'id_mensualidad');
    }

    public function moraAsignada()
    {
        return $this->belongsTo('App\Mora', 'id_mora');
    }
}
