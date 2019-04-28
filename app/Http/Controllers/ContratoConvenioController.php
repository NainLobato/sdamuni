<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContratoConvenio;
use App\Models\Relacion;

class ContratoConvenioController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $relacion = new Relacion();
            $relacion->formato_id = $request->formato_id;
            $relacion->ayuntamiento_id = $request->ayuntamiento_id;
            $relacion->empleado_integra_id = $request->empleado_integra_id;
            $relacion->empleado_entrega_id = $request->empleado_entrega_id;
            $relacion->empleado_recibe_id = $request->empleado_recibe_id;
            $relacion->fecha_actualizacion = $request->fecha_actualizacion;
            $relacion->save();

            foreach($request->contratos as $registro){
               $contrato = new ContratoConvenio();
               $contrato->relacion_id = $relacion->id;
               $contrato->denominaciones = $registro->denominaciones;
               $contrato->fecha_subscripcion = $registro->fecha_subscripcion;
               $contrato->periodo_inicio = $registro->periodo_inicio;
               $contrato->periodo_final = $registro->periodo_final;
               $contrato->importe = $registro->importe;
               $contrato->observaciones = $registro->observaciones;
               $contrato->save();
            }

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
        
    }

   
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {

            $relacion = Relacion::find($request->idRelacion);
            $relacion->formato_id = $request->formato_id;
            $relacion->ayuntamiento_id = $request->ayuntamiento_id;
            $relacion->empleado_integra_id = $request->empleado_integra_id;
            $relacion->empleado_entrega_id = $request->empleado_entrega_id;
            $relacion->empleado_recibe_id = $request->empleado_recibe_id;
            $relacion->fecha_actualizacion = $request->fecha_actualizacion;
            $relacion->save();

            foreach($request->contratos as $registro){
               $contrato = ContratoConvenio::where('relacion_id',$relacion->id)->get()->first();
               $contrato->denominaciones = $registro->denominaciones;
               $contrato->fecha_subscripcion = $registro->fecha_subscripcion;
               $contrato->periodo_inicio = $registro->periodo_inicio;
               $contrato->periodo_final = $registro->periodo_final;
               $contrato->importe = $registro->importe;
               $contrato->observaciones = $registro->observaciones;
               $contrato->save();
            }

            DB::commit();
            return response()->json(['response'=>'success','status'=>1],200);
        }catch(Exception $e){
            DB::rollback();
            return response()->json(['response'=>'success','status'=>3,'error'=>$e],200);
        }
        return response()->json(['response'=>'success','status'=>2],200);
    }

    
    public function destroy($id)
    {
        DB::beginTransaction();
        try {   
            $contratos = ContratoConvenio::where('relacion_id',$id)->get();
            foreach($contratos as $contrato){
                $contrato->delete();
            }      
               
            $relacion = Relacion::find($id);
            $relacion->delete();
           
            DB::commit();
            return response()->json(['response'=>'success','status'=>1],200);
        }catch(Exception $e){
            DB::rollback();
            return response()->json(['response'=>'success','status'=>3,'error'=>$e],200);
        }
        return response()->json(['response'=>'success','status'=>2],200);
    }
}