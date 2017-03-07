<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\UserSede;
use App\Zonal;

class User extends Authenticatable
{
	use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function perfils() {
        return $this->hasMany('App\UserPerfil', 'id_users')
            ->join('perfil', 'users_perfil.id_perfil', '=', 'perfil.id');
    }

    public function zonales() {
        return $this->hasMany('App\UserZonal', 'id_users')
            ->join('zonal', 'users_zonal.id_zonal', '=', 'zonal.id');
    }

    public function sedes() {
        return $this->hasMany('App\UserSede', 'id_users')
            ->join('sede', 'users_sede.id_sede', '=', 'sede.id');
    }
    
    
    public static function rules($id = null, $request = null)
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users' . ($id ? "," . $id   : ''),
            'password' => 'required|min:6|confirmed',
        ];
    }

    public static function zonalByUserLogin()
    {
        $sedes = UserSede::where("id_users", "=", Auth::user()->id)->get();
        $zonales = [];
        foreach ($sedes as $key => $value) {
            $zonalesSede = Zonal::where("id_sede", "=", $value->id_sede)->whereRaw("deleted_at IS NULL")->get();
            foreach ($zonalesSede as $key2 => $value2) {
                $zonales[] = $value2;
            }
        }
        return $zonales;
    }
}
