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
            $user->nombres = $emp['nombres'];
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = intval($request->usuario['id']);
        if(User::where('email', '=', $request->usuario['email'])->where('id', '!=', $id)->count() > 0){
            return 1;
        }
        /* if($request->password != $request->password2){
            return 2;
        } */
        $emp = $request->usuario;
        DB::beginTransaction();
        try{
            $user = User::findOrFail($id);
            $user->nombres = $emp['nombres'];
            $user->primer_ap = $emp['primer_ap'];
            $user->segundo_ap = $emp['segundo_ap'];
            $user->email = $emp['email'];
            $user->password = bcrypt($emp['password']);
            $user->save();
            
            $empleado = Empleado::where('user_id', $user->id)->first();
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
            return 4;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = intval($request->id);
        //dd($id);
        DB::beginTransaction();
        try{
            $user = User::destroy($id);
            $empleado = Empleado::where('user_id', $id)->delete();
            DB::commit();
            return 1;
        }catch(Exception $e){
            DB::rollBack();
            return 2;
        }
    }
}
