<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'apellido_pa',
        'apellido_ma',
        'correo',
        'telefono',
        'contrasena',
        'rol_id'
    ];

    protected $hidden = [
        'contrasena'
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'usuario_id');
    }

    public function empleado()
    {
        return $this->hasOne(Empleado::class, 'usuario_id');
    }
}

