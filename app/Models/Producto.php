<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Impuesto;

class Producto extends Model
{
    use HasFactory;

    protected $table= 'producto';
    protected $fillable=[
        'nombre',
        'precio',
        'impuesto_id',
        'status'
    ];

    public function obtenerImpuesto(){
        return $this->belongsTo(Impuesto::class , 'impuesto_id');
    }
}
