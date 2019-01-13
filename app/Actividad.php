<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
  protected $table = 'actividad';
  protected $primaryKey = 'id_actividad';
  public $timestamps=false;

  protected $fillable = ['nombre','descripcion','valor_nota','fecha','id_tipo_actividad',
          'id_asignacion_curso', 'id_unidad', 'anio'];

    public function tipoAct()
    {
        return $this->belongsTo('App\TipoActividad', 'id_tipo_actividad');
    }
    public function grados()
    {
        return $this->belongsTo('App\AsignacionCurso', 'id_asignacion_curso');
    }
    public function unidad()
    {
        return $this->belongsTo('App\Unidad', 'id_unidad');
    }
}
