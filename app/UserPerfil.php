<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPerfil extends Model
{
    //
    protected $table = 'users_perfil';
    
    protected $fillable=[
        'id_users',
        'id_perfil',
    ];
    
    public $timestamps = false;
    
    public function exists($idUsers, $idPerfil)
    {
        return UserPerfil::where('id_users', '=', $idUsers)
            ->where('id_perfil', '=', $idPerfil)
            ->firstOrFail();
    }
}
