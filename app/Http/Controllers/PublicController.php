<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebBanner as WebBannerModel;

class PublicController extends Controller
{
    public function index(Request $request){
      $banners_inicio = WebBannerModel::where([['section_id', '=', 0], ['estado', '=', 1]])->get();
      $centros = WebBannerModel::where([['section_id', '=', 5], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      $idioma = $this->obtenerLenguaje($request->path());
      $paths = ['es'=> '', 'en' => 'home_en'];
      return view('master-front.index')->with(['banners' => $banners_inicio, 'centros' => $centros, 'idioma' => $idioma, 'paths' => $paths]);
    }

    public function hotel(Request $request){
      $idioma = $this->obtenerLenguaje($request->path());
      $paths = ['es'=> 'hotel', 'en' => 'hotel_en'];
      $banners_hotel = WebBannerModel::where([['section_id', '=', 1], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      foreach ($banners_hotel as $banner) {
        $banner['lists'] =  $this->getLists($banner, $idioma);
      }

      return view('master-front.hotel')->with(['banners' => $banners_hotel, 'idioma' => $idioma, 'paths' => $paths]);
    }

    public function habitaciones(Request $request){
      $idioma = $this->obtenerLenguaje($request->path());
      $paths = ['es'=> 'rooms', 'en' => 'rooms_en'];
      $banners = WebBannerModel::where([['section_id', '=', 2], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      foreach ($banners as $banner) {
        $banner['lists'] =  $this->getLists($banner, $idioma);
      }

      return view('master-front.habitaciones')->with(['banners' => $banners, 'idioma' => $idioma, 'paths' => $paths]);
    }

    public function sala_conferencias(Request $request){
      $idioma = $this->obtenerLenguaje($request->path());
      $paths = ['es'=> 'sala-conferencias', 'en' => 'conferencehall_en'];
      $banners = WebBannerModel::where([['section_id', '=', 4], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      foreach ($banners as $banner) {
        $banner['lists'] =  $this->getLists($banner, $idioma);
      }
      return view('master-front.sala-conferencias')->with(['banners' => $banners, 'idioma' => $idioma, 'paths' => $paths]);
    }

    public function ofertas(Request $request){
      $ofertas = WebBannerModel::where([['section_id', '=', 3], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      $clases = ['one', 'two', 'three', 'four'];
      $idioma = $this->obtenerLenguaje($request->path());
      $paths = ['es'=> 'ofertas', 'en' => 'offers_en'];
      return view('master-front.ofertas')->with(['ofertas' => $ofertas, 'clases' => $clases, 'idioma' => $idioma, 'paths' => $paths]);
    }

    public function ubicacion(Request $request){
      $centros = WebBannerModel::where([['section_id', '=', 5], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      $idioma = $this->obtenerLenguaje($request->path());
      $paths = ['es'=> 'ubicacion', 'en' => 'location_en'];
      return view('master-front.ubicaciones')->with(['centros' => $centros, 'idioma' => $idioma, 'paths' => $paths]);
    }

    public function getLists($banner, $idioma){

      $lists_descripciones = [];
      $descrion_request = ($idioma == 'es') ? $banner['descripcion'] : $banner['descripcion_en'];
      if ($descrion_request !== null && $descrion_request) {
        $descripciones = preg_split("/[\r\n]+/", $descrion_request);
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


    public function obtenerLenguaje($url)
    {
      $url_partes = explode('_', $url);
      $idioma = (isset($url_partes[1]))? 'en': 'es';
      return $idioma;
    }

}
