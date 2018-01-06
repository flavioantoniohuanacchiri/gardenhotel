<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebBanner as WebBannerModel;
use App\Section as SectionModel;

class PublicController extends Controller
{
    public $header;
    public $footer;
    public function __construct()
    {
      $header = SectionModel::where('section', 1)->first();
      $footer = SectionModel::where('section', 2)->first();
      $this->header = $header;
      $this->footer = $footer;
    }

   public function index($lang = 'es'){
      $paths = ['es'=> '', 'en' => 'home/en'];
      $banners_inicio = WebBannerModel::where([['section_id', '=', 0], ['estado', '=', 1]])->orderBy("orden", "asc")->get();
      $centros = WebBannerModel::where([['section_id', '=', 5], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      return view('master-front.index')->with(['banners' => $banners_inicio, 'centros' => $centros, 'idioma' => $lang, 'paths' => $paths, 'header' => $this->header, 'footer' => $this->footer]);
    }

    public function hotel($lang = 'es'){
      $paths = ['es'=> 'hotel', 'en' => 'hotel/en'];
      $banners_hotel = WebBannerModel::where([['section_id', '=', 1], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      foreach ($banners_hotel as $banner) {
        $banner['lists'] =  $this->getLists($banner, $lang);
      }
      return view('master-front.hotel')->with(['banners' => $banners_hotel, 'idioma' => $lang, 'paths' => $paths, 'header' => $this->header, 'footer' => $this->footer]);
    }

    public function habitaciones($lang = 'es'){
      $paths = ['es'=> 'habitaciones', 'en' => 'rooms/en'];
      $banners = WebBannerModel::where([['section_id', '=', 2], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      foreach ($banners as $banner) {
        $banner['lists'] =  $this->getLists($banner, $lang);
      }
      return view('master-front.habitaciones')->with(['banners' => $banners, 'idioma' => $lang, 'paths' => $paths, 'header' => $this->header, 'footer' => $this->footer]);
    }

    public function sala_conferencias($lang = 'es'){
      $paths = ['es'=> 'sala-conferencias', 'en' => 'conferencehall/en'];
      $banners = WebBannerModel::where([['section_id', '=', 4], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      foreach ($banners as $banner) {
        $banner['lists'] =  $this->getLists($banner, $lang);
      }
      return view('master-front.sala-conferencias')->with(['banners' => $banners, 'idioma' => $lang, 'paths' => $paths, 'header' => $this->header, 'footer' => $this->footer]);
    }

    public function ofertas($lang = 'es'){
      $ofertas = WebBannerModel::where([['section_id', '=', 3], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      $clases = ['one', 'two', 'three', 'four'];
      $paths = ['es'=> 'ofertas', 'en' => 'offers/en'];
      return view('master-front.ofertas')->with(['ofertas' => $ofertas, 'clases' => $clases, 'idioma' => $lang, 'paths' => $paths, 'header' => $this->header, 'footer' => $this->footer]);
    }

    public function ubicacion($lang = 'es'){
      $centros = WebBannerModel::where([['section_id', '=', 5], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      $paths = ['es'=> 'ubicacion', 'en' => 'location/en'];
      return view('master-front.ubicaciones')->with(['centros' => $centros, 'idioma' => $lang, 'paths' => $paths, 'header' => $this->header, 'footer' => $this->footer]);
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




}
