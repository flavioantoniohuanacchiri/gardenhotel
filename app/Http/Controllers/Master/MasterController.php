<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Perfil;
use App\Modulo;
use App\UserPerfil;
use Yajra\Datatables\Datatables;
use App\Helpers\Helper;

class MasterController extends Controller
{
        
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
        }

    /**
     * Perfil
     *
     * @return \Illuminate\Http\Response
     */
    public function getPerfil()
    {
        return response()->json(Perfil::dropDownList());

        // return Perfil::dropDownList();

    }

    /**
     * Perfil
     *
     * @return \Illuminate\Http\Response
     */
    public function getModulo()
    {
        return response()->json(Modulo::dropDownList());
    }
    
    /**
     * PerfilUser
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserPerfilByUser($user)
    {
        $model = new UserPerfil;
        return $model->listByUser($user);
        return response()->json(
            $model->listByUser($user)
        );
    }
}
