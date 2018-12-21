<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table='curso';
    protected $primaryKey='id_curso';

    public $timestamps=false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'condicion',
        'id_nivel'
    ];

    public function nivel()
    {
        return $this->belongsTo('App\Nivel', 'id_nivel');
    }
}
