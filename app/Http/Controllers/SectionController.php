<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section as SectionModel;
use Illuminate\Support\Facades\Response as Response;

class SectionController extends Controller
{
    public function mostrarSeccion(Request $request) {
      $path_parts = explode('-', $request->path());
      $section = ($path_parts[1] == 'cabecera') ? 'Header' : 'Footer';
      return view('master.web.section-small')->with(['section' => $section]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request){
      //return $request->all();
      SectionModel::updateOrCreate(['section' => $request->section], $request->all());
      return Response::json([
        'mensaje' => 'Se actualizaron los datos con éxito',
        'estado' => 1
      ]);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $section = SectionModel::where('section', $id)->first();
       return $section;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
