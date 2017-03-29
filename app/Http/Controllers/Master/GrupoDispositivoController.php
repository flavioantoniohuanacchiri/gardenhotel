<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GrupoDispositivo;
use App\GrupoDispositivoGpx;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use App\ObjectViews\Combo;
use File;
use URL;
use App\Dispositivo;

class GrupoDispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $rows = GrupoDispositivo::select(
                'id',
                'nombre',
                'descripcion',
                DB::raw("CASE estado
                    WHEN 0 THEN 'Desactivado'
                    WHEN 1 THEN 'Activo'
                    ELSE NULL
                    END as 'estado'"),
                'created_at',
                'updated_at'
            );
            return Datatables::of($rows)
                ->addColumn('action', function ($data) {
                    return Helper::actionDatatable('grupodispositivo', [$data->id => $data->nombre], ["update", "delete"]);
                })
                ->make(true);
        }

        return view('master.grupodispositivo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = Combo::grupoDispositivo();
        $grupodispositivo = new GrupoDispositivo;
        return view('master.grupodispositivo.create', ["grupo" => $grupodispositivo, "grupogpx" => []]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objgrupo = new GrupoDispositivo;
        $grupo = $request["grupo"];

        $objgrupo->nombre = $grupo["nombre"];
        $objgrupo->descripcion = $grupo["descripcion"];
        $objgrupo->estado = $grupo["estado"];

        try {
            $objgrupo->save();
            if ($request->file()) {
                $gpxs = $request->file("archivogpx");
                $colores = $request["colorgpx"];
                $i = 0;
                foreach ($gpxs as $key => $value) {
                    $url = (time() + $i). '.' .$value->getClientOriginalExtension();

                    $path = base_path() . "/public/gpx/_".$objgrupo->id;
                    if (!file_exists($path)) {
                        File::makeDirectory($path, 0777, true, true);
                    }
                    $value->move($path."/", $url);
                    $objgrupogpx = new GrupoDispositivoGpx;
                    $objgrupogpx->url = $url;
                    $objgrupogpx->color = $colores[$i];
                    $objgrupogpx->id_grupo_dispositivo = $objgrupo->id;
                    $objgrupogpx->save();
                    $i++;
                }
            }
        } catch (Exception $e) {
            
        }
        return redirect('grupodispositivo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row=Perfil::find($id);
        return view('master.perfil.show', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupodispositivo = GrupoDispositivo::find($id);
        $grupogpx = GrupoDispositivoGpx::where(["id_grupo_dispositivo" => $id])
            ->whereRaw("deleted_at IS NULL")
            ->orderBy("id", "DESC")
            ->get();
        $dispositivos = Dispositivo::where(["id_grupo" => $id])->whereRaw("deleted_at IS NULL")->get();
        $urlGpx = URL::to('/gpx');
        foreach ($grupogpx as $key2 => $value2) {
            $value2->url = $urlGpx."/_".$id."/".$value2->url;
            $grupogpx[$key2] = $value2;
        }
        $data = [];
        foreach ($grupogpx as $key => $value) {
            $data[$value->id] = $value;
        }

        $datadispositivo = [];
        foreach ($dispositivos as $key => $value) {
            $datadispositivo[$value->id] = $value;
        }

        //dd($grupogpx);
        return view('master.grupodispositivo.edit', ["grupo" => $grupodispositivo, "grupogpx" => $data, "dispositivos" => $datadispositivo]);
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
        
        //dd($request["dispositivo"]);
        //dd($request["jsongrupogpx"]);
        $grupodispositivo = GrupoDispositivo::find($id);
        $grupodatagpx = GrupoDispositivoGpx::where(["id_grupo_dispositivo" => $id])
            ->whereRaw("deleted_at IS NULL")
            ->orderBy("id", "DESC")
            ->get();
        $dispositivos = Dispositivo::where(["id_grupo" => $id])->whereRaw("deleted_at IS NULL")->get();
        $urlGpx = URL::to('/gpx');
        foreach ($grupodatagpx as $key2 => $value2) {
            $value2->url = $urlGpx."/_".$id."/".$value2->url;
            $grupodatagpx[$key2] = $value2;
        }
        $data = [];
        foreach ($grupodatagpx as $key => $value) {
            $data[$value->id] = $value;
        }

        $datadispositivo = [];
        foreach ($dispositivos as $key => $value) {
            $datadispositivo[$value->id] = $value;
        }

        /*
        *
        */
        $objgrupo = GrupoDispositivo::find($id);
        $grupo = $request["grupo"];

        $objgrupo->nombre = $grupo["nombre"];
        $objgrupo->descripcion = $grupo["descripcion"];
        $objgrupo->estado = $grupo["estado"];

        try {
            $objgrupo->save();
            if (isset($request["dispositivo"]["codigo"])) {
                $codigos = $request["dispositivo"]["codigo"];
                foreach ($codigos as $key => $value) {
                    if ($value == "") {
                        unset($codigos[$key]);
                    }
                }
                $descripcion = $request["dispositivo"]["descripcion"];
                $estado = $request["dispositivo"]["estado"];

                foreach ($codigos as $key => $value) {
                    $existedispositivo = Dispositivo::where("codigo", "=", $value)
                        ->whereRaw("deleted_at IS NULL")
                        ->first();
                    if (!is_null($existedispositivo)) {
                        $errors = ["Codigo ".$value." para Dispositivo ya Existe"];
                        return view(
                            'master.grupodispositivo.edit',
                            ["grupo" => $grupodispositivo,
                                "grupogpx" => $data,
                                "dispositivos" => $datadispositivo,
                                "errors" => $errors]
                        );
                    }
                    $objdispositivo = new Dispositivo;
                    $objdispositivo->id_grupo = $id;
                    $objdispositivo->codigo = $value;
                    if (isset($descripcion[$key])) {
                        $objdispositivo->descripcion = $descripcion[$key];
                    }
                    if (isset($estado[$key])) {
                        $objdispositivo->estado = $estado[$key];
                    }
                    try {
                        $objdispositivo->save();
                    } catch (Exception $e) {
                        $errors = ["Codigo ya Existe"];
                            return view(
                                'master.grupodispositivo.edit',
                                ["grupo" => $grupodispositivo,
                                "grupogpx" => $data,
                                "dispositivos" => $datadispositivo,
                                "errors" => $errors]
                            );
                    }
                }
            }

            if (isset($request["jsondispositivo"])) {
                $jsondispositivo = json_decode($request["jsondispositivo"], true);
                $dispositivo = Dispositivo::where(["id_grupo" => $id])
                    ->whereRaw("deleted_at IS NULL")
                    ->orderBy("id", "DESC")
                    ->get();
                foreach ($dispositivo as $key2 => $value2) {
                    $dispositivo[$key2] = $value2;
                }
                $data = [];
                foreach ($dispositivo as $key => $value) {
                    $data[$value->id] = $value;
                }

                foreach ($data as $key => $value) {
                    if (isset($jsondispositivo[$key])) {
                        $update["estado"] = $jsondispositivo[$key]["estado"];
                        $objdispositivo = Dispositivo::find($key);
                        $objdispositivo->estado = $update["estado"];
                        $objdispositivo->save();
                        //dd($data[$key]);
                        
                    }
                }
            }

            if (isset($request["jsongrupogpx"])) {
                $jsongrupogpx = json_decode($request["jsongrupogpx"], true);
                //dd($request["jsongrupogpx"]);
                $grupogpx = GrupoDispositivoGpx::where(["id_grupo_dispositivo" => $id])
                    ->whereRaw("deleted_at IS NULL")
                    ->orderBy("id", "DESC")
                    ->get();
                $urlGpx = URL::to('/gpx');
                foreach ($grupogpx as $key2 => $value2) {
                    $value2->url = $urlGpx."/_".$id."/".$value2->url;
                    $grupogpx[$key2] = $value2;
                }
                $data = [];
                foreach ($grupogpx as $key => $value) {
                    $data[$value->id] = $value;
                }
                
                foreach ($data as $key => $value) {
                    if (isset($jsongrupogpx[$key])) {
                        $update["color"] = $jsongrupogpx[$key]["color"];
                        $update["estado"] = $jsongrupogpx[$key]["estado"];
                        $objgpx = GrupoDispositivoGpx::find($key);
                        //dd($update);
                        $objgpx->estado = $update["estado"];
                        $objgpx->color = $update["color"];
                        $objgpx->save();
                        //$objgpx->update($update);
                    }
                }
            }
            if ($request->file()) {
                $gpxs = $request->file("archivogpx");
                $colores = $request["colorgpx"];
                $i = 0;
                foreach ($gpxs as $key => $value) {
                    $url = (time() + $i). '.' .$value->getClientOriginalExtension();

                    $path = base_path() . "/public/gpx/_".$objgrupo->id;
                    if (!file_exists($path)) {
                        File::makeDirectory($path, 0777, true, true);
                    }
                    $value->move($path."/", $url);
                    $objgrupogpx = new GrupoDispositivoGpx;
                    $objgrupogpx->url = $url;
                    $objgrupogpx->color = $colores[$i];
                    $objgrupogpx->id_grupo_dispositivo = $objgrupo->id;
                    $objgrupogpx->save();
                    $i++;
                }
            }

        } catch (Exception $e) {
            
        }

        return redirect('grupodispositivo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GrupoDispositivo::find($id)->delete();
        return redirect('grupodispositivo');
    }
}
