<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Requests\UserPerfilRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Sede;
use App\Perfil;
use App\UserPerfil;
use App\UserSede;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
//use Laracasts\Flash\FlashServiceProvider as  Flash;

class UserController extends Controller
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
            $rows = User::select(['id', 'name','email', 'created_at'])->where("id", "!=", Auth::user()->id);
            return Datatables::of($rows)
                ->addColumn('action', function ($data) {
                    return Helper::actionDatatable('user', [$data->id => $data->name], ["update", "delete"]);
                })
                ->make(true);
        }

        return view('master.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sedes = [];

        foreach (Sede::where("estado", "=",1)->get() as $key => $value) {
            $sedes[$value->id] = $value->nombre;
        }

        $perfiles = [];

        foreach (Perfil::where("estado", "=",1)->get() as $key => $value) {
            $perfiles[$value->id] = $value->nombre;
        }
        $user = new User;
        return view('master.user.create', ["user" => $user, "sedes" => $sedes, "perfiles" => $perfiles, "sedesseleccionados" => []]);
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
        $user = $row['user'];
        $perfil = $row['perfil'];
        $sedes = [];

        foreach (Sede::where("estado", "=", 1)->get() as $key => $value) {
            $sedes[$value->id] = $value->nombre;
        }

        $perfiles = [];
        $perfiles[""] = "Seleccionar";

        foreach (Perfil::where("estado", "=", 1)->get() as $key => $value) {
            $perfiles[$value->id] = $value->nombre;
        }

        try {
            \DB::beginTransaction();
            //$perfilData = (array) json_decode($perfil['data']);
            $validator = \Validator::make($user, User::rules());
            if ($validator->fails()) {
                //$row = (object) [ 'id' => '', 'name' => '', 'email' => ''];
                $user["idperfil"] = $perfil["id"];
                $user["idsede"] = $sede["id"];
                return view('master.user.create', ["user" => $user, "sedes" => $sedes, "perfiles" => $perfiles])
                    ->withErrors($validator);
            }
            $user['password'] = bcrypt($user['password']);
            $user['confirmation'] = bcrypt($user['password_confirmation']);

            $oUsers = User::create($user);

            $userPerfil = new UserPerfil;
            $userPerfil->id_users = $oUsers->id;
            $userPerfil->id_perfil = $perfil["id"];
            $userPerfil->save();

            foreach ($row["sedes"] as $key => $value) {
                $userSede = new UserSede;
                $userSede->id_users = $oUsers->id;
                $userSede->id_sede= $value;
                $userSede->save();
            }
            
            // CREATE: users_perfil
            /*foreach($perfilData as $val) {
                UserPerfil::create([
                    'id_users' => $oUsers->id,
                    'id_perfil' => $val->id,
                ]);
            } */

            \DB::commit();
        } catch (Exception $ex) {
            \DB::rollback();
            print_r($ex);
            exit;
        }

        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = User::find($id);
        return view('master.user.show', ["user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        //$row = User::with('perfils')->find($id);
        $sedes = [];

        foreach (Sede::where("estado", "=",1)->get() as $key => $value) {
            $sedes[$value->id] = $value->nombre;
        }

        $perfiles = [];
        $perfiles[""] = "Seleccionar";

        foreach (Perfil::where("estado", "=",1)->get() as $key => $value) {
            $perfiles[$value->id] = $value->nombre;
        }
        $user = User::find($id);
        $userpefil = UserPerfil::where("id_users", "=", $id)->first();
        //dd($userpefil);
        if (!is_null($userpefil)){
            $user["idperfil"] = $userpefil->id_perfil;
        }
        
        $usersede = UserSede::where("id_users", "=", $id)->get();
        $sedesseleecionados = [];
        if(!is_null($usersede)) {
           foreach ($usersede as $key => $value) {
              $sedesseleecionados[$value->id_sede] = $value->id_sede; 
           }
           
        }

        return view('master.user.edit', ["user" => $user, "sedes" => $sedes, "perfiles" => $perfiles, "sedesseleccionados" => $sedesseleecionados]);
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
        $user = $updated['user'];
        $perfil = $updated['perfil'];


        $sedes = [];

        foreach (Sede::where("estado", "=",1)->get() as $key => $value) {
            $sedes[$value->id] = $value->nombre;
        }

        $perfiles = [];
        $perfiles[""] = "Seleccionar";

        foreach (Perfil::where("estado", "=",1)->get() as $key => $value) {
            $perfiles[$value->id] = $value->nombre;
        }
        
        try {
            \DB::beginTransaction();
            //dd($request->all());
            // $perfilData = (array) json_decode($perfil['data']);
            if (isset($user['password']) && strlen($user['password']) > 0) {
                $user['password'] = bcrypt($user['password']);
            } else {
                unset($user['password']);
            }

            /*$validator = \Validator::make($user, User::rules());
            if ($validator->fails()) {
                    //$row = (object) [ 'id' => '', 'name' => '', 'email' => ''];
                $user["id"] = $id;
                $user["idperfil"] = $perfil["id"];
                $user["idsede"] = $sede["id"];
                return view('master.user.edit', ["user" => $user, "sedes" => $sedes, "perfiles" => $perfiles])
                        ->withErrors($validator);
            } */

            $row=User::find($id);
            $oUsers = $row->update($user);

            // DELETE: users_perfil
            $dUsers = UserPerfil::where('id_users', $id)->delete();
            UserPerfil::create([
                    'id_users' => $id,
                    'id_perfil' => $perfil["id"],
            ]);

            $dUsers = UserSede::where('id_users', $id)->delete();
            foreach ($updated["sedes"] as $key => $value) {
                UserSede::create([
                        'id_users' => $id,
                        'id_sede' => $value,
                ]);
            }

            \DB::commit();
        } catch (Exception $ex) {
            \DB::rollback();
            print_r($ex);
            exit;
        }


        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('user');
    }

    public static function editarDatos(Request $request)
    {
        $user = Auth::user();
    
        $user->name = $request->nombre;

        if ( ! $request->contrasena == '')
        {
            $user->password = bcrypt($request->contrasena);
        }

        $user->save();

        //Flash::message('Tu cuenta ha sido actualizada');
        return Redirect::to('/');

    }

}