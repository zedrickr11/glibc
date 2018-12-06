<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidad';
    protected $primaryKey = 'id_unidad';

    protected $fillable = ['nombre'];

    public function notaunidades()
    {
        return $this->hasMany('App\NotaUnidad', 'id_unidad');
    }

    public function actividades()
    {
        return $this->hasMany('App\Actividad', 'id_unidad');
    }
}
