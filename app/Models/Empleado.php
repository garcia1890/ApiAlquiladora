<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'Empleado';
    protected $primaryKey = 'id_empleado';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido_pa',
        'apellido_ma',
        'puesto',
        'telefono',
        'usuario',
        'contrasena'
    ];

    public function entregas()
    {
        return $this->hasMany(Entrega::class, 'Id_empleado');
    }
}