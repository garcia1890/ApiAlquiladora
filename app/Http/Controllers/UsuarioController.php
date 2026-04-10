<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'correo' => 'required|email|unique:usuarios',
            'contrasena' => 'required'
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido_pa' => $request->apellido_pa,
            'apellido_ma' => $request->apellido_ma,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'contrasena' => Hash::make($request->contrasena),
            'rol_id' => $request->rol_id
        ]);

        return response()->json($usuario);
    }

    public function show($id)
    {
        return Usuario::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());

        return response()->json($usuario);
    }

    public function destroy($id)
    {
        Usuario::destroy($id);
        return response()->json(['message' => 'Eliminado']);
    }
}
