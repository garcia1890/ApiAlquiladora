<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    protected $table = 'rentas';

    protected $fillable = [
        'estado',
        'fecha_inicio',
        'fecha_fin',
        'total',
        'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleRenta::class, 'renta_id');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'renta_id');
    }

    public function entrega()
    {
        return $this->hasOne(Entrega::class, 'renta_id');
    }
}
