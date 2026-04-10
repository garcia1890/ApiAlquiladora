<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Usuarios</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>

    <h2>Reporte de Usuarios</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->Id_cliente }}</td>
                <td>{{ $usuario->Nombre }} {{ $usuario->Apellido_Pa }} {{ $usuario->Apellido_Ma }}</td>
                <td>{{ $usuario->Direccion }}</td>
                <td>{{ $usuario->Telefono }}</td>
                <td>{{ $usuario->Usuario }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
