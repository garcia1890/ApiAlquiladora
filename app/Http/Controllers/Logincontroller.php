<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginProcess(Request $request)
    {
        // Datos del formulario
        $email = $request->email;
        $password = $request->password;

        // Ejemplo simple sin base de datos
        if ($email === "admin@demo.com" && $password === "1234") {
            return redirect()->route('bienvenido');
        }

        return back()->withErrors(['login' => 'Credenciales incorrectas']);
    }

    public function bienvenido()
    {
        return view('cpanel.usuarios.bienvenido');
    }
}
