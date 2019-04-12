<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\CatCargo;
use App\User;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index')->with('empleados', $empleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = CatCargo::select('id', 'nombre')->pluck('nombre', 'id');
        return view('empleados.create')
            ->with('cargos', $cargos);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(User::where('correo', '=', $request->correo)->count() > 0){
            return 1;
        }
        if($request->password != $request->password2){
            return 2;
        }
        DB::beginTransaction();
        try{
            $user = new User();
            $user->nombre = $request->nombre;
            $user->primer_ap = $request->primer_ap;
            $user->segundo_ap = $request->segundo_ap;
            $user->nivel = User::EMPLEADO;
            $user->correo = $request->correo;
            $user->password = bcrypt($request->password);
            $user->save();

            $empleado = new Empleado();
            $empleado->user_id = $user->id;
            $empleado->ayuntamiento_id = $request->ayuntamiento_id;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::findOrFail($id)->get();
        return view('empleados.show')
            ->with('empleado', $empleado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id)->get();
        return view('empleados.edit')
            ->with('empleado', $empleado);
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
