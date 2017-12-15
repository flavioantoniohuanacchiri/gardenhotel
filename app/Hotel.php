<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
  protected $fillable = [
    'id',
    'titulo',
    'titulo_en',
    'descripcion',
    'descripcion_en',
  ];
}
