<?php namespace App;

use File;

class Dispositivo extends BaseModel
{

    protected $table = 'dispositivo';
    protected $dates = ['deleted_at'];

    protected $fillable=[
        'id',
        'id_grupo',
        'identificador',
        'descripcion',
        'tipo',
        'estado',
        'user_created_at',
        'user_updated_at',
        'userid_created_at',
        'userid_updated_at',
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    public function updateEstado()
    {
        $folderLocalizaciones = public_path('/localizaciones');
        $dispositivos = Dispositivo::where(["estado" => 1])->get();
        $ahora = date("Y-m-d H:i:s");
        $tiempoahora = strtotime($ahora);
        foreach ($dispositivos as $key => $value) {
            $urlfile = $folderLocalizaciones."/".$value->codigo.".txt";
            if (File::exists($urlfile)) {
                $data = json_decode(File::get($urlfile), true);
                $horaupdate = $data["hora"];
                $tiempohoraupdate = strtotime($horaupdate);
                $diferencia = $tiempoahora - $tiempohoraupdate;
                // tiempo mayor a 1 minutos
                if ($diferencia > 60) {
                    $data["estado"] = "Detenido";
                    $data["velocidad"] = 0;
                }
                File::put($urlfile, json_encode($data));
            }
        }
    }
}
