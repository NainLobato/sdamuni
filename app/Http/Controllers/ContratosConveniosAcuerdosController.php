<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContratoConvenio;
use App\Models\Relacion;
use Auth;
use DB;

class ContratosConveniosAcuerdosController extends Controller
{
    public function index ()
    {
        $usuario = Auth::user();
        if (isset($usuario->empleado->ayuntamiento_id)) {
            $ayuntamiento = $usuario->empleado->ayuntamiento_id;
        }else {
            return response()->json('No tiene un ayuntamiento asignado, inicia sesion como empleado.', 200);
        }
        $documentos = ContratoConvenio::whereHas('relacion', function ($query) use ($ayuntamiento) {
            $query->where('ayuntamiento_id', $ayuntamiento)
            ->where('formato_id', 9);
        })
        ->get();
        // dd($docs);
        return view('forms.contratos-convenios-acuerdos')
        ->with('documentos', $documentos);
    }

    public function store(Request $request)
    {
        $usuario = Auth::user();
        $relacion = Relacion::where(['formato_id' => 9, 'ayuntamiento_id' => $usuario->empleado->ayuntamiento_id])->first();

        DB::beginTransaction();
        try {
            if (!$relacion) {
                $relacion = new Relacion ();
                $relacion->formato_id = 9;
                $relacion->ayuntamiento_id = $usuario->empleado->ayuntamiento_id;
                $relacion->save();

            } else {
                $relacion->save();
            }

               $contrato = new ContratoConvenio();
               $contrato->relacion_id = $relacion->id;
               $contrato->denominaciones = $request['documento']['denominaciones'];
               $contrato->fecha_subscripcion = $request['documento']['fecha_subscripcion'];
               $contrato->periodo_inicio = $request['documento']['periodo_inicio'];
               $contrato->periodo_final = $request['documento']['periodo_final'];
               $contrato->importe = $request['documento']['importe'];
               $contrato->observaciones = $request['documento']['observaciones'];
               $contrato->save();


            DB::commit();
            return response()->json(['response'=>'success','status'=>1],200);
        }catch(Exception $e){
            DB::rollback();
            return response()->json(['response'=>'success','status'=>3,'error'=>$e],200);
        }
        return response()->json(['response'=>'success','status'=>2],200);
    }


    public function edit($id)
    {
        $contrato = ContratoConvenio::find($id);

        return response()->json(['response'=>'success','status'=>1,'contrato'=>$contrato],200);

    }


    public function update(Request $request)
    {
        DB::beginTransaction();
        try {

               $contrato = ContratoConvenio::find($request['documento']['id']);
               $contrato->denominaciones = $request['documento']['denominaciones'];
               $contrato->fecha_subscripcion = $request['documento']['fecha_subscripcion'];
               $contrato->periodo_inicio = $request['documento']['periodo_inicio'];
               $contrato->periodo_final = $request['documento']['periodo_final'];
               $contrato->importe = $request['documento']['importe'];
               $contrato->observaciones = $request['documento']['observaciones'];
               $contrato->save();


            DB::commit();
            return response()->json(['response'=>'success','status'=>1],200);
        }catch(Exception $e){
            DB::rollback();
            return response()->json(['response'=>'success','status'=>3,'error'=>$e],200);
        }
        return response()->json(['response'=>'success','status'=>2],200);
    }


    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            $contrato = ContratoConvenio::find($request['documento']['id']);
            $contrato->delete();

            DB::commit();
            return response()->json(['response'=>'success','status'=>1],200);
        }catch(Exception $e){
            DB::rollback();
            return response()->json(['response'=>'success','status'=>3,'error'=>$e],200);
        }
        return response()->json(['response'=>'success','status'=>2],200);
    }
}
