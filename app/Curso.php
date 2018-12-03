<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table='curso';
    protected $primaryKey='id_curso';

    public $timestamps=false;

    protected $fillable = [
        'id_curso',
        'nombre',
        'descripcion',
        'condicion'
    ];
}
