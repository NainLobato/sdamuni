<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActaConsejoDesarrollo;
use App\Models\Relacion;
use App\Models\Empleado;
use DB;
use Auth;

class ActaConsejoDesarrolloController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        if (isset($usuario->empleado->ayuntamiento_id)) {
            $ayuntamiento = $usuario->empleado->ayuntamiento_id;
        }else {
            return response()->json('No tiene un ayuntamiento asignado, inicia sesion como empleado.', 200);
        }
        $actas = ActaConsejoDesarrollo::whereHas('relacion', function ($query) use ($usuario) {
            $query->where('ayuntamiento_id', $usuario->empleado->ayuntamiento_id);
        })->get();
        // dd($actas);
        return view('forms.actas-consejo-desarrollo')->with('actas',$actas);
    }

    public function store(Request $request)
    {
        $usuario = Auth::user();
        $relacion = Relacion::where(['formato_id' => 6, 'ayuntamiento_id' => $usuario->empleado->ayuntamiento_id])->first();
        DB::beginTransaction();
        try {
            if (!$relacion) {
                $relacion = new Relacion ();
                $relacion->formato_id = 6;
                $relacion->ayuntamiento_id = $usuario->empleado->ayuntamiento_id;
                // $relacion->fecha_actualizacion = $request->acta['fecha_levanto_acta'];
                $relacion->save();
            }

            $acta = ActaConsejoDesarrollo::where(['relacion_id' => $relacion->id, 'num_acta' => $request->acta['num_acta']])->first();
            // dd($acta);
            if ($acta) {
                DB::rollback();
                return response()->json(['success' => true, 'estado' => 1],200);//acta ya existe
            }
            $acta = new ActaConsejoDesarrollo ();
            $acta->num_acta = $request->acta['num_acta'];
            $acta->fecha_levanto_acta = $request->acta['fecha_levanto_acta'];
            $acta->año_acta = $request->acta['ao_acta'];
            $acta->asuntos_acta = $request->acta['asunto_acta'];
            $acta->num_forjas = $request->acta['num_forjas'];
            $acta->firmas_consejo = $request->acta['firmas_consejo'];
            $acta->sellos_validez = $request->acta['sellos_validez'];
            $acta->relacion_id = $relacion->id;
            $acta->save();
            // dd($acta);

            DB::commit();
            return response()->json(['success' => true, 'estado' => 2],200);//guardado correctamente

        } catch (\PDOException $e) {
            dd($e);
            DB::rollback();
            return response()->json(['success' => true, 'estado' => 0],200);//error
        }

        return response()->json(['success' => true, 'estado' => 0],200);
    }

    public function update(Request $request)
    {
        dd($request);
        return 0;
    }

    public function delete(Request $request)
    {
        dd($request);
        return 0;
    }

    public function show($id)
    {
        dd($id);
        return 0;
    }

}
