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
        $usuario = Auth::user();
        $relacion = Relacion::where(['formato_id' => 9, 'ayuntamiento_id' => $usuario->empleado->ayuntamiento_id])->first();
         
        DB::beginTransaction();
        try {
            if (!$relacion) {
                $relacion = new Relacion ();
                $relacion->formato_id = 1;
                $relacion->ayuntamiento_id = $usuario->empleado->ayuntamiento_id;
                $relacion->save();

            } else {
                $relacion->save();
            }
       

            $conciliacion = Conciliacion::where(['relacion_id' => $relacion->id, 'cuenta' => $request['cuenta']])->first();
         
                if (!$conciliacion) {
                    $conciliacion = new Conciliacion();
                    $conciliacion->relacion_id = $relacion->id;
                    $conciliacion->cuenta = $request['cuenta'];
                    $conciliacion->save();
               
                } else {
                    $conciliacion->save();
                }
                  

                $registroConciliacion = new RegistroConciliacion();
                $registroConciliacion->conciliacion_id = $conciliacion->id;
                $registroConciliacion->tipo = $request['tipo'];
                $registroConciliacion->fecha =  $request['fecha'];
                $registroConciliacion->concepto = $request['concepto'];
                $registroConciliacion->referencia  = $request['referencia'];
                $registroConciliacion->importe = $request['importe'];
                $registroConciliacion->save();

                 switch($registroConciliacion->tipo){
                    case 1:
                    $conciliacion->depositos_municipio  = $registroConciliacion->importe +  $conciliacion->depositos_municipio;
                    $conciliacion->saldo_actualizado =  $conciliacion->saldo_actualizado + $conciliacion->depositos_municipio;

                    case 2:            
                    $conciliacion->cheques_noCobrados = $registroConciliacion->importe + $conciliacion->cheques_noCobrados;
                    $conciliacion->saldo_actualizado =  $conciliacion->saldo_actualizado +  $conciliacion->cheques_noCobrados;

                    case 3:
                    $conciliacion->cargos_noConsiderados = $registroConciliacion->importe +  $conciliacion->cargos_noConsiderados;
                    $conciliacion->saldo_actualizado =  $conciliacion->saldo_actualizado - $registroConciliacion->importe;

                    case 4:
                    $conciliacion->depositos_banco = $registroConciliacion->importe +  $conciliacion->depositos_banco;
                    $conciliacion->saldo_actualizado =  $conciliacion->saldo_actualizado - $registroConciliacion->importe;

                }     

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
        $registroConciliacion = RegistroConciliacion::find($id);
        return response()->json(['response'=>'success','status'=>1,'registroConciliacion'=>$registroConciliacion],200);

        
    }

   
    public function update(Request $request)
    {
        
        DB::beginTransaction();
        try {            

            $registroConciliacion = RegistroConciliacion::find($request['id']);
            $registroConciliacion->tipo = $request['tipo'];
            $registroConciliacion->fecha =  $request['fecha'];
            $registroConciliacion->concepto = $request['concepto'];
            $registroConciliacion->referencia  = $request['referencia'];
            $registroConciliacion->importe = $request['importe'];
            $registroConciliacion->save();

            $conciliacion = Conciliacion::find($conciliacion->id);
        
             switch($registroConciliacion->tipo){
                case 1:
                    $conciliacion->depositos_municipio  = $registroConciliacion->importe +  $conciliacion->depositos_municipio;
                    $conciliacion->saldo_actualizado =  $conciliacion->saldo_actualizado + $conciliacion->depositos_municipio;

                    case 2:            
                    $conciliacion->cheques_noCobrados = $registroConciliacion->importe + $conciliacion->cheques_noCobrados;
                    $conciliacion->saldo_actualizado =  $conciliacion->saldo_actualizado +  $conciliacion->cheques_noCobrados;

                    case 3:
                    $conciliacion->cargos_noConsiderados = $registroConciliacion->importe +  $conciliacion->cargos_noConsiderados;
                    $conciliacion->saldo_actualizado =  $conciliacion->saldo_actualizado - $registroConciliacion->importe;

                    case 4:
                    $conciliacion->depositos_banco = $registroConciliacion->importe +  $conciliacion->depositos_banco;
                    $conciliacion->saldo_actualizado =  $conciliacion->saldo_actualizado - $registroConciliacion->importe;

            }     

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
            $registrosConciliacion = RegistroConciliacion::find($id);
            $conciliacion = Conciliacion::where('id',$registrosConciliacion->conciliacion_id)->first();
           
            switch($registroConciliacion->tipo){
                case 1:
                $conciliacion->depositos_municipio  = $conciliacion->depositos_municipio - $registroConciliacion->importe;
                $conciliacion->saldo_actualizado =  $conciliacion->saldo_actualizado - $registroConciliacion->importe;

                case 2:            
                $conciliacion->cheques_noCobrados = $conciliacion->cheques_noCobrados - $registroConciliacion->importe;
                $conciliacion->saldo_actualizado =  $conciliacion->saldo_actualizado - $registroConciliacion->importe;

                case 3:
                $conciliacion->cargos_noConsiderados = $conciliacion->cargos_noConsiderados - $registroConciliacion->importe;;
                $conciliacion->saldo_actualizado =  $conciliacion->saldo_actualizado + $registroConciliacion->importe;

                case 4:
                $conciliacion->depositos_banco = $conciliacion->depositos_banco - $registroConciliacion->importe; 
                $conciliacion->saldo_actualizado =  $conciliacion->saldo_actualizado + $registroConciliacion->importe;

            }     
            $conciliacion->save();           
            $registroConciliacion->delete();
             
            DB::commit();
            return response()->json(['response'=>'success','status'=>1],200);
        }catch(Exception $e){
            DB::rollback();
            return response()->json(['response'=>'success','status'=>3,'error'=>$e],200);
        }
        return response()->json(['response'=>'success','status'=>2],200);
    }
}
