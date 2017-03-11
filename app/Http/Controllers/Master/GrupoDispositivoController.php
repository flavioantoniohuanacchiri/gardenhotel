<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GrupoDispositivo;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

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
        $grupodispositivo = new GrupoDispositivo;
        return view('master.grupodispositivo.create', ["grupo" => $grupodispositivo]);
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