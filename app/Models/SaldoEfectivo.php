<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaldoEfectivo extends Model
{
    use SoftDeletes;

    protected $table = 'saldos_efectivo';

    protected $fillable = [
        'id',
        'valor_id',
        'tipo',   //1- Moneda  2-Billete  3-Documento
        'cantidad',
        'descripcion',
        'total',
        'created_at',
        'update_at',
        'delete_at',
    ];

    public function valor()
    {
        return $this->belongsTo('App\Models\CatValorEfectivo','valor_id','id');
    }
}
