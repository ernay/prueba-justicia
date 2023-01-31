<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table= 'compra';
    protected $fillable=[
        'cliente_id',
        'producto_id',
        'fecha',
        'facturado',
        'impuesto_co',
        'monto_co'
    ];

    public function obtenerProducto(){
        return $this->belongsTo(Producto::class , 'producto_id');
    }

    public function obtenerCliente(){
        return $this->belongsTo(User::class , 'cliente_id');
    }
}
