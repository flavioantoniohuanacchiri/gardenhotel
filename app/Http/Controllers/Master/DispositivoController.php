<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Perfil;
use App\PerfilModulo;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

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
            $rows = Perfil::select(['id', 'nombre',DB::raw("CASE estado
                WHEN 0 THEN 'Desactivado'
                WHEN 1 THEN 'Activo'
                ELSE NULL
                END as 'estado'"), 'created_at', 'updated_at']);
            return Datatables::of($rows)
                ->addColumn('action', function ($data) {
                    return Helper::actionDatatable('perfil', [$data->id => $data->nombre], ["update"]);
                })
                ->make(true);
        }

        return view('master.perfil.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.perfil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Perfil;
        $row= $request->all();//print_r($row);exit;

        //$perfil = $row['perfil'];
        $modulo = $row['modulo'];

        try {
            \DB::beginTransaction();
            $moduloData = (array) json_decode($modulo['data']);

            $validator = \Validator::make($row, $model->rules());
            if ($validator->fails()) {
                return view('master.perfil.create')
                    ->withErrors($validator);
            }
            $oRow = Perfil::create($row);

            // CREATE: perfil_modulo
            foreach($moduloData as $val) {
                PerfilModulo::create([
                    'id_perfil' => $oRow->id,
                    'id_modulo' => $val->id,
                ]);
            }

            \DB::commit();
        } catch (Exception $ex) {
            \DB::rollback();
            print_r($ex);
            exit;
        }

        return redirect('perfil');
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
        $row=Perfil::with('modulos')->find($id);
        return view('master.perfil.edit',compact('row'));
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
        $updated=$request->all();
        //$user = $updated['user'];
        $modulo = $updated['modulo'];
        
        try {
            \DB::beginTransaction();
            $moduloData = (array) json_decode($modulo['data']);

            $row=Perfil::find($id);

            $validator = \Validator::make($updated, $row->rules($id));
            if ($validator->fails()) {
                return view('master.perfil.edit', compact('row'))
                    ->withErrors($validator);
            }
            $oPerfils = $row->update($updated);

            // DELETE: perfil_modulo
            $dPerfils = PerfilModulo::where('id_perfil', $id)->delete();
            // CREATE: perfil_modulo
            foreach($moduloData as $val) {
                PerfilModulo::create([
                    'id_modulo' => $val->id,
                    'id_perfil' => $id,
                ]);
            }

            \DB::commit();
        } catch (Exception $ex) {
            \DB::rollback();
            print_r($ex);
            exit;
        }

        return redirect('perfil');





        $updated=$request->all();
        $row=Perfil::find($id);
        $validator = \Validator::make($updated, $row->rules($id));
        if ($validator->fails()) {
            return view('master.perfil.edit', compact('row'))
                ->withErrors($validator);
        }
        
        $row->update($updated);
        return redirect('perfil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Perfil::find($id)->delete();
        return redirect('perfil');
    }
}