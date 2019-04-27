<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistroConciliacion extends Model
{
    use SoftDeletes;

    protected $table = 'registros_conciliaciones';

    protected $fillable = [
       
        'id',
        'conciliacion_id',
        'tipo', //1- DEPOSITOS NO CONSIDERADOS  2-CHEQUES EXPEDIDOS Y NO COBRADOS   3-CARGOS BANCARIOS NO CONSIDERADOS 4- DEPOSITOS NO CONSIDERADOS POR EL BANCO 
        'fecha',
        'concepto', 
        'referencia', 
        'importe',
        'created_at',
        'update_at',
        'delete_at',
    ];

    public function conciliacion()
    {
        return $this->belongsTo('App\Models\Conciliacion','conciliacion_id','id');
    }
}
