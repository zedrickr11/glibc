<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $table = 'roles';
  protected $primaryKey = 'id';

  public $timestamps=false;

  protected $fillable = ['name', 'description', 'display_name'];

  public function user()
    {
      return $this->hasMany(User::class);
    }
}
