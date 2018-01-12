<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebBanner as WebBannerModel;
use App\Section as SectionModel;
use App\SectionContent as SectionContentModel;

class PublicController extends Controller
{
    public $header;
    public $footer;
    public $titulo_head;
    public $desc_head;
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
      $section_content = SectionContentModel::where('section_id', 0)->first();
      $titulo_head = ($lang == 'es') ? $section_content->titulo: $section_content->titulo_en;
      $desc_head = ($lang == 'es') ? $section_content->descripcion: $section_content->descripcion_en;
      return view('master-front.index')->with(['banners' => $banners_inicio,
                                               'centros' => $centros,
                                               'idioma' => $lang,
                                               'paths' => $paths,
                                               'titulo' => $titulo_head,
                                               'desc' => $desc_head,
                                               'header' => $this->header,
                                               'footer' => $this->footer]);
    }

    public function hotel($lang = 'es'){
      $paths = ['es'=> 'hotel', 'en' => 'hotel/en'];
      $banners_hotel = WebBannerModel::where([['section_id', '=', 1], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      foreach ($banners_hotel as $banner) {
        $banner['lists'] =  $this->getLists($banner, $lang);
      }
      $section_content = SectionContentModel::where('section_id', 0)->first();
      $titulo_head = ($lang == 'es') ? $section_content->titulo: $section_content->titulo_en;
      $desc_head = ($lang == 'es') ? $section_content->descripcion: $section_content->descripcion_en;
      return view('master-front.hotel')->with(['banners' => $banners_hotel,
                              'idioma' => $lang,
                              'paths' => $paths,
                              'titulo' => $titulo_head,
                              'desc' => $desc_head,
                              'header' => $this->header,
                              'footer' => $this->footer]);
    }

    public function habitaciones($lang = 'es'){
      $paths = ['es'=> 'habitaciones', 'en' => 'rooms/en'];
      $banners = WebBannerModel::where([['section_id', '=', 2], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      foreach ($banners as $banner) {
        $banner['lists'] =  $this->getLists($banner, $lang);
      }
      $section_content = SectionContentModel::where('section_id', 2)->first();
      $titulo_head = ($lang == 'es') ? $section_content->titulo: $section_content->titulo_en;
      $desc_head = ($lang == 'es') ? $section_content->descripcion: $section_content->descripcion_en;
      $desc_desayuno = ($lang == 'es') ? $section_content->desayuno_desc: $section_content->desayuno_desc_en;
      $precio_simple = $section_content->habitacion_simple_precio;
      $precio_doble = $section_content->habitacion_doble_precio;
      return view('master-front.habitaciones')->with(['banners' => $banners, 'idioma' => $lang, 'paths' => $paths, 'header' => $this->header, 'footer' => $this->footer, 'desc' => $desc_head, 'titulo' =>$titulo_head, 'precio_doble' =>$precio_doble, 'precio_simple'=>$precio_simple, 'desc_desayuno'=>$desc_desayuno]);
    }

    public function sala_conferencias($lang = 'es'){
      $paths = ['es'=> 'sala-conferencias', 'en' => 'conferencehall/en'];
      $banners = WebBannerModel::where([['section_id', '=', 4], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      foreach ($banners as $banner) {
        $banner['lists'] =  $this->getLists($banner, $lang);
      }
      $desc_head  = '';
      $titulo_head ='';
      $section_content = SectionContentModel::where('section_id', 4)->first();
      if ($section_content){
        $titulo_head = ($lang == 'es') ? $section_content->titulo: $section_content->titulo_en;
        $desc_head = ($lang == 'es') ? $section_content->descripcion: $section_content->descripcion_en;
      }

      return view('master-front.sala-conferencias')->with(['banners' => $banners, 'idioma' => $lang, 'paths' => $paths, 'header' => $this->header, 'footer' => $this->footer, 'desc' => $desc_head, 'titulo' =>$titulo_head]);
    }

    public function ofertas($lang = 'es'){
      $ofertas = WebBannerModel::where([['section_id', '=', 3], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      $clases = ['one', 'two', 'three', 'four'];
      $paths = ['es'=> 'ofertas', 'en' => 'offers/en'];
      $desc_head  = '';
      $titulo_head ='';
      $section_content = SectionContentModel::where('section_id', 3)->first();
      if ($section_content){
        $titulo_head = ($lang == 'es') ? $section_content->titulo: $section_content->titulo_en;
        $desc_head = ($lang == 'es') ? $section_content->descripcion: $section_content->descripcion_en;
      }

      return view('master-front.ofertas')->with(['ofertas' => $ofertas, 'clases' => $clases, 'idioma' => $lang, 'paths' => $paths, 'header' => $this->header, 'footer' => $this->footer, 'desc' => $desc_head, 'titulo' =>$titulo_head]);
    }

    public function ubicacion($lang = 'es'){
      $centros = WebBannerModel::where([['section_id', '=', 5], ['estado', '=', 1]])->orderBy('orden', 'asc')->get();
      $paths = ['es'=> 'ubicacion', 'en' => 'location/en'];
      $titulo_head  = '';
      $desc_head  = '';
      $section_content = SectionContentModel::where('section_id', 5)->first();
      if ($section_content){
        $titulo_head = ($lang == 'es') ? $section_content->titulo: $section_content->titulo_en;
        $desc_head = ($lang == 'es') ? $section_content->descripcion: $section_content->descripcion_en;
      }

      return view('master-front.ubicaciones')->with(['centros' => $centros, 'idioma' => $lang, 'paths' => $paths, 'header' => $this->header, 'footer' => $this->footer, 'desc' => $desc_head, 'titulo' =>$titulo_head]);
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
