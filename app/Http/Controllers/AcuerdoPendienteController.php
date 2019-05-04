<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relacion;
use App\Models\AcuerdoPendiente;
use Auth;
use DB;
use App\User;
class AcuerdoPendienteController extends Controller
{
    public function index ()
    {
        $usuario = Auth::user();

        $empleados = User::whereHas('empleado', function ($query) use ($usuario){
            $query->where('ayuntamiento_id',  $usuario->empleado->ayuntamiento_id);
        })->select('nombres as nombre', 'id')->get()->toArray();
        // dd($empleados);
        return view('forms.acuerdos-pendientes')
        ->with('empleados', $empleados);
    }

    public function store (Request $request)
    {
        $usuario = Auth::user();
        $relacion = Relacion::where(['formato_id' => 1, 'ayuntamiento_id' => $usuario->empleado->ayuntamiento_id])->first();
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
}
