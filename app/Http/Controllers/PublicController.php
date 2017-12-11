<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
      return view('master-front.index');
    }

    public function hotel(){
      return view('master-front.hotel');
    }

    public function habitaciones(){
      return view('master-front.habitaciones');
    }

    public function sala_conferencias(){
      return view('master-front.sala-conferencias');
    }

    public function ubicacion(){
      return view('master-front.ubicaciones');
    }
}
