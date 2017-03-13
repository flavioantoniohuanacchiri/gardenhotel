<?php
namespace App\ObjectViews;

use Illuminate\Support\Facades\DB;
use App\GrupoDispositivo;
use Session;

class Combo {
	public static function grupoDispositivo()
	{
		$data = [];
		$data[""] = "Todos";
		if (!Session::has("sistema.grupodispositivo")) {
			$grupos = GrupoDispositivo::all();
			
			foreach ($grupos as $key => $value) {
				$data[$value->id] = $value->nombre;
			}
			Session::put("sistema.grupodispositivo", $data);
		} else {
			$data = Session::get("sistema.grupodispositivo");
		}
		return $data;
	}
}