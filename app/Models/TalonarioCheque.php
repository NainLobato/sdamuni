<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TalonarioCheque extends Model
{
    use SoftDeletes;

    protected $table = 'talonarios_cheques';

    protected $fillable = [
        'id',
        'relacion_id',
        'banco',
        'num_cuenta',
        'total_primero',
        'total_ultimo',
        'utilizado_primero',
        'utilizado_ultimo',
        'porUtilizar_primero',
        'porUtilizar_ultimo',
        'cancelados',
        'created_at',
        'update_at',
        'delete_at',
    ];

    public function relacion()
    {
        return $this->belongsTo('App\Models\Relacion','relacion_id','id');
    }
}
