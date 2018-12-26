<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mora extends Model
{
  protected $table='mora';
  protected $primaryKey='id';

  public $timestamps=false;

  protected $fillable = [


      'cantidad'

  ];

  public function pagosmensualidades()
  {
      return $this->hasMany('App\PagoMensualidad', 'id_mora');
  }
}
