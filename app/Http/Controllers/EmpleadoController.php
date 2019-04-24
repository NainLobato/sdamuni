<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\CatCargo;
use App\User;
use DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = User::with('empleado')->has('empleado')->get();
        //dd($empleados);
        $cargos = CatCargo::select('id', 'cargo')->get();//->toArray();
        //dd($cargos);
        return view('forms.empleados')->with('empleados', $empleados)->with('cargos', $cargos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(User::where('email', '=', $request->usuario['email'])->count() > 0){
            return 1;
        }
        /* if($request->password != $request->password2){
            return 2;
        } */
        $emp = $request->usuario;
        //dd($emp['empleado']['cargo']['id']);
        DB::beginTransaction();
        try{
            $user = new User();
            $user->nombre = $emp['nombres'];
            $user->primer_ap = $emp['primer_ap'];
            $user->segundo_ap = $emp['segundo_ap'];
            $user->nivel = User::EMPLEADO;
            $user->email = $emp['email'];
            $user->password = bcrypt($emp['password']);
            $user->save();

            $empleado = new Empleado();
            $empleado->user_id = $user->id;
            $empleado->ayuntamiento_id = 1;//$emp['empleado']['ayuntamiento_id'];
            $empleado->cargo_id = $emp['empleado']['cargo']['id'];
            $empleado->sexo = $emp['empleado']['sexo'];
            $empleado->fism = ($emp['empleado']['fism'] == "") ? 0 : 1;
            $empleado->profesion = $emp['empleado']['profesion'];
            $empleado->profesion_abrev = $emp['empleado']['abrev'];
            $empleado->fecha_inicio_funciones = $emp['empleado']['inicioFun'];
            $empleado->telefono = $emp['empleado']['telefono'];
            $empleado->status = 1;
            $empleado->save();
            DB::commit();
            return 3;
        }catch(Exception $e){
            DB::rollBack();
            return 0;
        }
    }

    public function get(Request $request){
        $empleado = User::with('empleado.cargo')->has('empleado')->where('id', $request->idEmpleado)->first();
        return response()->json($empleado, 200);
        dd($empleado);
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
        if(User::where('correo', '=', $request->correo)->where('id', '!=', $id)->count() > 0){
            return 1;
        }
        if($request->password != $request->password2){
            return 2;
        }
        DB::beginTransaction();
        try{
            $empleado = Empleado::findOrFail($id)->get();
            $user = User::findOrFail($empleado->user_id)->get();
            $user->nombre = $request->nombre;
            $user->primer_ap = $request->primer_ap;
            $user->segundo_ap = $request->segundo_ap;
            $user->correo = $request->correo;
            $user->password = bcrypt($request->password);
            $user->save();

            $empleado->cargo_id = $request->cargo_id;
            $empleado->sexo = $request->sexo;
            $empleado->fism = $request->fism;
            $empleado->profesion = $request->profesion;
            $empleado->profesion_abrev = $request->profesion_abrev;
            $empleado->fecha_inicio_funciones = $request->fecha_inicio_funciones;
            $empleado->telefono = $request->telefono;
            $empleado->status = 1;
            $empleado->save();
            DB::commit();
            return 3;
        }catch(Exception $e){
            DB::rollBack();
            return 4;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $empleado = Empleado::findOrFail($id)->get();
            Empleado::destroy($id);
            $user = User::findOrFail($empleado->user_id)->get();
            User::destroy($empleado->user_id);
            DB::commit();
            return 1;
        }catch(Exception $e){
            DB::rollBack();
            return 2;
        }
    }
}
