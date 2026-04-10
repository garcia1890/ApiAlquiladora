<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'Usuario';
    protected $primaryKey = 'Id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Apellido_Pa',
        'Apellido_Ma',
        'Correo',
        'Telefono',
        'Contrasena',
        'Id_rol'
    ];
}
