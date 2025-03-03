<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'remember_token',
        'verificado',
        'verificacion_token',
        'admin'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'verificado' => 'boolean',
        'verificacion_token' => 'boolean',
        'admin' => 'boolean',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_vendedor');
    }

    public function compras()
    {
        return $this->hasMany(Transaccion::class, 'id_comprador');
    }
}
