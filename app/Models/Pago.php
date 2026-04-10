<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'Pago';
    protected $primaryKey = 'Id_pago';
    public $timestamps = false;

    protected $fillable = [
        'Monto',
        'Metodo_pago',
        'Fecha_pago',
        'Id_renta'
    ];

    public function renta()
    {
        return $this->belongsTo(Renta::class, 'Id_renta');
    }
}