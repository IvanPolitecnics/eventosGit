<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.0.0/dist/locale/es.js"></script>

</head>
<body>

    @include('navbar')
    <!-- Navbar -->
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Eventos</a>
        </div>
    </nav> --}}

    <!-- Pantalla principal -->
    <header class="bg-primary text-white text-center py-5" style="height: 100vh;">
        <div class="container">
            <h1 class="display-1">Gestión de eventos</h1>
            <p class="lead">Explora, descubre y participa</p>
        </div>
        <a href="#eventos" class="btn btn-light btn-lg mt-4">Ver eventos</a>
    </header>

    <!-- Sección de eventos -->
    <section id="eventos" class="container my-5">
        <h2 class="mb-4">Próximos Eventos</h2>
        <div id="calendar"></div>

        <!-- FullCalendar JS -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

        <!-- Pasa los eventos desde PHP a JS -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const calendarEl = document.getElementById('calendar');

                const eventos = [
                    @foreach ($eventos as $evento)
                        {
                            title: "{{ addslashes($evento->titulo) }}",
                            start: "{{ $evento->fecha_inicio }}",
                            end: "{{ $evento->fecha_fin }}"
                        }@if (!$loop->last),@endif
                    @endforeach
                ];

                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'es',
                    events: eventos
                });

                calendar.render();
            });
        </script>
    </section>

    <!-- Sección creador -->
    <section class="container my-5">
        <h2 class="mb-4">¿Quieres ser creador de eventos?</h2>
        {{-- <p>Aquí explicaremos cómo convertirse en creador.</p> --}}

        @if (auth()->user() && (auth()->user()->tipo_usuario_id == 2 || auth()->user()->tipo_usuario_id == 1))
            <!-- Si el usuario es Creador (id 2) o Admin (id 1), mostramos el botón -->
            <a href="{{ route('formulario') }}" class="btn btn-primary">Formulario</a>
        @else
            <!-- Si el usuario es Público (id 3), mostramos un mensaje -->
            <p>Para crear eventos hay que ser creador. Si deseas crear eventos, conviértete en un creador.</p>
        @endif
    </section>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p>&copy; {{ date('Y') }} Eventos. Todos los derechos reservados.</p>
    </footer>

    <!-- FullCalendar JS -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

</body>
</html>
