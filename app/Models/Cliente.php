<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'Cliente';
    protected $primaryKey = 'Id_cliente';
    public $timestamps = false;

    protected $fillable = [
        'Id_usuario',
        'Direccion'
    ];
}
