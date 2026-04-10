<?php

namespace App\Http\Controllers;

use App\Models\Renta;
use App\Models\Producto;

class ReportesController extends Controller
{
    public function totalRentas()
    {
        return response()->json([
            'total_rentas' => Renta::count()
        ]);
    }

    public function ingresosTotales()
    {
        return response()->json([
            'ingresos' => Renta::sum('total')
        ]);
    }

    public function productos()
    {
        return Producto::all();
    }
}
