<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $fillable = [
        'usuario_id',
        'puesto'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function entregas()
    {
        return $this->hasMany(Entrega::class, 'empleado_id');
    }
}
