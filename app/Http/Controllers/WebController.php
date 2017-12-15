<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as Response;
use App\WebBanner as WebbannerModel;
use Illuminate\Support\Facades\Storage as Storage;

class WebController extends Controller
{
  public function getBanners(Request $request) {


  }

  public function listar(Request $request) {
    $section =  $request->section;
    if ($section == 3){
      //HabitacionModel
    }
  }

  public function show($id){
    $banner = WebbannerModel::find($id);
    return $banner;
  }

  public function store(Request $request){
    if ($request->hasFile('banner')) {
      $path = $request->banner->store('public');
      $datos = $request->all();
      $datos['path_imagen'] = $path;
      WebbannerModel::create($datos);

      return Response::json([
        'mensaje' => 'Banner creado correctamente',
        'estado' => 1
      ]);
    }

    return Response::json([
      'mensaje' => 'No se logro crear el Banner',
      'estado' => 2
    ]);
  }

  public function update(Request $request, $id) {
    $banner = WebbannerModel::find($id);
    if ($banner) {
      $datos = $request->all();
      if ($request->hasFile('banner')) {
        Storage::delete($banner->path_image);
        $path = $request->banner->store('public');
        $datos['path_imagen'] = $path;
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

}
