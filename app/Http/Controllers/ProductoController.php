<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        return Producto::all();
    }

    public function store(Request $request)
    {
        return Producto::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->update($request->all());
        return $producto;
    }

    public function destroy($id)
    {
        Producto::destroy($id);
        return response()->json(['message' => 'Eliminado']);
    }
}
