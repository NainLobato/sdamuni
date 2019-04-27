<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ArqueoCaja extends Model
{
    use SoftDeletes;

    protected $table = 'manuales_administrativos';

    protected $fillable = [
        'id', 
        'relacion_id',
        'saldo_efectivo',
        'total_billetes',
        'total_monedas',
        'total_documentos',
        'total',
        'diferencia',
        'created_at',
        'update_at',
        'delete_at',
    ];

    public function relacion()
    {
        return $this->belongsTo('App\Models\Relacion','relacion_id','id');
    }

}
