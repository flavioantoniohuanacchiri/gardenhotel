<?php
namespace App\Http\Controllers;

//use App\Http\Requests;
use Request;
use App;
use PDF;
use App\Venta;
use App\VentaDetalle;
use App\Cliente;
use App\ClienteZonal;
use Config;
use Illuminate\Support\Facades\Auth;
use DB;

class ProcesoVentaController
{
	public function __construct()
	{
		$body = Request::all();
		Auth::loginUsingId($body["idusuario"]);
		$data = $body["data"];
		//dd($data);
		//print_r($data);
		$ok = 0;
		$noOk = 0;
		$ventas = [];
		foreach ($data as $key => $value) {
			//echo "un valor";
			$cabecera = $value["cabecera"];
			$cabecera = $value["cabecera"];
			unset($cabecera["id"]);

			if($cabecera["codigo"]!=="") {
				//$cabecera["estado"] = 1;
				$cabecera["updated_at"] = date("Y-m-d H:i:s");
				$venta = Venta::where("codigo", "=", $cabecera["codigo"])
					->whereRaw("deleted_at IS NULL")
					->where("estado", ">", 0)
					->get();
				
				if (count($venta) > 0) {
					$noOk++;
				} else {
					$idventa = Venta::create($cabecera)->id;
					$detalle = $value["detalle"];

					foreach ($detalle as $key2 => $value2) {
						unset($value2["id"]);
						unset($value2["id_venta"]);

						$value2["id_venta"] = $idventa;
						$value2["updated_at"] = date("Y-m-d H:i:s");
						VentaDetalle::create($value2);
					}
					$ventas[] = $cabecera;
					$ok++;
				}
			} else {
				$noOk++;
			}

		}
		echo json_encode(["rst" => 1, "msj" => "Procesadas = ".$ok."<br> No Procesadas = ".$noOk, "ventas" => $ventas]);
		dd();
	}

}