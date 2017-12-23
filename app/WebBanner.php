<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebBanner extends Model
{
  protected $fillable = [
    'id',
    'titulo',
    'titulo_en',
    'descripcion',
    'descripcion_en',
    'path_imagen',
    'path_imagen_sm',
    'section_id',
    'path_imagen_md',
    'estado',
    'orden'
  ];
}
