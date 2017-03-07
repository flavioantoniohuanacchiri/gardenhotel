<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['web']], function () {
    Route::resource('cliente', 'Master\ClienteController');
    Route::resource('proveedor', 'Master\ProveedorController');
    Route::resource('producto', 'Master\ProductoController');
    Route::resource('sede', 'Master\SedeController');
    Route::resource('vehiculo', 'Master\VehiculoController');
    Route::resource('modulo', 'Master\ModuloController');
    Route::resource('perfil', 'Master\PerfilController');
    Route::resource('ubigeo', 'Master\UbigeoController');
    Route::resource('user', 'Master\UserController');
    Route::resource('zonal', 'Master\ZonalController');
    Route::resource('contacto', 'Master\ContactoController');
    Route::resource('banco', 'Master\BancoController');
    Route::resource('granja', 'Master\GranjaController');
    Route::resource('gasto', 'Master\GastoController');
    Route::resource('chofer', 'Master\ChoferController');
    Route::resource('tiponotaabono', 'Master\TipoNotaAbonoController');

    Route::resource('despacho', 'Sale\DespachoController');
    Route::resource('despachocompra', 'Compra\DespachoCompraController');
    Route::resource('despachocompradetalle', 'Compra\DespachoCompraDetalleController');

    Route::resource('venta', 'Sale\VentaController');
    Route::resource('precio', 'Sale\VentaPrecioController');
    Route::resource('ventadetalle', 'Sale\VentaDetalleController');
    Route::resource('ventadescuento', 'Sale\VentaDescuentoController');

    Route::resource('devolucionventa', 'Devolucion\DevolucionVentaController');
    Route::resource('devolucionventadetalle', 'Devolucion\DevolucionVentaDetalleController');
    Route::resource('devolucioncompra', 'Devolucion\DevolucionCompraController');
    Route::resource('devolucioncompradetalle', 'Devolucion\DevolucionCompraDetalleController');
    Route::resource('devolucionbandeja', 'Devolucion\DevolucionBandejaController');
    Route::resource('devolucionbandejadetalle', 'Devolucion\DevolucionBandejaDetalleController');

    Route::resource('pagoventa', 'Payment\PagoVentaController');
    Route::resource('pagoventadetalle', 'Payment\PagoVentaDetalleController');
    Route::resource('pagocompra', 'Payment\PagoCompraController');
    Route::resource('pagocompradetalle', 'Payment\PagoCompraDetalleController');
    Route::resource('pagoventamovil', 'Payment\PagoVentaMovilController');

    Route::resource('compra', 'Compra\CompraController');
    Route::resource('compradetalle', 'Compra\CompraDetalleController');
    Route::resource('preciocompra', 'Compra\CompraPrecioController');
    
    Route::resource('guiaremision', 'Compra\GuiaRemisionController');
    Route::resource('guiaremisiondetalle', 'Compra\GuiaRemisionDetalleController');

    Route::resource('gestiongasto', 'Gestion\GestionGastoController');

    Route::get('/master/perfil', 'Master\MasterController@getPerfil');
    Route::get('/master/modulo', 'Master\MasterController@getModulo');
    Route::get('/master/userperfil-by-user/{user}', 'Master\MasterController@getUserPerfilByUser');
    Route::get('/printventa', 'PrintController@imprimirVenta');
    Route::resource("/procesodespacho", "ProcesoVentaController");

    Route::resource('/reportedespacho', 'Reporte\ReporteDespachoVentaController');
    Route::resource('/ventaporfecha', 'Reporte\ReporteVentaporFechaController');
    Route::resource('/ventaporfechafacturado', 'Reporte\ReporteVentaporFechaFacturadoController');
    Route::resource('/ventaresumen', 'Reporte\ReporteVentaResumenController');
    Route::resource('/ventaresumenuno', 'Reporte\ReporteVentaResumenUnoController');
    Route::resource('/cancelacionporfecha', 'Reporte\ReporteCancelacionporFechaController');
    Route::resource('/reportedevolucion', 'Reporte\ReporteDevolucionController');
    Route::resource('/kardexporcliente', 'Reporte\ReporteKardexporClienteController');
    Route::resource('/cuentasporcobrar', 'Reporte\ReporteCuentaporCobrarController');
    Route::resource('/reportedescuento', 'Reporte\ReporteDescuentoController');
    Route::resource('reporterecojobandeja', 'Reporte\ReporteRecojoBandejaController');
    Route::resource('reporterecibocobranza', 'Reporte\ReporteReciboCobranzaController');

    Route::resource('/compraporfecha', 'Reporte\ReporteCompraporFechaController');
    Route::resource('/compraporfechafacturado', 'Reporte\ReporteCompraporFechaFacturadoController');

    Route::resource('/pagoporfecha', 'Reporte\ReportePagoporFechaController');
    Route::resource('/cuentasporpagar', 'Reporte\ReporteCuentaporPagarController');
    Route::resource('/kardexporproveedor', 'Reporte\ReporteKardexporProveedorController');
    Route::resource('/gastoporfecha', 'Reporte\ReporteGastoporFechaController');
    Route::resource('/gastoporzona', 'Reporte\ReporteGastoporZonaController');
    Route::resource('/gastoporsede', 'Reporte\ReporteGastoporSedeController');

    Route::resource('/notaabonoventa', 'NotaAbono\NotaAbonoController');
    Route::resource('/notaabonoventadetalle', 'NotaAbono\NotaAbonoDetalleController');

    Route::resource('/notaabonocliente', 'NotaAbono\NotaAbonoClienteController');
});
