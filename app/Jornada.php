<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    protected $table = 'jornada';
    protected $primaryKey = 'id_jornada';
    public $timestamps=false;

    protected $fillable = ['nombre', 'condicion'];

    public function carreras()
    {
        return $this->hasMany('App\Carrera', 'id_jornada');
    }
}
