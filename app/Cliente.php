<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Venta;
use App\VentaDescuento;

class Cliente extends Model
{
    use SoftDeletes;
    //
    protected $table = 'cliente';
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    protected $fillable=[
        'id',
        'nombre',
        'apellido',
        'documento',
        'ciudad',
        'direccion',
        'movil',
        'movildos',
        'estado',
        'email',
        'estado',
        'id_users',
        'user_created_at',
        'user_updated_at',
        'userid_created_at',
        'userid_updated_at',
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    public function zonales() {
        return $this->hasMany('App\ClienteZonal', 'id_cliente')
            ->join('zonal', 'cliente_zonal.id_zonal', '=', 'zonal.id');
    }

    public static function boot()
    {
        Cliente::creating(function ($venta) {
            
            $venta->userid_created_at = Auth::user()->id;
            $venta->user_created_at = Auth::user()->name;
        });

        Cliente::updating(function ($venta) {
            
            $venta->userid_updated_at = Auth::user()->id;
            $venta->user_updated_at = Auth::user()->name;
        });

        Cliente::deleting(function ($venta) {
            
            $venta->userid_deleted_at = Auth::user()->id;
            $venta->user_deleted_at = Auth::user()->name;
        });
    }

    public function getVentaDeuda($idventa = 0)
    {
        if ($idventa > 0) {
            $deuda = Venta::whereRaw("deleted_at IS NULL")
            ->where("total", ">", 0)
            ->where("id", "<>", $idventa)
            ->where("id_cliente", "=", $this->id)
            ->where("estado", ">", 0)
            ->where("estado", "<", 3)
            ->whereRaw(" (total - (preciodevolucion + pesoabonado + IFNULL(descuento, 0)  + totalpagado) ) > 0 ")
            ->orderBy("fecha", "ASC")
            ->get();
            return $deuda;
        } else {
            $deuda = Venta::whereRaw("deleted_at IS NULL")
            ->where("total", ">", 0)
            ->where("id_cliente", "=", $this->id)
            ->where("estado", ">", 0)
            ->where("estado", "<", 3)
            ->whereRaw(" (total - (preciodevolucion + pesoabonado + IFNULL(descuento, 0)  + totalpagado) ) > 0 ")
            ->orderBy("fecha", "ASC")
            ->get();
            return $deuda;
        }
    }

    public function getSaldoPorFecha($fecha = "")
    {
        $deudas = Venta::where("estado", "<", 3)
            ->where("estado", ">", 0)
            ->where("fecha", "<", $fecha)
            ->where("id_cliente", "=", $this->id)
            ->whereRaw("deleted_at IS NULL")
            ->get();
        //sdd($deudas);
        $pagos = PagoVenta::where("id_cliente", "=", $this->id)
            ->whereRaw("IFNULL(pagoventa.fecha, pagoventa.created_at) < '$fecha'")
            ->whereRaw("deleted_at IS NULL")
            ->get();

        $sumadeuda = 0;
        $sumapago = 0;

        foreach ($deudas as $key => $value) {
            $sumadeuda+=$value->total;
            $sumadeuda-=$value->preciodevolucion;
            $sumadeuda-=$value->precioabonado;
            if (!is_null($value->descuento)) {
                $sumadeuda-=$value->descuento;
            }
        }

        foreach ($pagos as $key => $value) {
            $sumapago+=$value->total;
        }
        //dd($sumapago."-".$sumadeuda);
        return ($sumadeuda - $sumapago);
    }

    public function getMontoAFavor()
    {
        return VentaDescuento::where(["id_cliente" => $this->id])->where("deleted_at", "=", "0000-00-00 00:00:00")->get();
    }
}
