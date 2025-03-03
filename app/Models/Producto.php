<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'cantidad',
        'estado',
        'id_vendedor'
    ];

    protected $casts = [
        'estado' => 'boolean',
    ];

    public function vendedor()
    {
        return $this->belongsTo(Usuario::class, 'id_vendedor');
    }

    public function transacciones()
    {
        return $this->hasMany(Transaccion::class, 'id_producto');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_producto', 'id_producto', 'id_categoria');
    }
}
