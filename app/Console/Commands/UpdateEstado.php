<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Dispositivo;
use File;

class UpdateEstado extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tracer:updateestado';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
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
                }
                File::put($urlfile, json_encode($data));
            }
        }
    }
}
