<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfil';

    protected $fillable=[
        'nombre',
        'estado',
    ];
    
    public function findNameById ($nombre) 
    {
        $cell = Perfil::where('nombre', '=', $nombre)->first();
        return isset($cell->id)? $cell->id : '1';
    }
    
    /**
     * Respect values: [id => name]
     * @return [object] [description]
     */
    public static function dropDownList () 
    {
        $get = Perfil::where('estado', '=', '1')
            ->select(['id', 'nombre AS name', 'estado'])
            ->orderBy('nombre', 'asc')
            ->get();
        return $get;
    }

    public function rules($id = null, $request = null)
    {
        return [
            'nombre' => 'required|unique:perfil,nombre' . ($id ? "," . $id   : ''),
        ];
    }

    public function perfils() {
        return $this->hasMany('App\UserPerfil', 'id_perfil');
        /*
        return $this->hasManyThrough(
            'App\UserPerfil', 'App\Perfil', 
            'id_users' , 'id'
        ); */
    }

    public function modulos() {
        return $this->hasMany('App\PerfilModulo', 'id_perfil')
            ->join('modulo', 'perfil_modulo.id_modulo', '=', 'modulo.id');
    }

}