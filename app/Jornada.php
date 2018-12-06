<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    protected $table = 'jornada';
    protected $primaryKey = 'id_jornada';

    protected $fillable = ['nombre', 'condicion'];

    public function detalles()
    {
        return $this->hasMany('App\Detalle', 'id_jornada');
    }
}
