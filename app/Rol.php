<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';
    protected $primaryKey = 'id_rol';

    public $timestamps=false;

    protected $fillable = ['nombre', 'descripcion', 'condicion', 'display_name'];

    public function usuarios()
    {
        return $this->hasMany('App\Usuario', 'id_rol');
    }
}
