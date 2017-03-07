<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteZonal extends Model
{
    //
    protected $table = 'cliente_zonal';
    
    protected $fillable=[
        'id_cliente',
        'id_zonal',
    ];
    
    public $timestamps = false;
    
    public function exists($idCliente, $idZonal)
    {
        return ClienteZonal::where('id_cliente', '=', $idCliente)
            ->where('id_zonal', '=', $idZonal)
            ->firstOrFail();
    }
}