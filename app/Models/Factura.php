<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table= 'factura';
    protected $fillable=[
        'numero',
        'cliente_id',
        'monto_t',
        'impuesto_t'
    ];

    public function obtenerCliente(){
        return $this->belongsTo(User::class , 'cliente_id');
    }
}
