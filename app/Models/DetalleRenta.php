<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleRenta extends Model
{
    protected $table = 'Detalle_Renta';
    protected $primaryKey = 'Id_detalle';
    public $timestamps = false;

    protected $fillable = [
        'Cantidad',
        'Precio_unitario',
        'Subtotal',
        'Id_renta',
        'Id_producto'
    ];

    // Relaciones
    public function renta()
    {
        return $this->belongsTo(Renta::class, 'Id_renta');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'Id_producto');
    }
}