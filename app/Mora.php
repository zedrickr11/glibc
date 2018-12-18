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
}
