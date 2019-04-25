<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatFormato extends Model
{
    use SoftDeletes;
    protected $table = 'cat_formatos';

    protected $fillable = [
        'id', 
        'nombre',
        'created_at',
        'update_at',
        'delete_at',
    ];
}
