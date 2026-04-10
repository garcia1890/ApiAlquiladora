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
        return Renta::create($request->all());
    }

    public function show($id)
    {
        return Renta::find($id);
    }
}
