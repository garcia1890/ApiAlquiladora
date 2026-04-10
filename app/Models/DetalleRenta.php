<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleRenta extends Model
{
    protected $table = 'detalle_rentas';

    protected $fillable = [
        'cantidad',
        'precio_unitario',
        'renta_id',
        'producto_id'
    ];

    public function renta()
    {
        return $this->belongsTo(Renta::class, 'renta_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
