<?php

namespace App;

class DispositivoImagen extends BaseModel
{

    protected $table = 'dispositivo_imagenes';
    protected $dates = ['deleted_at'];

    protected $fillable=[
        'id',
        'id_dispositivo',
        'url',
        'middle_url',
        'thumb_url',
        'estado',
        'user_created_at',
        'user_updated_at',
        'userid_created_at',
        'userid_updated_at',
        'created_at',
        'deleted_at',
        'updated_at'
    ];
}
