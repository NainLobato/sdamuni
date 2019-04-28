<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conciliacion;
use App\Models\RegistroConciliacion;
use App\Models\Relacion;
use Carbon\Carbon;

class ConciliacionBancariaController extends Controller
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

            $conciliacion = new Conciliacion();
            $conciliacion->relacion_id = $relacion->id;
            $conciliacion->cuenta = $request->cuenta;

            $depositos_municipio = 0.0; 
            $cheques_noCobrados = 0.0;
            $cargos_noConsiderados = 0.0;
            $depositos_banco = 0.0;
         
            foreach($request->registrosConciliacion as $registro){

                $registroConciliacion = new RegistroConciliacion();
                $registroConciliacion->conciliacion_id = $conciliacion->id;
                $registroConciliacion->tipo = $registro->tipo;
                $registroConciliacion->fecha =  $registro->fecha;
                $registroConciliacion->concepto = $registro->concepto;
                $registroConciliacion->referencia  = $registro->referencia;
                $registroConciliacion->importe = $registro->importe;
                $registroConciliacion->save();

                switch($registro->tipo){
                    case 1:
                    $depositos_municipio  = $registroConciliacion->importe + $depositos_municipio;
                    case 2:            
                    $cheques_noCobrados = $registroConciliacion->importe + $cheques_noCobrados;
                    case 3:
                    $cargos_noConsiderados = $registroConciliacion->importe +  $cargos_noConsiderados;
                    case 4:
                    $depositos_banco = $registroConciliacion->importe + $depositos_banco;
                }     

            }

            $conciliacion->depositos_municipio =  $depositos_municipio;
            $conciliacion->cheques_noCobrados = $cheques_noCobrados;
            $conciliacion->cargos_noConsiderados = $cargos_noConsiderados;
            $conciliacion->depositos_banco = $depositos_banco;
            $conciliacion->fecha_actualizacion = Carbon::now();
            $conciliacion->saldo_actualizado = $depositos_municipio + $cheques_noCobrados + $cargos_noConsiderados + $depositos_banco; 
            $conciliacion->save();     

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

            $conciliacion = Conciliacion::where('relacion_id',$relacion->id)->get()->first();
            $conciliacion->cuenta = $request->cuenta;

            $depositos_municipio = 0.0; 
            $cheques_noCobrados = 0.0;
            $cargos_noConsiderados = 0.0;
            $depositos_banco = 0.0;

            $registrosConciliacion = RegistroConciliacion::where('conciliacion_id',$conciliacion->id)->get();
         
            foreach($registrosConciliacion as $registro){

                $registroConciliacion = RegistroConciliacion::find($registro->id);
                $registroConciliacion->tipo = $registro->tipo;
                $registroConciliacion->fecha =  $registro->fecha;
                $registroConciliacion->concepto = $registro->concepto;
                $registroConciliacion->referencia  = $registro->referencia;
                $registroConciliacion->importe = $registro->importe;
                $registroConciliacion->save();

                switch($registro->tipo){
                    case 1:
                    $depositos_municipio  = $registroConciliacion->importe + $depositos_municipio;
                    case 2:            
                    $cheques_noCobrados = $registroConciliacion->importe + $cheques_noCobrados;
                    case 3:
                    $cargos_noConsiderados = $registroConciliacion->importe +  $cargos_noConsiderados;
                    case 4:
                    $depositos_banco = $registroConciliacion->importe + $depositos_banco;
                }     

            }

            $conciliacion->depositos_municipio =  $depositos_municipio;
            $conciliacion->cheques_noCobrados = $cheques_noCobrados;
            $conciliacion->cargos_noConsiderados = $cargos_noConsiderados;
            $conciliacion->depositos_banco = $depositos_banco;
            $conciliacion->fecha_actualizacion = Carbon::now();
            $conciliacion->saldo_actualizado = $depositos_municipio + $cheques_noCobrados + $cargos_noConsiderados + $depositos_banco; 
            $conciliacion->save();     
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
            $conciliacion = Conciliacion::where('relacion_id',$id)->first();
            $registrosConciliacion = RegistroConciliacion::where('conciliacion_id',$conciliacion->id)->get();
            foreach($registrosConciliacion as $registro){
                $registro->delete();
            }
            $conciliacion->delete();

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
