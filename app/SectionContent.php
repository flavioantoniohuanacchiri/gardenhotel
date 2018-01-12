<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionContent extends Model
{
  public $table = 'sections_content';

  protected $fillable = [
    'id',
    'titulo',
    'titulo_en',
    'descripcion',
    'descripcion_en',
    'habitacion_simple_precio',
    'habitacion_doble_precio',
    'desayuno_desc',
    'desayuno_desc_en',
    'section_id',
  ];
}
