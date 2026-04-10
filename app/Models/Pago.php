<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';

    protected $fillable = [
        'monto',
        'metodo_pago',
        'fecha_pago',
        'renta_id'
    ];

    public function renta()
    {
        return $this->belongsTo(Renta::class, 'renta_id');
    }
}
