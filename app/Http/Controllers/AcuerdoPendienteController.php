<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relacion;
use App\Models\AcuerdoPendiente;
use Auth;
use DB;
use App\User;
use App\Models\Empleado;
class AcuerdoPendienteController extends Controller
{
    public function index ()
    {
        $usuario = Auth::user();
        $acuerdos = AcuerdoPendiente::whereHas('relacion', function ($query) use ($usuario) {
            $query->where('ayuntamiento_id', $usuario->empleado->ayuntamiento_id);
        })->with('empleado:id,user_id','empleado.user:id,nombres,primer_ap,segundo_ap')
        ->select('acuerdos_pendientes.*', DB::raw("DATE_FORMAT(acuerdos_pendientes.fecha_acta, '%Y-%m-%d') as fecha_acta"))
        ->get();

        $empleados = Empleado::with(array('user' => function ($query) {
            $query->select('id', DB::raw('CONCAT(nombres," ", primer_ap," ", segundo_ap) as nombre'));
        }))
        ->where('ayuntamiento_id', $usuario->empleado->ayuntamiento_id)
        ->select('id','user_id')
        ->get();
        // dd($empleados, $acuerdos);
        return view('forms.acuerdos-pendientes')
        ->with('empleados', $empleados)
        ->with('acuerdos', $acuerdos);
    }

    public function store (Request $request)
    {
        $usuario = Auth::user();
        $relacion = Relacion::where(['formato_id' => 2, 'ayuntamiento_id' => $usuario->empleado->ayuntamiento_id])->first();
        DB::beginTransaction();
        try {
            if (!$relacion) {
                $relacion = new Relacion ();
                $relacion->formato_id = 2;
                $relacion->ayuntamiento_id = $usuario->empleado->ayuntamiento_id;
                $relacion->save();

            } else {
                $relacion->save();
            }
            $acuerdo = AcuerdoPendiente::where(['relacion_id' => $relacion->id, 'num_acta' => $request['acuerdo']['num_acta']])->first();
            if ($acuerdo) {
                DB::rollback();
                return response()->json(['success' => true, 'estado' => 1],200);
            }
            $acuerdo = new AcuerdoPendiente ();
            $acuerdo->num_acta = $request['acuerdo']['num_acta'];
            $acuerdo->fecha_acta = $request['acuerdo']['fecha_acta'];
            $acuerdo->acuerdo = $request['acuerdo']['acuerdo'];
            $acuerdo->empleado_id = $request['acuerdo']['empleado']['id'];
            $acuerdo->accion_situacion = $request['acuerdo']['accion_situacion'];
            $acuerdo->comentarios = $request['acuerdo']['comentarios'];
            $acuerdo->relacion_id = $relacion->id;
            $acuerdo->save();

            DB::commit();
            return response()->json(['success' => true, 'estado' => 2],200);

        } catch (\PDOException $th) {
            DB::rollback();
            return response()->json(['success' => true, 'estado' => 3, 'error' => $th],200);
        }

        return response()->json(['success' => true, 'estado' => 4],200);
    }

    public function update (Request $request)
    {
        $usuario = Auth::user();
        $relacion = Relacion::where(['formato_id' => 2, 'ayuntamiento_id' => $usuario->empleado->ayuntamiento_id])->first();
        DB::beginTransaction();
        try {
            $relacion->save();
            $acuerdo = AcuerdoPendiente::where([['id' , '!=', $request['acuerdo']['id']], 'relacion_id' => $relacion->id, 'num_acta' => $request['acuerdo']['num_acta']])->first();
            if ($acuerdo) {
                DB::rollback();
                return response()->json(['success' => true, 'estado' => 1],200);
            }
            $acuerdo = AcuerdoPendiente::find($request['acuerdo']['id']);
            $acuerdo->num_acta = $request['acuerdo']['num_acta'];
            $acuerdo->fecha_acta = $request['acuerdo']['fecha_acta'];
            $acuerdo->acuerdo = $request['acuerdo']['acuerdo'];
            $acuerdo->empleado_id = $request['acuerdo']['empleado']['id'];
            $acuerdo->accion_situacion = $request['acuerdo']['accion_situacion'];
            $acuerdo->comentarios = $request['acuerdo']['comentarios'];
            $acuerdo->relacion_id = $relacion->id;
            $acuerdo->save();

            DB::commit();
            return response()->json(['success' => true, 'estado' => 2],200);

        } catch (\PDOException $th) {
            DB::rollback();
            return response()->json(['success' => true, 'estado' => 3, 'error' => $th],200);
        }

        return response()->json(['success' => true, 'estado' => 4],200);
    }

    public function destroy (Request $request)
    {
        $usuario = Auth::user();
        $acuerdo = AcuerdoPendiente::whereHas('relacion', function ($query) use ($usuario) {
            $query->where('ayuntamiento_id', $usuario->empleado->ayuntamiento_id);
        })
        ->first();

        if ($acuerdo) {
            try {
                $acuerdo->delete();
                return response()->json(['success' => true, 'estado' => 1],200);
            } catch (\PDOException $th) {
                return response()->json(['success' => true, 'estado' => 2, 'error' => $th],200);
            }
        } else {
            return response()->json(['success' => true, 'estado' => 3],200);
        }
    }
}
