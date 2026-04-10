<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'Producto';
    protected $primaryKey = 'Id_producto';
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Precio',
        'Cantidad_disponible',
        'Categoria'
    ];
}
