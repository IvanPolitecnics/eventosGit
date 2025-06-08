<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">Eventos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">INICIO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('formulario') }}">FORMULARIO</a>
          </li>
          @if (auth()->user() && (auth()->user()->tipo_usuario_id == 1))
            <!-- Solo mostrar el boton si es admin -->
            <a class="nav-link" href="{{ route('usuarios.index') }}">USUARIOS</a>
        @else

        @endif
        </ul>

        <ul class="navbar-nav">
          @auth
            <li class="nav-item">
              <span class="nav-link">Hola, {{ Auth::user()->nombre }}</span>
            </li>
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-outline-light btn-sm" type="submit">Cerrar sesión</button>
              </form>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>






















{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Eventos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/') }}">INICIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('formulario') }}">FORMULARIO</a>
        </li>
      </ul>
    </div>
  </nav> --}}
