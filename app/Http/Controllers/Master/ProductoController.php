<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Producto;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;

class ProductoController extends Controller
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
        if ($request->ajax()) {
            $rows = Producto::select(['id', 'codigo','nombre','pesobandeja', 'estado', 'created_at', 'updated_at']);
            return Datatables::of($rows)
                ->addColumn('action', function ($data) {
                    return Helper::actionDatatable('producto', [$data->id => $data->nombre]);
                })
                ->make(true);
        }
        
        return view('master.producto.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.producto.create');
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
        $row['userid_created_at'] = Auth::user()->id;
        $row['user_created_at'] = Auth::user()->name;
        
        Producto::create($row);
        return redirect('producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row=Producto::find($id);
        return view('master.producto.show',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row=  Producto::find($id);
        return view('master.producto.edit',compact('row'));
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
        $updated['userid_updated_at'] = Auth::user()->id;
        $updated['user_updated_at'] = Auth::user()->name;

        $row=Producto::find($id);
        $row->update($updated);
        return redirect('producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Producto::find($id);
        $row->userid_deleted_at = Auth::user()->id;
        $row->user_deleted_at = Auth::user()->name;
        $row->save();
        //
        $row->delete();
        return redirect('producto');
    }
}
