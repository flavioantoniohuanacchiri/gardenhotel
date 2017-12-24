<?php

use Illuminate\Database\Seeder;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('modulo')->insert(['id' => 1, 'class_icon' => 'fa-truck' ,'nombre' => ' Despacho y Distribucion', 'url' => ' ', 'parent' => 0, 'visible' => 1, 'orden' =>0, 'estado' =>1, 'created_at' => 42699.821724537]);
      DB::table('modulo')->insert(['id' => 2, 'class_icon' => 'fa-shopping-cart' ,'nombre' => ' Venta y Compra', 'url' => ' ', 'parent' => 0, 'visible' => 1, 'orden' =>1, 'estado' =>1, 'created_at' => 42703.8043518518]);
      DB::table('modulo')->insert(['id' => 3, 'class_icon' => 'fa-refresh' ,'nombre' => ' Devoluciones', 'url' => ' ', 'parent' => 0, 'visible' => 1, 'orden' =>2, 'estado' =>1, 'created_at' => 42703.8046180555]);
      DB::table('modulo')->insert(['id' => 5, 'class_icon' => '' ,'nombre' => ' Despacho de Venta', 'url' => ' despacho', 'parent' => 1, 'visible' => 1, 'orden' =>1, 'estado' =>0, 'created_at' => 42703.8125347222]);
      DB::table('modulo')->insert(['id' => 6, 'class_icon' => 'fa-money' ,'nombre' => ' Caja', 'url' => ' ', 'parent' => 0, 'visible' => 1, 'orden' =>3, 'estado' =>1, 'created_at' => 42712.3989467593]);
      DB::table('modulo')->insert(['id' => 7, 'class_icon' => '' ,'nombre' => ' Pago de Venta', 'url' => ' pagoventa', 'parent' => 6, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42712.3994444444]);
      DB::table('modulo')->insert(['id' => 8, 'class_icon' => '' ,'nombre' => ' Devolucion Venta', 'url' => ' devolucionventa', 'parent' => 3, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42712.5810069444]);
      DB::table('modulo')->insert(['id' => 9, 'class_icon' => '' ,'nombre' => ' Actualización Precio Venta', 'url' => ' precio', 'parent' => 2, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42712.674837963]);
      DB::table('modulo')->insert(['id' => 10, 'class_icon' => '' ,'nombre' => ' Compra', 'url' => ' compra', 'parent' => 2, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42713.9953587963]);
      DB::table('modulo')->insert(['id' => 11, 'class_icon' => 'fa-key' ,'nombre' => ' Mantenimientos', 'url' => ' ', 'parent' => 0, 'visible' => 1, 'orden' =>7, 'estado' =>1, 'created_at' => 42715.2895138889]);
      DB::table('modulo')->insert(['id' => 12, 'class_icon' => '' ,'nombre' => ' Clientes', 'url' => 'cliente', 'parent' => 11, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42715.2896643518]);
      DB::table('modulo')->insert(['id' => 13, 'class_icon' => '' ,'nombre' => ' Locales', 'url' => 'sede', 'parent' => 11, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42715.2898148148]);
      DB::table('modulo')->insert(['id' => 14, 'class_icon' => '' ,'nombre' => ' Proveedores', 'url' => 'proveedor', 'parent' => 11, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42715.2903356481]);
      DB::table('modulo')->insert(['id' => 15, 'class_icon' => '' ,'nombre' => ' Vehiculo', 'url' => 'vehiculo', 'parent' => 11, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42715.2905208333]);
      DB::table('modulo')->insert(['id' => 16, 'class_icon' => '' ,'nombre' => ' Zonal', 'url' => 'zonal', 'parent' => 11, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42715.3580555556]);
      DB::table('modulo')->insert(['id' => 17, 'class_icon' => '' ,'nombre' => ' Producto', 'url' => 'producto', 'parent' => 11, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42715.367349537]);
      DB::table('modulo')->insert(['id' => 18, 'class_icon' => '' ,'nombre' => ' Devolución Compra', 'url' => ' evolucioncompra', 'parent' => 3, 'visible' => 1, 'orden' =>1, 'estado' =>0, 'created_at' => 42718.1611574074]);
      DB::table('modulo')->insert(['id' => 19, 'class_icon' => '' ,'nombre' => ' Actualizacion Precio Compra', 'url' => 'preciocompra', 'parent' => 2, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42721.07125]);
      DB::table('modulo')->insert(['id' => 20, 'class_icon' => '' ,'nombre' => ' Perfiles', 'url' => 'perfil', 'parent' => 11, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42723.0928009259]);
      DB::table('modulo')->insert(['id' => 21, 'class_icon' => '' ,'nombre' => ' Modulos', 'url' => 'modulo', 'parent' => 11, 'visible' => 1, 'orden' =>1, 'estado' =>0, 'created_at' => 42723.0928125]);
      DB::table('modulo')->insert(['id' => 22, 'class_icon' => '' ,'nombre' => ' Usuarios', 'url' => 'user', 'parent' => 11, 'visible' => 1, 'orden' =>1, 'estado' =>0, 'created_at' => 42723.0938888889]);
      DB::table('modulo')->insert(['id' => 23, 'class_icon' => '' ,'nombre' => ' Pago Venta Movil', 'url' => 'pagoventamovil', 'parent' => 6, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42725.4717592593]);
      DB::table('modulo')->insert(['id' => 24, 'class_icon' => '' ,'nombre' => ' Devolución Bandeja', 'url' => 'devolucionbandeja', 'parent' => 3, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42731.5035416667]);
      DB::table('modulo')->insert(['id' => 25, 'class_icon' => '' ,'nombre' => ' Abonos', 'url' => 'pagocompra', 'parent' => 6, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42731.6349421296]);
      DB::table('modulo')->insert(['id' => 26, 'class_icon' => '' ,'nombre' => ' Banco', 'url' => 'banco', 'parent' => 11, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42734.6711689815]);
      DB::table('modulo')->insert(['id' => 27, 'class_icon' => '' ,'nombre' => ' Chofer', 'url' => 'chofer', 'parent' => 11, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42735.1331134259]);
      DB::table('modulo')->insert(['id' => 28, 'class_icon' => '' ,'nombre' => ' Granja', 'url' => 'granja', 'parent' => 11, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42735.1335416667]);
      DB::table('modulo')->insert(['id' => 29, 'class_icon' => '' ,'nombre' => ' Contacto Pago', 'url' => 'contacto', 'parent' => 11, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42735.13375]);
      DB::table('modulo')->insert(['id' => 30, 'class_icon' => 'fa-briefcase' ,'nombre' => ' Gestion', 'url' => ' ', 'parent' => 0, 'visible' => 1, 'orden' =>6, 'estado' =>1, 'created_at' => 42735.3433680556]);
      DB::table('modulo')->insert(['id' => 31, 'class_icon' => '' ,'nombre' => ' Gestion Gasto', 'url' => 'gestiongasto', 'parent' => 30, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42735.3437384259]);
      DB::table('modulo')->insert(['id' => 32, 'class_icon' => '' ,'nombre' => ' Despacho de Compra', 'url' => 'despachocompra', 'parent' => 1, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42735.1611689815]);
      DB::table('modulo')->insert(['id' => 33, 'class_icon' => 'fa-line-chart' ,'nombre' => ' Reportes', 'url' => ' ', 'parent' => 0, 'visible' => 1, 'orden' =>5, 'estado' =>1, 'created_at' => 42737.1616435185]);
      DB::table('modulo')->insert(['id' => 35, 'class_icon' => '' ,'nombre' => ' Venta por Fecha', 'url' => 'ventaporfecha', 'parent' => 33, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42738.6874421296]);
      DB::table('modulo')->insert(['id' => 36, 'class_icon' => '' ,'nombre' => ' Venta por Fecha Facturado', 'url' => 'ventaporfechafacturado', 'parent' => 33, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42738.6877199074]);
      DB::table('modulo')->insert(['id' => 37, 'class_icon' => '' ,'nombre' => ' Pagos por Fecha', 'url' => 'pagoporfecha', 'parent' => 33, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42738.6881018519]);
      DB::table('modulo')->insert(['id' => 38, 'class_icon' => '' ,'nombre' => ' Gastos', 'url' => ' gasto', 'parent' => 11, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42739.4084027778]);
      DB::table('modulo')->insert(['id' => 39, 'class_icon' => '' ,'nombre' => ' Compra por Fecha', 'url' => 'compraporfecha', 'parent' => 33, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42742.0977546296]);
      DB::table('modulo')->insert(['id' => 40, 'class_icon' => '' ,'nombre' => ' Compra por Fecha Facturado', 'url' => 'compraporfechafacturado', 'parent' => 33, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42742.0980439815]);
      DB::table('modulo')->insert(['id' => 41, 'class_icon' => '' ,'nombre' => ' Cuentas por Pagar', 'url' => 'cuentasporpagar', 'parent' => 33, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42742.4511458333]);
      DB::table('modulo')->insert(['id' => 42, 'class_icon' => '' ,'nombre' => ' Nota de Abono de Venta', 'url' => 'notaabonoventa', 'parent' => 54, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42744.3849652778]);
      DB::table('modulo')->insert(['id' => 43, 'class_icon' => '' ,'nombre' => ' Reporte de Devoluciones', 'url' => 'reportedevolucion', 'parent' => 33, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42750.4817361111]);
      DB::table('modulo')->insert(['id' => 44, 'class_icon' => '' ,'nombre' => ' Kardex por Cliente', 'url' => 'kardexporcliente', 'parent' => 33, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42750.4826388889]);
      DB::table('modulo')->insert(['id' => 45, 'class_icon' => '' ,'nombre' => ' Cancelaciones por Fecha', 'url' => 'cancelacionporfecha', 'parent' => 33, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42750.4835763889]);
      DB::table('modulo')->insert(['id' => 46, 'class_icon' => '' ,'nombre' => ' Gastos por Fecha', 'url' => 'gastoporfecha', 'parent' => 33, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42750.4854513889]);
      DB::table('modulo')->insert(['id' => 47, 'class_icon' => '' ,'nombre' => ' Cuentas por Cobrar', 'url' => 'cuentasporcobrar', 'parent' => 33, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42750.4942361111]);
      DB::table('modulo')->insert(['id' => 48, 'class_icon' => '' ,'nombre' => ' Resumen de Ventas', 'url' => 'ventaresumen', 'parent' => 33, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42754.6241782407]);
      DB::table('modulo')->insert(['id' => 49, 'class_icon' => '' ,'nombre' => ' Reporte de Despacho Venta', 'url' => 'reportedespacho', 'parent' => 33, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42758.9574652778]);
      DB::table('modulo')->insert(['id' => 50, 'class_icon' => '' ,'nombre' => ' Reporte de Recojo de Bandejas', 'url' => 'reporterecojobandeja', 'parent' => 33, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42763.5024421296]);
      DB::table('modulo')->insert(['id' => 51, 'class_icon' => '' ,'nombre' => ' Recibo de Cobranza', 'url' => 'reporterecibocobranza', 'parent' => 33, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42764.8917939815]);
      DB::table('modulo')->insert(['id' => 52, 'class_icon' => '' ,'nombre' => ' Resumen de Ventas Uno', 'url' => 'ventaresumenuno', 'parent' => 33, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42783.6389583333]);
      DB::table('modulo')->insert(['id' => 53, 'class_icon' => '' ,'nombre' => ' Tipo Nota Abono', 'url' => 'tiponotaabono', 'parent' => 11, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42796.4000115741]);
      DB::table('modulo')->insert(['id' => 54, 'class_icon' => 'fa-credit-card' ,'nombre' => ' Notas de Abono', 'url' => ' ', 'parent' => 0, 'visible' => 1, 'orden' =>4, 'estado' =>1, 'created_at' => 42799.6503587963]);
      DB::table('modulo')->insert(['id' => 55, 'class_icon' => '' ,'nombre' => ' Nota de Abono por Cliente', 'url' => ' notaabonocliente', 'parent' => 54, 'visible' => 1, 'orden' =>0, 'estado' =>0, 'created_at' => 42799.6508333333]);
      DB::table('modulo')->insert(['id' => 56, 'class_icon' => '' ,'nombre' => ' Grupo de Dispositivos', 'url' => ' grupodispositivo', 'parent' => 11, 'visible' => 1, 'orden' =>0, 'estado' =>1, 'created_at' => 42805.374212963]);
      DB::table('modulo')->insert(['id' => 57, 'class_icon' => '' ,'nombre' => ' Dispositivos', 'url' => 'dispositivo', 'parent' => 11, 'visible' => 1, 'orden' =>0, 'estado' =>1, 'created_at' => 42805.4050347222]);
      DB::table('modulo')->insert(['id' => 58, 'class_icon' => 'fa-credit-card' ,'nombre' => 'Mantenimiento Web', 'url' => ' ', 'parent' => 0, 'visible' => 1, 'orden' =>0, 'estado' =>1, 'created_at' => 43079.8617361111]);
      DB::table('modulo')->insert(['id' => 59, 'class_icon' => '' ,'nombre' => ' Inicio', 'url' => 'admin/section-inicio', 'parent' => 58, 'visible' => 1, 'orden' =>0, 'estado' =>1, 'created_at' => 43079.8617361111]);
      DB::table('modulo')->insert(['id' => 60, 'class_icon' => '' ,'nombre' => ' Hotel', 'url' => 'admin/section-hotel', 'parent' => 58, 'visible' => 1, 'orden' =>0, 'estado' =>1, 'created_at' => 43079.8617361111]);
      DB::table('modulo')->insert(['id' => 61, 'class_icon' => '' ,'nombre' => ' Ofertas', 'url' => 'admin/section-ofertas', 'parent' => 58, 'visible' => 1, 'orden' =>0, 'estado' =>1, 'created_at' => 43079.8617361111]);
      DB::table('modulo')->insert(['id' => 62, 'class_icon' => '' ,'nombre' => ' Sala de Conferencias', 'url' => 'admin/section-salaconferencias', 'parent' => 58, 'visible' => 1, 'orden' =>0, 'estado' =>1, 'created_at' => 43079.8617361111]);
      DB::table('modulo')->insert(['id' => 63, 'class_icon' => '' ,'nombre' => ' Habitaciones', 'url' => 'admin/section-habitaciones', 'parent' => 58, 'visible' => 1, 'orden' =>0, 'estado' =>1, 'created_at' => 43079.8617361111]);
      DB::table('modulo')->insert(['id' => 64, 'class_icon' => '' ,'nombre' => ' Centro Finaciero', 'url' => 'admin/section-centrofinanciero', 'parent' => 58, 'visible' => 1, 'orden' =>0, 'estado' =>1, 'created_at' => 43079.8617361111]);
    }

}
