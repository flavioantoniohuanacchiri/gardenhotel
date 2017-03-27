<?php

namespace App;

class GrupoDispositivoGpx extends BaseModel
{

    protected $table = 'grupo_dispositivo_gpx';
    protected $dates = ['deleted_at'];

    protected $fillable=[
        'id',
        'id_grupo_dispositivo',
        'url',
        'color',
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
