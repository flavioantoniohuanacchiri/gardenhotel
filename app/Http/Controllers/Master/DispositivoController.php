<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dispositivo;
use App\DispositivoImagen;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use Image;
use File;

class DispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
            return Datatables::of($rows)
                ->addColumn('action', function ($data) {
                    return Helper::actionDatatable('dispositivo', [$data->id => $data->nombre], ["update", "delete"]);
                })
                ->make(true);
        }

        return view('master.dispositivo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dispositivo = new Dispositivo;
        return view('master.dispositivo.create', ["dispositivo" => $dispositivo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->file());
        $dispositivo = $request["dispositivo"];
        $objdispositivo = new Dispositivo;
        $objdispositivo->codigo =  $dispositivo["codigo"];
        $objdispositivo->descripcion =  $dispositivo["descripcion"];
        $objdispositivo->estado =  $dispositivo["estado"];
        $objdispositivo->save();
        $pathImagenesDispositivo = "imgs/dispositivos/".$dispositivo["codigo"]."/";
        
        if ($request->file())
        {
            if (!file_exists($pathImagenesDispositivo)) {
                File::makeDirectory($pathImagenesDispositivo, $mode = 0775, true, true);
            }
            $image = $request->file('imagen');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path($pathImagenesDispositivo.$filename);
 
            Image::make($image->getRealPath())->resize(16, 16)->save($path);
            $objimagen = new DispositivoImagen;
            $objimagen->id_dispositivo = $objdispositivo->id;
            $objimagen->url = $filename;
            $objimagen->save();
        }

        return redirect('dispositivo');
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
        return view('master.perfil.show',compact('row'));
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
        return view('master.grupodispositivo.edit', ["grupo" => $grupodispositivo]);
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
        $objgrupo = GrupoDispositivo::find($id);
        $grupo = $request["grupo"];

        $objgrupo->nombre = $grupo["nombre"];
        $objgrupo->descripcion = $grupo["descripcion"];
        $objgrupo->estado = $grupo["estado"];

        try {
            $objgrupo->save();
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