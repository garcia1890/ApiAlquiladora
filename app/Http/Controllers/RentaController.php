<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Renta;

class RentaController extends Controller
{
    public function index()
    {
        return Renta::all();
    }

    public function store(Request $request)
    {
        $renta = Renta::create($request->all());
        return response()->json($renta);
    }

    public function show($id)
    {
        return Renta::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $renta = Renta::findOrFail($id);
        $renta->update($request->all());

        return response()->json($renta);
    }

    public function destroy($id)
    {
        Renta::destroy($id);
        return response()->json(['message' => 'Eliminado']);
    }
}
