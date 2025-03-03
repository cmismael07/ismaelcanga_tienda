<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'categoria_producto', 'id_categoria', 'id_producto');
    }
}
