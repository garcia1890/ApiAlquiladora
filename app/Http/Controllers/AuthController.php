<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = DB::table('Usuario')
            ->where('Correo', $request->Correo)
            ->first();

        if (!$user || !Hash::check($request->Contrasena, $user->Contrasena)) {
            return response()->json(['error' => 'Credenciales incorrectas'], 401);
        }

        $rol = DB::table('Rol')
            ->where('Id_rol', $user->Id_rol)
            ->value('Nombre');

        return response()->json([
            'usuario' => $user,
            'rol' => $rol
        ]);
    }

    public function register(Request $request)
    {
        $id = DB::table('Usuario')->insertGetId([
            'Nombre' => $request->Nombre,
            'Apellido_Pa' => $request->Apellido_Pa,
            'Apellido_Ma' => $request->Apellido_Ma,
            'Correo' => $request->Correo,
            'Telefono' => $request->Telefono,
            'Contrasena' => Hash::make($request->Contrasena),
            'Id_rol' => $request->Id_rol
        ]);

        return response()->json(['id' => $id]);
    }
}
