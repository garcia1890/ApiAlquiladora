<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Entrega extends Model
{
    protected $table = 'Entrega';
    protected $primaryKey = 'Id_entrega';
    public $timestamps = false;

    protected $fillable = [
        'Fecha_entregado',
        'Fecha_recogida',
        'Direccion_entrega',
        'Id_renta',
        'Id_empleado'
    ];

    public function renta()
    {
        return $this->belongsTo(Renta::class, 'Id_renta');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'Id_empleado');
    }
}
