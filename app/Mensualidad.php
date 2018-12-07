<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensualidad extends Model
{
    protected $table = 'mensualidad';
    protected $primaryKey = 'id_mensualidad';
    public $timestamps=false;

    protected $fillable = ['nombre', 'dia_limite', 'condicion'];

    public function pagomensualidades()
    {
        return $this->hasMany('App\PagoMensualidad', 'id_mensualidad');
    }
}
