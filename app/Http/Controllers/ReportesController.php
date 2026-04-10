<?php

namespace App\Http\Controllers;

use App\Models\User;  // ← este es tu modelo real
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    public function usuariosPDF()
    {
        $usuarios = DB::table('cliente')->get();   // ← sin modelo

       $pdf = Pdf::loadView('cpanel.reportes.pdf', compact('usuarios'));
        return $pdf->stream('usuarios.pdf');
    }
}

