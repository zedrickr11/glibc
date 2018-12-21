<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'nivel';
    protected $primaryKey = 'id_nivel';
    public $timestamps=false;

    protected $fillable = ['nombre', 'descripcion', 'condicion'];

    public function carreras()
    {
        return $this->hasMany('App\Carrera', 'id_nivel');
    }

    public function personas()
    {
        return $this->hasMany('App\Persona', 'id_nivel');
    }

    public function cursos()
    {
        return $this->hasMany('App\Curso', 'id_nivel');
    }
}
