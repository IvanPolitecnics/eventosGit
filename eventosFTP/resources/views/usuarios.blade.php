<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @include('navbar')

    <div class="container mt-5">
        <h2>Lista de Usuarios</h2>

        @if ($usuarios->isEmpty())
            <p>No hay usuarios registrados.</p>
        @else
            <!-- Mensaje de éxito -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Tipo de Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->tipoUsuario->nombre }}</td> <!-- Relación con TipoUsuario -->
                            <td>
                                <!-- Formulario de eliminación -->
                                <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" style="display:inline;">
                                    @method('DELETE') <!-- Necesario para enviar una solicitud DELETE -->
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</body>
</html>
