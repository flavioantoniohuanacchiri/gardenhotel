<?php

namespace App;

class Dispositivo extends BaseModel
{

    protected $table = 'dispositivo';
    protected $dates = ['deleted_at'];

    protected $fillable=[
        'id',
        'id_grupo',
        'identificador',
        'descripcion',
        'tipo',
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
