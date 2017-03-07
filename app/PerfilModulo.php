<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilModulo extends Model
{
    //
    protected $table = 'perfil_modulo';
    
    protected $fillable=[
        'id_perfil',
        'id_modulo',
    ];
    
    public $timestamps = false;
    
    public function exists($idPerfil, $idModulo)
    {
        return PerfilModulo::where('id_modulo', '=', $idModulo)
            ->where('id_perfil', '=', $idPerfil)
            ->firstOrFail();
    }
   
    public function listByModulo ($modulo) {
        return PerfilModulo::select(
                'perfil_modulo.id', 'id_modulo'
                , 'id_perfil AS perfil', 'p.nombre'
            )
            ->join('perfil AS p', 'p.id', '=', 'perfil_modulo.id_perfil')
            ->where('id_modulo', '=', $modulo)
            ->get();
    }

    /**
     * Relation
     * [user description]
     * @return [type] [description]
     */
    public function modulo() {
        return $this->hasOne('App\Modulo', 'id', 'id_modulo');
    }

    /**
     * Relation
     * [perfil description]
     * @return [type] [description]
     */
    public function perfil() {
        return $this->hasOne('App\Perfil', 'id', 'id_perfil');
    }
}