@extends('cpanel.app')
@section('title','Editar Usuario')

@section('content')
<div class="container">
    <h2>Editar Usuario</h2>

    <form action="{{ route('usuarios.update', $usuario->Id_cliente) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label>Nombre:</label>
            <input type="text" name="Nombre" value="{{ $usuario->Nombre }}" required
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Apellido Paterno:</label>
            <input type="text" name="Apellido_Pa" value="{{ $usuario->Apellido_Pa }}" required
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Apellido Materno:</label>
            <input type="text" name="Apellido_Ma" value="{{ $usuario->Apellido_Ma }}" required
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Dirección:</label>
            <input type="text" name="Direccion" value="{{ $usuario->Direccion }}" required
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Teléfono:</label>
            <input type="text" name="Telefono" value="{{ $usuario->Telefono }}" required
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Usuario:</label>
            <input type="text" name="Usuario" value="{{ $usuario->Usuario }}" required
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Contraseña:</label>
            <input type="text" name="Contrasena" value="{{ $usuario->Contrasena }}" required
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:5px;">
        </div>

        <button type="submit"
            style="background:#007bff; color:white; padding:10px 20px; border:none; border-radius:5px; cursor:pointer;">
            Guardar Cambios
        </button>

        <a href="{{ route('usuarios.index') }}"
           style="margin-left:10px; background:#6c757d; color:white; padding:10px 20px; 
           border-radius:5px; text-decoration:none;">
            Cancelar
        </a>

    </form>
</div>
@endsection
