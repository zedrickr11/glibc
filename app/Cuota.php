<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    protected $table = 'cuota';
    protected $primaryKey = 'id_cuota';
    public $timestamps=false;

    protected $fillable = ['nombre', 'cantidad', 'condicion'];

    public function pagocuotas()
    {
        return $this->hasMany('App\PagoCuota', 'id_cuota');
    }
}
