<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::get("sistema")) {
        	Session::put("sistema", []);
        }
        //Session::put("sistema.prueba", "hola");
        //var_dump(Session::get("sistema.prueba"));
        //dd();
        return view('home');
    }
}
