@extends('cpanel.app') 

@section('title', 'Iniciar Sesión')

@section('content')
<style>
    .login-container {
        max-width: 420px;
        margin: 60px auto;
        background: #ffffff;
        padding: 35px;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        animation: fadeIn 0.7s ease-in-out;
        border-top: 4px solid #444; /* Gris oscuro */
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px);}
        to { opacity: 1; transform: translateY(0);}
    }

    .login-title {
        font-size: 1.7em;
        color: #222; /* Negro suave */
        font-weight: bold;
        margin-bottom: 5px;
        text-align: center;
    }

    .login-subtitle {
        text-align: center;
        font-size: 0.95em;
        margin-bottom: 25px;
        color: #666; /* Gris */
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        font-weight: bold;
        color: #333;
        display: block;
        margin-bottom: 5px;
    }

    input {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #ccc;
        font-size: 1em;
        transition: 0.3s;
        background: #f7f7f7;
    }

    input:focus {
        border-color: #000;
        outline: none;
        box-shadow: 0 0 6px rgba(0,0,0,0.3);
        background: white;
    }

    .login-btn {
        width: 100%;
        padding: 12px;
        background: #000; /* Negro */
        color: white;
        font-size: 1.1em;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s;
        font-weight: bold;
    }

    .login-btn:hover {
        background: #444; /* Gris oscuro */
    }

    .extra-links {
        text-align: center;
        margin-top: 18px;
    }

    .extra-links a {
        text-decoration: none;
        color: #000;
        font-weight: bold;
    }

    .extra-links a:hover {
        text-decoration: underline;
    }
</style>

<div class="login-container">

    <h2 class="login-title">Iniciar Sesión</h2>
    <p class="login-subtitle">Accede al sistema de gestión de renta</p>

    {{-- MENSAJE DE ERROR DEL CONTROLADOR --}}
    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login.process') }}">
        @csrf
        
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input id="telefono" type="text" name="telefono" placeholder="Ej. 2411234567" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="contrasena" placeholder="******" required>
        </div>

        <button type="submit" class="login-btn">Ingresar</button>

        <div class="extra-links">
            <p><a href="#">¿Olvidaste tu contraseña?</a></p>
            <p>
                <a href="{{ route('usuarios.create') }}">Crear cuenta</a>
            </p>
        </div>
    </form>

</div>

@endsection
