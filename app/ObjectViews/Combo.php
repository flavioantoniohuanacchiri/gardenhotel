<?php
namespace App\ObjectViews;

use Illuminate\Support\Facades\DB;
use App\GrupoDispositivo;
use Session;

class Combo {
	public static function grupoDispositivo()
	{
		$grupos = GrupoDispositivo::all();
		$data = [];
		foreach ($grupos as $key => $value) {
			$data[$value->id] = $value->nombre;
		}
		return $data;
	}
}