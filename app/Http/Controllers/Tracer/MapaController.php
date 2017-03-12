<?php
namespace App\Http\Controllers\Tracer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dispositivo;
use App\DispositivoImagen;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Image;
use File;
use URL;
use App\ObjectViews\Combo;

class MapaController
{

	public function getTracer()
	{

	}

	public function setUbicacion(Request $request)
	{
		$folderLocalizaciones = public_path("localizaciones");
		Log::useDailyFiles(storage_path().'/logs/ubicacion.log');
        Log::info([$request]);
		//$fileLog = public_path("localizaciones/logubicacion.txt");

		//File::put($fileLog, json_encode(["longitud" => $request->lon]));
		$longitud = $request->lon;
		$latitud = $request->lat;
		$codigo =$request->cod;

		$dispositivo =Dispositivo::where(["codigo" => $codigo, "estado" => 1])->first();
		if (!is_null($dispositivo)) {
			$dataupdate = ["longitud" => $longitud, "latitud" => $latitud, "hora" => date("Y-m-d H:i:s")];
			$rutaubicacion =$folderLocalizaciones."/".$codigo.".txt";
			File::put($rutaubicacion,json_encode($dataupdate));
		}
	}

	public function getUbicaciones()
	{
		$folderLocalizaciones = public_path('/localizaciones');
		$folderImagenes =public_path("imgs/dispositivos");
		$urlImagenes = URL::to('/imgs/dispositivos');
		$dispositivos = Dispositivo::all();
		$data = [];
		foreach ($dispositivos as $key => $value) {
			$urlfile = $folderLocalizaciones."/".$value->codigo.".txt";
			if (File::exists($urlfile)) {
				$datafile = File::get($urlfile);
				$imagen = DispositivoImagen::where(["id_dispositivo" => $value->id])->whereRaw("deleted_at IS NULL")->first();
				$datafile = json_decode($datafile, true);
				if (!is_null($imagen)) {
					$datafile["img"] = $urlImagenes."/".$imagen->url;
				} else {
					$datafile["img"] = "";
				}
				$datafile["codigo"] = $value->codigo;
				
				$data[] = $datafile;
			}
			
		}

		return response($data);
	}
}