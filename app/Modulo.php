<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Modulo extends Model
{
    protected $table = 'modulo';

    protected $fillable=[
        'nombre',
        'url',
        'parent',
        'visible',
        'estado',
    ];

    /**
     * Respect values: [id => name]
     * @return [object] [description]
     */
    public static function dropDownList () 
    {
        $get = Modulo::select("modulo.url", 
            DB::raw("CONCAT( mp.nombre,' - ', modulo.nombre) as name"), "mp.nombre as padre", "mp.class_icon", "modulo.id", "modulo.estado")
            ->leftJoin("modulo as mp", "mp.id", "=", "modulo.parent")
            ->where("modulo.estado", "=", 1)
            ->where("modulo.parent", ">", 0)
            //->select(['id','nombre AS name', 'estado'])
            //->orderBy('nombre', 'asc')
            ->get();
        return $get;
    }

}