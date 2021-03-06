<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dispositivo;
use App\GrupoDispositivo;
use App\DispositivoImagen;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use Image;
use File;
use App\ObjectViews\Combo;

class DispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $grupos = Combo::grupoDispositivo();
        if ($request->ajax()) {
            $rows = Dispositivo::select(
                'dispositivo.id',
                'gd.nombre AS grupo',
                'codigo',
                DB::raw("CASE dispositivo.estado
                    WHEN 0 THEN 'Desactivado'
                    WHEN 1 THEN 'Activo'
                    ELSE NULL
                    END as 'estado'"),
                'dispositivo.created_at',
                'dispositivo.updated_at'
            )->leftJoin("grupo_dispositivo AS gd", "gd.id", "=", "dispositivo.id_grupo")
            ->whereRaw("dispositivo.deleted_at IS NULL");

            /*if (isset($request->estado) && $request->estado!="") {
                $rows->where("dispositivo.estado", "=", $request->estado);
            }*/
            return Datatables::of($rows)
                ->addColumn('action', function ($data) {
                    return Helper::actionDatatableAjax('dispositivo', [$data->id => $data->nombre], ["view", "delete"]);
                })
                ->make(true);
        }

        return view('master.dispositivo.index', ['grupos' => $grupos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dispositivo = $request["dispositivo"];
        $iddispositivo = 0;
        if (isset($request["iddispositivo"])) {
            $iddispositivo = $request["iddispositivo"];
        }
        if ($iddispositivo == 0) {
            $obj = Dispositivo::where(
                "codigo",
                "=",
                $dispositivo["codigo"]
            )->first();
            if (!is_null($obj)) {
                return response(["rst" => 2, "msj" => "Código ya existe!!!"]);
            }

            if (count($request->file("imagen")) == 0) {
                return response(["rst" => 2, "msj" => "Debe elegir la Imagen!!!"]);
            }
        }
        try {
            if ($iddispositivo == 0) {
                $objdispositivo = new Dispositivo;
                $objdispositivo->codigo =  $dispositivo["codigo"];
            } else {
                $objdispositivo = Dispositivo::find($iddispositivo);
            }
            
            $objdispositivo->descripcion =  $dispositivo["descripcion"];
            $objdispositivo->estado =  $dispositivo["estado"];
            $objdispositivo->id_grupo =  $dispositivo["grupo"];
            $objdispositivo->save();
            /*$pathImagenesDispositivo = "imgs/dispositivos/".$objdispositivo->codigo."/";
            //$pathImagenesDispositivo = "imgs/dispositivos/";
            
            if (!file_exists($pathImagenesDispositivo)) {
                File::makeDirectory($pathImagenesDispositivo, 0777, true, true);
            }
            if ($request->file()) {
                $image = $request->file('imagen');
                //dd($request->file('imagen')[0]);
                $time = time();
                $filename  = $time .'.' . $image->getClientOriginalExtension();
                $path = public_path($pathImagenesDispositivo.$filename);
                Image::make($image->getRealPath())->resize(64, 64)->save($path);

                if ($iddispositivo == 0) {
                    $objimagen = new DispositivoImagen;
                    $objimagen->id_dispositivo = $objdispositivo->id;
                    $objimagen->url = $filename;
                    $objimagen->save();

                } else {
                    $objimagen = DispositivoImagen::where("id_dispositivo", "=", $iddispositivo)->first();
                    $url = explode(".", $objimagen->url);
                    $time = $url[0];
                }
                
                if ($iddispositivo > 0) {
                    $explode = explode(".", $objimagen->url);
                    $filename = $time.".".$explode[1];
                }

                for ($i=0; $i <=360; $i++) {
                    $filenametmp  = $time . '_'.$i.'.' . $image->getClientOriginalExtension();
                    $path  = public_path($pathImagenesDispositivo.$filenametmp);
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                    Image::make($image->getRealPath())->resize(64, 64)->rotate($i)->save($path);
                }
                //dd($request->file('imagen'));

                //dd($objimagen);
                if ($iddispositivo > 0) {
                    $objimagen->url = $filename;
                    $objimagen->save();
                }
            }*/
            $objdispositivo->save();

            if ($iddispositivo == 0) {
                return response(["rst" => 1, "msj" => "Dispositivo Registrado!!!"]);
            } else {
                return response(["rst" => 1, "msj" => "Dispositivo Actualizado!!!"]);
            }
            

        } catch (Illuminate\Database\QueryException $e) {
            return response(["rst" => 2, "msj" => "Código ya existe!!!"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dispositivo = Dispositivo::select(
            "dispositivo.*",
            "di.url as urlimagen"
        )
           ->leftJoin("dispositivo_imagenes as di", "di.id_dispositivo", "=", "dispositivo.id")
           ->where("dispositivo.id", "=", $id)
           ->whereRaw("dispositivo.deleted_at IS NULL")
           ->whereRaw("di.deleted_at IS NULL")
           ->first();
        return response(["rst" => 1, "dispositivo" => $dispositivo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dispositivo::find($id)->delete();
        return response(["rst" => 1, "msj" => "Eliminado"]);
    }
}