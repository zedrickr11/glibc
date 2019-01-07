<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';
    protected $primaryKey = 'id_persona';
    public $timestamps=false;

    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'fechanacimiento',
        'estado_civil',
        'nacionalidad',
        'profesion',
        'dpi',
        'direccion',
        'telefono',
        'telefono_dos',
        'celular',
        'foto',
        'usuario',
        'password',
        'tipo_persona'
    ];

    public function usuarios()
    {
        return $this->hasMany('App\User', 'id_persona');
    }

}
