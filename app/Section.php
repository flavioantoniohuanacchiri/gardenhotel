<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
  protected $fillable = [
    'id',
    'section',
    'ubicacion',
    'ubicacion_en',
    'telefono',
    'email',
  ];
}
