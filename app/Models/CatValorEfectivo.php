<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatValorEfectivo extends Model
{
    use SoftDeletes;
    protected $table = 'cat_valor_efectivo';

    protected $fillable = [
        'id', 
        'valor',
        'created_at',
        'update_at',
        'delete_at',
    ];

    public function saldosEfectivos()
    {
        return $this->hasMany('App\Models\SaldoEfectivo','valor_id','id');
    }
}
