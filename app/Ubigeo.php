<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{
    //
    protected $table = 'ubigeo';
    
    protected $fillable=[
        'codpto',
        'codprov',
        'coddist',
        'nombre'
    ];
    
    public $timestamps = false;
    
}