<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\DespachoCompra;
use App\DespachoCompraDetalle;
use App\DevolucionVenta;
use App\DevolucionBandeja;
use App\User;
use App\Sede;
use App\Proveedor;
use App\UserSede;
use App\PagoVenta;
use App\Vehiculo;
use App\Producto;
use App\Cliente;
use App\Zonal;
use App\ObjectViews\Filtro;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
	
	public function getPagoPendiente()
	{
		$filtro = Filtro::filtroBasico();

		return view('reporte.pagopendiente.index', $filtro);
	}
}