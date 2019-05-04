<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContratoConvenio;
use App\Models\Relacion;

class ContratoConvenioController extends Controller
{
    public function store(Request $request)
    {
        $usuario = Auth::user();
        $relacion = Relacion::where(['formato_id' => 7, 'ayuntamiento_id' => $usuario->empleado->ayuntamiento_id])->first();
         
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
               
               $contrato = new ContratoConvenio();
               $contrato->relacion_id = $relacion;
               $contrato->denominaciones = $request['denominaciones'];
               $contrato->fecha_subscripcion = $request['fecha_subscripcion'];
               $contrato->periodo_inicio = $request['periodo_inicio'];
               $contrato->periodo_final = $request['periodo_final'];
               $contrato->importe = $request['importe'];
               $contrato->observaciones = $request['observaciones'];
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

               $contrato = ContratoConvenio::find($request['id']);
               $contrato->denominaciones = $request['denominaciones'];
               $contrato->fecha_subscripcion = $request['fecha_subscripcion'];
               $contrato->periodo_inicio = $request['periodo_inicio'];
               $contrato->periodo_final = $request['periodo_final'];
               $contrato->importe = $request['importe'];
               $contrato->observaciones = $request['observaciones'];
               $contrato->save();
            

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
            $contratos = ContratoConvenio::find($id);
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