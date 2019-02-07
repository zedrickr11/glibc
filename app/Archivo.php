<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $table = 'archivo';
    protected $primaryKey = 'id_archivo';
    public $timestamps=false;

    protected $fillable = ['nombre', 'archivo', 'condicion'];
}
