<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Auth;
use App\Zonal;
use App\Sede;
use App\UserZonal;
use App\UserSede;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    private $zonales;

    public function __construct() {

        $this->middleware("auth");
       /* $this->middleware(function ($request, $next) {

            $this->user = $this->signedIn = Auth::user();
            if (!is_null($this->user)){
                $this->init($this->user);
            }
            
            //dd($this->user);

            return $next($request);
        }); */
    }

    public function getZonales()
    {
        return $this->zonales;
    }

    public function setZonales($zonales = [])
    {
        $this->zonales = $zonales;
    }
}
