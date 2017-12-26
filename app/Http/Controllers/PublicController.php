<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebBanner as WebBannerModel;

class PublicController extends Controller
{
    public function index(){
      $banners_inicio = WebBannerModel::where([['section_id', '=', 0], ['estado', '=', 1]])->get();
      $centros = WebBannerModel::where([['section_id', '=', 5], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      return view('master-front.index')->with(['banners' => $banners_inicio, 'centros' => $centros]);
    }

    public function hotel(){
      $banners_hotel = WebBannerModel::where([['section_id', '=', 1], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      foreach ($banners_hotel as $banner) {
        $banner['lists'] =  $this->getLists($banner);
      }
      return view('master-front.hotel')->with(['banners' => $banners_hotel]);
    }

    public function habitaciones(){
      return view('master-front.habitaciones');
    }

    public function sala_conferencias(){
      return view('master-front.sala-conferencias');
    }

    public function ofertas(){
      $ofertas = WebBannerModel::where([['section_id', '=', 3], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      $clases = ['one', 'two', 'three', 'four'];
      return view('master-front.ofertas')->with(['ofertas' => $ofertas, 'clases' => $clases]);
    }

    public function ubicacion(){
      $centros = WebBannerModel::where([['section_id', '=', 5], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      return view('master-front.ubicaciones')->with(['centros' => $centros]);
    }

    public function getLists($banner){

    $lists_descripciones = [];
    if ($banner['descripcion'] !== null && $banner['descripcion']) {
      $descripciones = preg_split("/[\r\n]+/", $banner['descripcion']);
      $cantidad_descripciones = count($descripciones);
      if( strpos($descripciones[$cantidad_descripciones - 1], "<li>") === false ){
        unset($descripciones[$cantidad_descripciones - 1]);
      }
      if( strpos($descripciones[$cantidad_descripciones - 2], "<li>") === false ){
        unset($descripciones[$cantidad_descripciones - 2]);
      }
      unset($descripciones[0]);
      if (count($descripciones)) {
        foreach ($descripciones as $descripcion) {
          $lists_descripciones[] = strip_tags($descripcion);
        }
      }
    }
    return $lists_descripciones;
  }
}
