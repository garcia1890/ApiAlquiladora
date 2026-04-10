<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $table = 'entregas';

    protected $fillable = [
        'fecha_entregado',
        'fecha_recogida',
        'direccion_entrega',
        'renta_id',
        'empleado_id'
    ];

    public function renta()
    {
        return $this->belongsTo(Renta::class, 'renta_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}
