@extends('cpanel.app')
@section('title','Usuarios')

@section('content')
<div class="container">
    <h2>Lista de Usuarios</h2>
    <a href="{{ route('usuarios.create') }}" class="btn btn-success mb-3">Agregar Usuario</a>

    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; 
                    border-radius: 5px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- BOTÓN ELIMINAR SELECCIONADOS --}}
    <form id="deleteSelectedForm" action="{{ route('usuarios.deleteSelected') }}" method="POST">
        @csrf
        @method('DELETE')

        <div id="hiddenInputs"></div>

        <button type="submit" class="btn btn-danger"
            onclick="return confirm('¿Eliminar usuarios seleccionados?')">
            Eliminar Seleccionados
        </button>
    </form>
</div>


<table>
    <thead>
        <tr>
            <th>✔️</th>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Usuario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($usuarios as $usuario)
        <tr>
            <td>
                <input type="checkbox" class="userCheckbox" value="{{ $usuario->Id_cliente }}">
            </td>
            <td>{{ $usuario->Id_cliente }}</td>
            <td>{{ $usuario->Nombre }}</td>
            <td>{{ $usuario->Apellido_Pa }}</td>
            <td>{{ $usuario->Apellido_Ma }}</td>
            <td>{{ $usuario->Direccion }}</td>
            <td>{{ $usuario->Telefono }}</td>
            <td>{{ $usuario->Usuario }}</td>

            <td>
                <a href="{{ route('usuarios.edit', $usuario->Id_cliente) }}" 
                    style="padding: 5px 10px; background-color: #007bff; color: white; 
                    border-radius: 5px; text-decoration: none;">
                    Editar
                </a>

                <form action="{{ route('usuarios.destroy', $usuario->Id_cliente) }}" 
                      method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            onclick="return confirm('¿Deseas eliminar este usuario?')" 
                            style="padding: 5px 10px; background-color: #dc3545; color: white;
                            border-radius: 5px; border: none; cursor: pointer;">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" style="text-align:center;">No hay usuarios registrados</td>
        </tr>
        
        @endforelse
    </tbody>
</table>

{{-- BOTÓN DE REPORTE — SIN CAMBIAR NADA DE TU ESTILO --}}
<div>
    <br>
    <a href="{{ URL('admon/reportes/pdf') }}" target="_blank" class="btn btn-primary">
        Generar reporte
    </a>
</div>

{{-- SCRIPT PARA SELECCIONAR Y ENVIAR IDS --}}
<script>
document.getElementById('deleteSelectedForm').onsubmit = function(e) {
    let seleccionados = [];
    document.querySelectorAll('.userCheckbox:checked').forEach(cb => {
        seleccionados.push(cb.value);
    });

    if (seleccionados.length === 0) {
        alert("No has seleccionado ningún usuario.");
        return false;
    }

    // LIMPIAR INPUTS ANTERIORES
    let contenedor = document.getElementById('hiddenInputs');
    contenedor.innerHTML = "";

    // AGREGAR IDS COMO ARREGLO REAL
    seleccionados.forEach(id => {
        let input = document.createElement("input");
        input.type = "hidden";
        input.name = "ids[]";
        input.value = id;
        contenedor.appendChild(input);
    });

    return true;
};
</script>

@endsection
