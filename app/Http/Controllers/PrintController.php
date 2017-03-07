<?php
namespace App\Http\Controllers;

//use App\Http\Requests;
use Request;
use App;
use PDF;
use App\Venta;
use App\VentaDetalle;
use App\DevolucionVenta;
use App\DevolucionVentaDetalle;
use App\Cliente;
use App\ClienteZonal;
use App\Vehiculo;
use Config;

class PrintController
{
	public function imprimirVenta()
	{
		$filasPrimeraPagina = 8;
		$filasPorPagina = 12;
		$idventa = Request::input("id");
		$venta = Venta::find($idventa);
		$html = "";
		if (!is_null($venta)) {
			$vehiculo = Vehiculo::find($venta->id_vehiculo);
			$detalle = VentaDetalle::where("id_venta", "=", $idventa)
						->whereRaw("deleted_at IS NULL")
						->get();
			$detalledevolucion  = [];
			$devolucion = DevolucionVenta::where("id_venta", "=", $idventa)
				->whereRaw("deleted_at IS NULL")->first();
			if (!is_null($devolucion)) {
				$detalledevolucion = DevolucionVentaDetalle::where(["id_devolucion" => $devolucion->id])->whereRaw("deleted_at IS NULL")->get();
			}
			$numFilas = count($detalle);

			$cliente = Cliente::find($venta->id_cliente);
			$clienteWithZonal = Cliente::with("zonales")->find($cliente->id);

			$pdf = App::make('dompdf.wrapper');
			$htmlpie  = "";
			$html="<div style='font-family: Arial; width: 320px;'>";
			$html.= "<h1 style='text-align:center; font-size:14px'>".Config::get("sistema.pdf.titulo")."</h1>";
			//$html.="<p style='font-size:13px; line-height: 5px'><b>Cod. Venta Autoge:</b>  ".$venta->codigo." </p>";
			$html.="<p style='font-size:13px; line-height: 5px'><b>Fecha y Hora:</b>  ".$venta->created_at." </p>";
			$html.="<p style='font-size:13px; line-height: 5px'><b>Cliente:</b>  ".$cliente->nombre." ".$cliente->apellido."</p>";
			if(!is_null($vehiculo)) {
				$html.="<p style='font-size:13px; line-height: 5px'><b>Placa:</b>  ".$vehiculo->placa."</p>";
			}
			//$html.="<p style='font-size:13px; line-height: 5px'><b>Zona:</b>  ".$clienteWithZonal->zonales[0]->codigo." </p>";
			if (count($detalle) > 0) {
				$numPaginas = 1;
				if ($numFilas > $filasPrimeraPagina) {
					$tmp = $numFilas - $filasPrimeraPagina;
					$numPaginas+=(int)($tmp / $filasPorPagina);
					$resto = $tmp - $numPaginas*$filasPorPagina;
					if ($resto < 0) {
						$numPaginas++;
					}
				}
				// Calculando Totales
				$pesobruto = 0; $pesotara = 0; $nrobandeja  = 0; $cantidad = 0;
				$cantidaddevuelta = 0;
				foreach ($detalle as $key => $value) {
					$pesobruto+=$value->peso;
					$pesotara+=$value->pesobandeja*$value->nrobandeja;
					$nrobandeja+=$value->nrobandeja;
					$cantidad+=$value->cantidad;
				}

				foreach ($detalledevolucion as $key => $value) {
					$cantidaddevuelta+=$value->cantidad;
				}

				$pesoneto = $pesobruto - $pesotara;
				$cantidad-=$cantidaddevuelta;

				$htmlpie.="<div>";
				$htmlpie.="<table style='border-top:solid 1px; border-bottom:solid 1px; font-size:13px; text-align:center; margin-bottom: 15px;'>";
				$htmlpie.="<tbody style='padding-bottom: 5px;'>";
					$htmlpie.="<tr>
								<td width='80px'><b>Peso Bruto</b></td>
								<td width='80px''>".number_format($pesobruto,2)."</td>
								<td width='80px''><b>Peso Neto</b></td>
								<td width='80px''>".number_format($pesoneto - $venta->pesodevolucion,2)."</td>
							</tr>";
					$htmlpie.="<tr>
								<td width='80px''><b>Peso Tara</b></td>
								<td width='80px''>".number_format($pesotara,2)."</td>
								<td width='80px''><b>Devolucion</b></td>
								<td width='80px''>".number_format($venta->pesodevolucion,2)."</td>
							</tr>";
					$htmlpie.="<tr>
								<td width='80px''><b>Total Jabas</b></td>
								<td width='80px''>".$nrobandeja."</td>
								<td width='80px''><b>Total Aves</b></td>
								<td width='80px''>".$cantidad."</td>
							</tr>";
				$htmlpie.="</tbody>";
				$htmlpie.="</table>";
				$htmlpie.="</div>";
				$htmlpie.="<div style='height:15px;'></div>";

				for($j = 1; $j <= $numPaginas ; $j++) {
					$html.="<div>";
					$html.="<table>";
					$html.="<thead style='border-top:solid 1px; border-bottom:solid 1px; font-size:13px'>";
					$html.="<tr>
								<th width='80px'><b>Nro.Jabas</b></th>
								<th width='80px'><b>Nro.Aves</b></th>
								<th width='80px'><b>Peso Bruto</b></th>
								<th width='80px'><b>Peso Tara</b></th>
							</tr>";
					$html.="</thead>";
					$html.="<tbody>";
					$html.="</tbody>";
					$html.="<tbody style='font-size:13px'>";
					$html.="</table>";
					$html.="</div>";
					if ($j == 1) {
						$html.="<div>";
						$html.="<table style='margin: 3.84px 0px;'>";
						$html.="<tbody>";
						for ($k = 1; $k <=$filasPrimeraPagina; $k++) {
							$indice = $filasPrimeraPagina*($j-1) + $k-1;
							if (isset($detalle[$indice])) {
								$value = $detalle[$indice];
								$html.="<tr>
									<td width='80px' align='center'>".$value->nrobandeja."</td>
									<td width='80px' align='center'>".$value->cantidad."</td>
									<td width='80px' align='center'>".number_format($value->peso,2)."</td>
									<td width='80px' align='center'>".number_format($value->pesobandeja*$value->nrobandeja,2)."</td>
								</tr>";
							}
						}
						$html.="</tbody>";
						$html.="</table>";
						$html.="</div>";
					} else {
						$html.="<table style='margin: 3.8px 0px;'>";
						$html.="<tbody>";
						for ($k = 0; $k < $filasPorPagina; $k++) {
							$indice = $filasPrimeraPagina + $filasPorPagina*($j-2) + $k;
							
							if (isset($detalle[$indice])) {
								$value = $detalle[$indice];
								$html.="<tr>
									<td width='80px' align='center'>".$value->nrobandeja."</td>
									<td width='80px' align='center'>".$value->cantidad."</td>
									<td width='80px' align='center'>".number_format($value->peso,2)."</td>
									<td width='80px' align='center'>".number_format($value->pesobandeja*$value->nrobandeja,2)."</td>
								</tr>";
							}
						}
						$html.="</tbody>";
						$html.="</table>";
						$html.="</div>";
					}
					$html.=$htmlpie;
				}
			}

		$html.="</div>";
		
		$pdf->loadHTML($html)->setPaper([0,0,311.81,371.34]);
		return $pdf->stream();
		}


	/*	
		if ($numFilas > 0) {

			//$html.="<b># Paginas = $numPaginas</b>";
			if ($numPaginas <=1) {
				$html.="<table>";
				$html.="<tbody>";
				foreach ($detalle as $key => $value) {
					$pesobruto+=$value->peso;
					$pesotara+=$value->pesobandeja*$value->nrobandeja;
					$nrobandeja+=$value->nrobandeja;
					$cantidad+=$value->cantidad;

					$html.="<tr>
								<td width='80px' align='center'>".$value->nrobandeja."</td>
								<td width='80px' align='center'>".$value->cantidad."</td>
								<td width='80px' align='center'>".number_format($value->peso,2)."</td>
								<td width='80px' align='center'>".number_format($value->pesobandeja*$value->nrobandeja,2)."</td>
							</tr>";
				}
				$html.="</tbody>";
				$html.="</table>";
			} else {
				for ($j = 1; $j<= $numPaginas ; $j++) {
					if ($j == 1) {
						$html.="<table>";
						$html.="<tbody>";
						for($k = 0; $k < $filasPrimeraPagina; $k++) {
							if (isset($detalle[$k])) {
								$value = $detalle[$k];
								$pesobruto+=$value->peso;
								$pesotara+=$value->pesobandeja*$value->nrobandeja;
								$nrobandeja+=$value->nrobandeja;
								$cantidad+=$value->cantidad;

								$html.="<tr>
									<td width='80px' align='center'>".$value->nrobandeja."</td>
									<td width='80px' align='center'>".$value->cantidad."</td>
									<td width='80px' align='center'>".number_format($value->peso,2)."</td>
									<td width='80px' align='center'>".number_format($value->pesobandeja*$value->nrobandeja,2)."</td>
								</tr>";
							}
						}
						$html.="</tbody>";
						$html.="</table>";
					} else {
						$html.="<table>";
						$html.="<tbody>";
						for($k = 0; $k < $filasPorPagina; $k++) {
							if ($j == 2) {
								$indice = $filasPrimeraPagina*($j-1) + ($k+1);
							} else {
								$indice = $filasPorPagina*($j-1) + ($k+1);
							}
							//$html.="<tr><td>Indice : $indice</td></tr>";
							if (isset($detalle[$indice])) {
								$value = $detalle[$indice];
								$pesobruto+=$value->peso;
								$pesotara+=$value->pesobandeja*$value->nrobandeja;
								$nrobandeja+=$value->nrobandeja;
								$cantidad+=$value->cantidad;

								$html.="<tr>
									<td width='80px' align='center'>".$value->nrobandeja."</td>
									<td width='80px' align='center'>".$value->cantidad."</td>
									<td width='80px' align='center'>".number_format($value->peso,2)."</td>
									<td width='80px' align='center'>".number_format($value->pesobandeja*$value->nrobandeja,2)."</td>
								</tr>";
							}
						}
						$html.="</tbody>";
						$html.="</table>";
					}
				}
			}

		}

		$html.="</tbody>";
		$html.="</table>"; */
		//$html.="<br><br>";
	}
}