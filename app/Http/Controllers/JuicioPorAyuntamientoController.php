<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JuicioPorAyuntamiento;
use App\Models\Relacion;
use App\Models\Empleado;
use DB;
use Auth;
class JuicioPorAyuntamientoController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        if (isset($usuario->empleado->ayuntamiento_id)) {
            $ayuntamiento = $usuario->empleado->ayuntamiento_id;
        }else {
            return response()->json('No tiene un ayuntamiento asignado, inicia sesion como empleado.', 200);
        }
        $juicios = JuicioPorAyuntamiento::whereHas('relacion', function ($query) use ($usuario) {
            $query->where('ayuntamiento_id', $usuario->empleado->ayuntamiento_id);
        })->get();
        // dd($juicios);
        $juicios = collect();
        return view('forms.juicio-por-ayuntamiento')->with('juicios',$juicios);
    }

    public function store(Request $request)
    {
        dd($request);
        $usuario = Auth::user();
        $relacion = Relacion::where(['formato_id' => 7, 'ayuntamiento_id' => $usuario->empleado->ayuntamiento_id])->first();
        DB::beginTransaction();
        try {
            if (!$relacion) {
                $relacion = new Relacion ();
                $relacion->formato_id = 7;
                $relacion->ayuntamiento_id = $usuario->empleado->ayuntamiento_id;
                // $relacion->fecha_actualizacion = $request->juicio['fecha_levanto_acta'];
                $relacion->save();
            }

            // $juicio = JuicioPorAyuntamiento::where(['relacion_id' => $relacion->id, 'num_acta' => $request->juicio['num_acta']])->first();
            // dd($juicio);
            // if ($juicio) {
            //     DB::rollback();
            //     return response()->json(['success' => true, 'estado' => 1],200);//juicio ya existe
            // }
            $juicio = new JuicioPorAyuntamiento ();
            $juicio->tipo = $request->juicio['tipo'];
            $juicio->fecha_inicio = $request->juicio['fecha_inicio'];
            $juicio->instancia = $request->juicio['instancia'];
            $juicio->imputado = $request->juicio['imputado'];
            $juicio->descripcion = $request->juicio['descripcion'];
            $juicio->etapa = $request->juicio['etapa'];
            $juicio->acciones = $request->juicio['acciones'];
            $juicio->relacion_id = $relacion->id;
            $juicio->save();
            // dd($juicio);

            DB::commit();
            return response()->json(['success' => true, 'estado' => 2],200);//guardado correctamente

        } catch (\PDOException $e) {
            DB::rollback();
            return response()->json(['success' => true, 'estado' => 0, 'error' => $e],200);//error
        }

        return response()->json(['success' => true, 'estado' => 0],200);
    }

    public function update(Request $request)
    {
        dd($request);
        $usuario = Auth::user();
        $relacion = Relacion::where(['formato_id' => 7, 'ayuntamiento_id' => $usuario->empleado->ayuntamiento_id])->first();
        DB::beginTransaction();
        try {
            // $relacion->save();
            // $juicio = JuicioPorAyuntamiento::where([['id' , '!=', $request->juicio['id']], 'relacion_id' => $relacion->id, 'num_acta' => $request->juicio['num_acta']])->first();
            // if ($juicio) {
            //     DB::rollback();
            //     return response()->json(['success' => true, 'estado' => 1],200);
            // }
            $juicio = JuicioPorAyuntamiento::find($request->juicio['id']);
            $juicio->tipo = $request->juicio['tipo'];
            $juicio->fecha_inicio = $request->juicio['fecha_inicio'];
            $juicio->instancia = $request->juicio['instancia'];
            $juicio->imputado = $request->juicio['imputado'];
            $juicio->descripcion = $request->juicio['descripcion'];
            $juicio->etapa = $request->juicio['etapa'];
            $juicio->acciones = $request->juicio['acciones'];
            $juicio->relacion_id = $relacion->id;
            $juicio->save();

            DB::commit();
            return response()->json(['success' => true, 'estado' => 2],200);

        } catch (\PDOException $th) {
            DB::rollback();
            return response()->json(['success' => true, 'estado' => 3, 'error' => $th],200);
        }

        return response()->json(['success' => true, 'estado' => 4],200);
    }

    public function delete(Request $request)
    {
        dd($request);
        $usuario = Auth::user();
        $juicio = JuicioPorAyuntamiento::whereHas('relacion', function ($query) use ($usuario) {
            $query->where('ayuntamiento_id', $usuario->empleado->ayuntamiento_id);
        })->where('id',$request->idJuicio)->first();
        if ($juicio) {
            try {
                $juicio->delete();
                return response()->json(['success' => true, 'estado' => 1],200);
            } catch (\PDOException $th) {
                return response()->json(['success' => true, 'estado' => 2, 'error' => $th],200);
            }
        } else {
            return response()->json(['success' => true, 'estado' => 3],200);
        }
    }

    public function show($id)
    {
        dd($id);
        return 0;
    }
}
