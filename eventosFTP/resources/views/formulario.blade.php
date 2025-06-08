<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @include('navbar')

    <div class="container mt-5">
        <h2>Formulario de Evento</h2>

        <!-- Mostrar errores de validación si los hay -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('eventos.store') }}" method="POST">

            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion') }}</textarea>
            </div>

            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio') }}" required>
            </div>

            <div class="form-group">
                <label for="fecha_fin">Fecha de Fin</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin') }}" required>
            </div>

            <div class="form-group">
                <label for="ubicacion">Ubicación</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}" required>
            </div>

            <div class="form-group">
                <label for="tipo_evento_id">Tipo de Evento</label>
                <select class="form-control" id="tipo_evento_id" name="tipo_evento_id" required>
                    @foreach ($tiposEventos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Evento</button>
        </form>
    </div>

</body>
</html>
