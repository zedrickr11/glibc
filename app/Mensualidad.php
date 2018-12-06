<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensualidad extends Model
{
    protected $table = 'mensualidad';
    protected $primaryKey = 'id_mensualidad';

    protected $fillable = ['nombre', 'fecha_limite'];

    public function pagomensualidades()
    {
        return $this->hasMany('App\PagoMensualidad', 'id_mensualidad');
    }
}
