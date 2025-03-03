<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    use HasFactory;

    protected $table = 'categoria_producto';

    protected $fillable = [
        'id_categoria',
        'id_producto'
    ];

    public $timestamps = false;
}
