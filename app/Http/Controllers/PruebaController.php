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

class PruebaController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    private $zonales;


    public function getZonales()
    {
        return $this->zonales;
    }

    public function setZonales($zonales = [])
    {
        $this->zonales = $zonales;
    }

    public function index()
    {
        dd("hola XD");
    }
}
