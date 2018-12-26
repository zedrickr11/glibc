<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table='curso';
    protected $primaryKey='id_curso';

    public $timestamps=false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'condicion',
        'id_carrera'
    ];

    public function carrera()
    {
        return $this->belongsTo('App\Carrera', 'id_carrera');
    }
}
