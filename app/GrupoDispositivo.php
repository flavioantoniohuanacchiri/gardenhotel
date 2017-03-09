<?php

namespace App;

class GrupoDispositivo extends BaseModel
{

    protected $table = 'grupo_dispositivo';
    protected $dates = ['deleted_at'];

    protected $fillable=[
        'id',
        'nombre',
        'descripcion',
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
