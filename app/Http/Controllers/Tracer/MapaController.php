<?php
namespace App\Http\Controllers\Tracer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dispositivo;
use App\DispositivoImagen;
use App\GrupoDispositivo;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Image;
use File;
use URL;
use App\ObjectViews\Combo;
use App\Helpers\FuncionesMatematicas as FM;

class MapaController
{

    public function getTracer()
    {
        $data = [];
        $grupos = GrupoDispositivo::where("estado", "=", 1)
        ->whereRaw("deleted_at IS NULL")
        ->get();
        return view("mapas.tracer", ["grupos" => $grupos]);
    }

    public function setUbicacion(Request $request)
    {
        $folderLocalizaciones = public_path("localizaciones");
        Log::useDailyFiles(storage_path().'/logs/ubicacion.log');
        Log::info([$request]);
        $longitud = $request->lon;
        $latitud = $request->lat;
        $codigo =$request->cod;
        $tiempo = 10/3600;

        $dispositivo =Dispositivo::where([
            "codigo" => $codigo,
            "estado" => 1
        ])->first();
        
		if (!is_null($dispositivo)) {
			if(!is_null($longitud) && !is_null($latitud)) {
			$dataupdate = ["longitud" => $longitud, "latitud" => $latitud, "hora" => date("Y-m-d H:i:s")];
			$rutaubicacion =$folderLocalizaciones."/".$codigo.".txt";
			if(File::exists($rutaubicacion)) {
				$dataactual = File::get($rutaubicacion);
				$dataactual = json_decode($dataactual, true);

				if ($dataactual["latitud"] == $latitud && $dataactual["longitud"] == $longitud) {
					$dataupdate = $dataactual;
					$dataupdate["estado"] = "Detenido";
				} else {
					$puntoInicio = ["latitud" => $dataactual["latitud"], "longitud" => $dataactual["longitud"]];
					$puntoFin = ["latitud" => $dataupdate["latitud"], "longitud" => $dataupdate["longitud"]];

					$distanciaKm = abs(FM::geoDistanciaKM($puntoInicio, $puntoFin));
					$dataupdate["distanciarecorrida"] = $distanciaKm;

					$puntosLongitud = [$dataactual["longitud"], $dataupdate["longitud"]];
					$puntosLatitud = [$dataactual["latitud"], $dataupdate["latitud"]];

					$angulo = FM::anguloGiro($puntosLatitud, $puntosLongitud);
					$dataupdate["direccion"] = $angulo["direccion"];
					$dataupdate["diflatitud"] = $angulo["diflatitud"];
					$dataupdate["diflongitud"] = $angulo["diflongitud"];
					$dataupdate["estado"] = "Movimiento";

					$angulogiro = 0;

					/*if (isset($dataactual["rumbo"])) {
						$rumboanterior = $dataactual["rumbo"];
					} else {
						$rumboanterior = 0;
					}*/
					
					$rumbo = FM::rumbo($puntoInicio, $puntoFin);
					if ($rumbo == 0) {
						if (isset($dataactual["angulogiroanterior"])) {
							$dataupdate["angulogiro"] = $dataactual["angulogiroanterior"];
						} else {
							$dataupdate["angulogiroanterior"] = 0;
						}
						//$dataupdate["rumbo"] = $rumboanterior;
						//$dataupdate["rumboanterior"] = $rumboanterior;
					} else {
						$dataupdate["angulogiro"] = (int)($rumbo*180/pi());
						$dataupdate["angulogiroanterior"] = (int)($rumbo*180/pi());
						//if ($dataactual)
						//$dataupdate["rumbo"] = $rumbo;
					}
					$dataupdate["rumbo"] = $rumbo;
					//$icono = FM::getIconoRumbo($rumbo);
					//$dataupdate["icono"] = $icono;
				}
				$dataupdate["velocidad"] = 0;
				if (isset($dataupdate["distanciarecorrida"])) {
					$dataupdate["velocidad"] = $dataupdate["distanciarecorrida"] / $tiempo;
				}
			}
			File::put($rutaubicacion,json_encode($dataupdate));
			}

		}
	}

    public function getUbicaciones(Request $request)
    {
        $filtros = ["idgrupo" => "", "iddispositivo" => []];
        if (isset($request["idgrupo"])) {
        	$filtros["idgrupo"] = $request["idgrupo"];
        }
        if (isset($request["iddispositivo"])) {
        	$filtros["iddispositivo"] = $request["iddispositivo"];
        }
        $data = [];
        if ($filtros["idgrupo"]!="") {
        	$folderLocalizaciones = public_path('/localizaciones');
	        $folderImagenes =public_path("imgs/dispositivos");
	        $urlImagenes = URL::to('/imgs/dispositivos');
	        $dispositivos = Dispositivo::where(["estado" => 1]);
	        $dispositivos = $dispositivos->where("id_grupo", "=", $filtros["idgrupo"]);

	        $dispositivos = $dispositivos->whereRaw("deleted_at IS NULL")
	            ->get();

	        
			foreach ($dispositivos as $key2 => $value2) {
				$urlfile = $folderLocalizaciones."/".$value2->codigo.".txt";
				if (File::exists($urlfile)) {
					//$urlImagenes = URL::to("/imgs/dispositivos/".$value2->codigo);
					$datafile = File::get($urlfile);
					$imagen = DispositivoImagen::where(["id_dispositivo" => $value2->id])->whereRaw("deleted_at IS NULL")->first();
					$datafile = json_decode($datafile, true);
					if (!is_null($imagen)) {
						if (isset($datafile["rumbo"]) && $datafile["rumbo"] !="") {
							$icono = FM::getIconoRumbo($datafile["rumbo"]);
							$imagenexplode = explode(".", $imagen->url);
							//$datafile["img"] = $urlImagenes."/".$imagenexplode[0].$icono.".".$imagenexplode[1];
							$datafile["img"] = $urlImagenes."/2288/1489438813.png";
						} else {
							//$datafile["img"] = $urlImagenes."/".$imagen->url;
							$datafile["img"] = $urlImagenes."/2288/1489438813.png";
						}
					} else {
							$datafile["img"] = "";
					}
					$datafile["descripcion"] = $value2->descripcion;
					$datafile["codigo"] = $value2->codigo;

					if ( !isset($datafile["angulogiro"])) {
						$datafile["rotate"] = 0;
					} else {
						$datafile["rotate"] = $datafile["angulogiro"];
					}
					//$datafile["rotate"] = $datafile["angulogiro"];
						
					$data[$value2->codigo] = $datafile;
				}
			}
        }
        


		return response($data);
	}
}