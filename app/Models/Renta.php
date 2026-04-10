<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    protected $table = 'Renta';
    protected $primaryKey = 'Id_renta';
    public $timestamps = false;

    protected $fillable = [
        'Estado',
        'Fecha_inicio',
        'Fecha_fin',
        'Total',
        'Id_cliente'
    ];
}
