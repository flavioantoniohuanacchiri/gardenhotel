<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as Response;
use App\WebBanner as WebbannerModel;
use App\SectionContent as SectionContentModel;
use Illuminate\Support\Facades\Storage as Storage;

class WebController extends Controller
{
  public function listar(Request $request)
  {
    $banners = WebbannerModel::where('section_id', '=', $request->section)->orderBy("orden", "ASC")->get();
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
  public function reservas()
  {
    return view('master.web.reservas');
  }

  public function salaconferencias()
  {
    return view('master.web.sala-conferencias');
  }

  public function centrofinanciero()
  {
    return view('master.web.centro-financiero');
  }

  public function ubicacion()
  {
    return view('master.web.ubicacion');
  }

  public function show($id){
    $banner = WebbannerModel::find($id);
    return $banner;
  }

  public function store(Request $request)
  {
    if ($request->hasFile('banner')) {
      $datos = (array) $request->all();
      $tamanos = $this->check_sizes($request->banner->getRealPath());
      if (!$tamanos) {
        return Response::json([
          'mensaje' => 'El ancho de la imagen no debe ser menor a la altura',
          'estado' => 2
        ]);
      } else {
        $file_name = md5($request->banner->getClientOriginalName(). date('H:i:s')). '.jpg';
        Storage::disk('uploads')->put($file_name, file_get_contents($request->banner->getRealPath()));
        $datos['path_imagen'] = 'uploads/'.$file_name;
        //creamos un path y rediseñamos la imagen
        $small_imagen_path = substr_replace($datos['path_imagen'], '_small', strlen($datos['path_imagen']) - 4, 0 );
        $new_img = $this->resize_image('uploads/'.$file_name, 500, 250, $tamanos['w'], $tamanos['h']);
        imagejpeg($new_img, $small_imagen_path, 100);
        imagedestroy($new_img);
        $datos['path_imagen_sm'] = $small_imagen_path;

        WebbannerModel::create($datos);
      }

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

        $tamanos = $this->check_sizes($request->banner->getRealPath());
        if (!$tamanos) {
          return Response::json([
            'mensaje' => 'El ancho de la imagen no debe ser menor a la altura',
            'estado' => 2
          ]);
        } else {
          Storage::disk('uploads')->delete(str_replace("uploads/", "", $banner->path_imagen));
          Storage::disk('uploads')->delete(str_replace("uploads/", "", $banner->path_imagen_sm));
          $file_name = md5($request->banner->getClientOriginalName(). date('H:i:s')). '.jpg';
          Storage::disk('uploads')->put($file_name, file_get_contents($request->banner->getRealPath()));
          $datos['path_imagen'] = 'uploads/'.$file_name;
          $small_imagen_path = substr_replace($datos['path_imagen'], '_small', strlen($datos['path_imagen']) - 4, 0 );
          $new_img = $this->resize_image('uploads/'.$file_name, 500, 250, $tamanos['w'], $tamanos['h']);
          imagejpeg($new_img, $small_imagen_path, 100);
          imagedestroy($new_img);
          $datos['path_imagen_sm'] = $small_imagen_path;
        }
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

  function resize_image($file, $w, $h, $original_w, $original_h) {

    header('Content-Type: image/jpeg');
    $dst = imagecreatetruecolor($w, $h);
    $src = imagecreatefromjpeg($file);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $original_w, $original_h);
    return $dst;
  }

  function check_sizes($file_path) {

    $tamanos = getimagesize($file_path);
    $original_w = $tamanos[0];
    $original_h = $tamanos[1];
    if ($original_w <= $original_h) {
      return false;
    } else {
      return $sizes= array('w' => $original_w, 'h' => $original_h);
    }
  }

  public function guardarseccion(Request $request) {
    SectionContentModel::updateOrCreate(['section_id' => $request->section_id], $request->all());
    return Response::json([
      'msj' => 'Se actualizaron los datos con éxito',
      'estado' => 1
    ]);
  }

  public function mostrarseccion($section_id) {
    $section = SectionContentModel::where('section_id', $section_id)->first();
    return $section;
  }

}
