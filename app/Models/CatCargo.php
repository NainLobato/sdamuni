<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatCargo extends Model
{ 
    use SoftDeletes;
    protected $table = 'cat_cargos';

    protected $fillable = [
        'id', 
        'cargo',
        'created_at',
        'update_at',
    ];

    public function empleados()
    {
        return $this->hasMany('App\Models\Empleado','cargo_id','id');
    }
}
