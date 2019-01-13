<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
  protected $table = 'nota';
  protected $primaryKey = 'id_nota';
  public $timestamps=false;

  protected $fillable = ['id_actividad','nota','id_alumno'];

    public function notaAlumno()
    {
        return $this->belongsTo('App\Alumno', 'id');
    }
    public function notaAct()
    {
        return $this->belongsTo('App\Actividad', 'id_actividad');
    }

}
