<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as Response;
use App\WebBanner as WebbannerModel;
use Illuminate\Support\Facades\Storage as Storage;

class WebController extends Controller
{
  public function listar(Request $request)
  {
    $banners = WebbannerModel::where('section_id', '=', $request->section)->get();
    return $banners;
  }

  public function index()
  {
    return view('master.web.index');
  }

  public function hotel()
  {
    return view('master.web.hotel');
  }
  public function habitaciones()
  {
    return view('master.web.habitaciones');
  }
  public function ofertas()
  {
    return view('master.web.ofertas');
  }

  public function salaconferencias()
  {
    return view('master.web.sala-conferencias');
  }

  public function centrofinanciero()
  {
    return view('master.web.centro-financiero');
  }

  public function show($id){
    $banner = WebbannerModel::find($id);
    return $banner;
  }

  public function store(Request $request)
  {
    if ($request->hasFile('banner')) {
      Storage::disk('uploads')->put($request->banner->getClientOriginalName(), file_get_contents($request->banner->getRealPath()));
      $datos = (array) $request->all();
      $datos['path_imagen'] = 'uploads/'.$request->banner->getClientOriginalName();
      //creamos un path y rediseñamos la imagen
      $small_imagen_path = substr_replace($datos['path_imagen'], '_small', strlen($datos['path_imagen']) - 4, 0 );
      $new_img = $this->resize_image('uploads/'.$request->banner->getClientOriginalName(), 242, 120, true);
      $datos['path_imagen_sm'] = $small_imagen_path;
      WebbannerModel::create($datos);
      imagejpeg($new_img, $small_imagen_path, 100);
      imagedestroy($new_img);
      return Response::json([
        'mensaje' => 'Banner creado correctamente',
        'estado' => 1
      ]);
    }

    return Response::json([
      'mensaje' => 'No se logro crear el Banner, es necesario agregar una iamgen',
      'estado' => 2
    ]);
  }

  public function update(Request $request, $id)
  {
    $banner = WebbannerModel::find($id);
    if ($banner) {
      $datos = (array) $request->all();
      if ($request->hasFile('banner')) {
        Storage::disk('uploads')->delete(str_replace("uploads/", "", $banner->path_imagen));
        Storage::disk('uploads')->delete(str_replace("uploads/", "", $banner->path_imagen_sm));
        Storage::disk('uploads')->put($request->banner->getClientOriginalName(), file_get_contents($request->banner->getRealPath()));
        $datos['path_imagen'] = 'uploads/'.$request->banner->getClientOriginalName();

        $small_imagen_path = substr_replace($datos['path_imagen'], '_small', strlen($datos['path_imagen']) - 4, 0 );
        $new_img = $this->resize_image('uploads/'.$request->banner->getClientOriginalName(), 242, 120, true);
        $datos['path_imagen_sm'] = $small_imagen_path;
      }
      $banner->update($datos);

      return Response::json([
        'mensaje' => 'Banner actualizado correctamente',
        'estado' => 1
      ]);
    }
    return Response::json([
      'mensaje' => 'No se logro actualizar el Banner',
      'estado' => 2
    ]);
  }

  public function destroy($id) {
    $banner = WebbannerModel::find($id);
    $banner->delete();
    return response(["rst" => 1, "msj" => "Banner eliminado correctamente."]);
  }

  public function cambiarEstado($id) {
    $banner = WebbannerModel::find($id);
    $estado_cambio = ($banner->estado == 1) ? 0: 1;
    $banner->estado = $estado_cambio;
    $banner->save();
    return response(["estado" => 1, "msj" => "Se ha actualizado el estado con éxito"]);
  }

  function resize_image($file, $w, $h, $crop=FALSE) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
      if ($width > $height) {
        $width = ceil($width-($width*abs($r-$w/$h)));
      } else {
        $height = ceil($height-($height*abs($r-$w/$h)));
      }
      $newwidth = $w;
      $newheight = $h;
    } else {
      if ($w/$h > $r) {
        $newwidth = $h*$r;
        $newheight = $h;
      } else {
        $newheight = $w/$r;
        $newwidth = $w;
      }
    }
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
  }



}
