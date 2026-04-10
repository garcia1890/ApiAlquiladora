<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::all();
    }

    public function store(Request $request)
    {
        return Usuario::create($request->all());
    }

    public function show($id)
    {
        return Usuario::find($id);
    }

    public function update(Request $request, $id)
    {
        $user = Usuario::find($id);
        $user->update($request->all());
        return $user;
    }

    public function destroy($id)
    {
        Usuario::destroy($id);
        return response()->json(['message' => 'Eliminado']);
    }
}
