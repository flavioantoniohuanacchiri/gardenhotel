<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modulo;
use Yajra\Datatables\Datatables;
use App\Helpers\Helper;

class ModuloController extends Controller
{
        
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
        }
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $padres = Modulo::where("parent", "=", 0)
            ->get();
        if ($request->ajax()) {
            $rows = Modulo::select(['id','nombre','url','parent','visible','estado', 'created_at', 'updated_at']);
            return Datatables::of($rows)
                ->addColumn('action', function ($data) {
                    return Helper::actionDatatable('modulo', [$data->id => $data->nombre]);
                })
                ->make(true);
        }

        return view('master.modulo.index', ["modulos" => $padres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $modulos = [];

        $padres = Modulo::where("parent", "=", 0)
            ->get();

        foreach ($padres as $key => $value) {
            $modulos[$value->id] = $value->nombre;
        }
        return view('master.modulo.create', ["modulos" => $modulos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row= $request->all();
        Modulo::create($row);
        return redirect('modulo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row=Modulo::find($id);
        return view('master.modulo.show',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modulos = [];

        $padres = Modulo::where("parent", "=", 0)
            ->get();

        foreach ($padres as $key => $value) {
            $modulos[$value->id] = $value->nombre;
        }
        $row=Modulo::find($id);
        return view('master.modulo.edit',["modulos" => $modulos, "row" => compact('row')]);
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
        
        $row=Modulo::find($id);
        $row->update($updated);
        return redirect('modulo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Modulo::find($id)->delete();
        return redirect('modulo');
    }
}
