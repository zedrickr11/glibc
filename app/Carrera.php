<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carrera';

    protected $fillable = ['nombre', 'condicion', 'id_nivel'];
    public $timestamps=false;

    public function nivel()
    {
        return $this->belongsTo('App\Nivel', 'id_nivel');
    }
}
