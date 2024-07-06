<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Arriendo de Autos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid vh-100">
        {{-- barra con navbar --}}
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home.index') }}">Sistema de Arriendo de Autos</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                        <li class="nav-item">
                            <a class="nav-link @if(Route::current()->getName() == 'home.index') active @endif" aria-current="page" href="{{ route('home.index') }}">Inicio</a>
                        </li>
                        

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Vehículos
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="nav-link @if(Route::current()->getName() == 'vehiculos.create') active @endif" href="{{ route('vehiculos.create') }}">Crear Vehículo</a></li>
                              <li><a class="nav-link @if(Route::current()->getName() == 'vehiculos.index') active @endif" href="{{ route('vehiculos.index') }}">Listar Vehículos</a></li>
                            </ul>
                          </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Tipos de vehículos
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="nav-link @if(Route::current()->getName() == 'tipos.create') active @endif" href="{{ route('tipos.create') }}">Crear Tipo de vehículo</a></li>
                              <li><a class="nav-link @if(Route::current()->getName() == 'tipos.index') active @endif" href="{{ route('tipos.index') }}">Listar Tipo de vehículos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Clientes
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="nav-link @if(Route::current()->getName() == 'clientes.create') active @endif" href="{{ route('clientes.create') }}">Crear Cliente</a></li>
                              <li><a class="nav-link @if(Route::current()->getName() == 'clientes.index') active @endif" href="{{ route('clientes.index') }}">Listar Clientes</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Arriendos
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="nav-link @if(Route::current()->getName() == 'arriendos.create') active @endif" href="{{ route('arriendos.create') }}">Ingresar Arriendo</a></li>
                              <li><a class="nav-link @if(Route::current()->getName() == 'arriendos.index') active @endif" href="{{ route('arriendos.index') }}">Listar Arriendos</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Usuario
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="nav-link @if(Route::current()->getName() == 'usuarios.createadmin') active @endif" href="{{ route('usuarios.createadmin') }}">Crear Usuario</a></li>
                              <li><a class="nav-link @if(Route::current()->getName() == 'usuarios.index') active @endif" href="{{ route('usuarios.index') }}">Listar Usuarios</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Cuenta
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="nav-link @if(Route::current()->getName() == 'usuarios.contrasena') active @endif" href="{{ route('usuarios.contrasena') }}">Cambiar Contraseña</a></li>
                              <li><a class="nav-link @if(Route::current()->getName() == 'usuarios.logout') active @endif" href="{{ route('usuarios.logout') }}">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        {{-- /barra con navbar --}}

        {{-- CONTENIDO PÁGINA --}}
        <div class="w-100 my-3 bg-white rounded">
            {{-- título página --}}
            <div class="row">
                <div class="col">
                    <div class="p-2 pb-0">
                        <h3 class="text-primary mb-0">{{ $tituloPagina }}</h3>
                    </div>
                </div>
            </div>
            {{-- /título página --}}

            <div class="p-3 pt-1">@yield('contenido')</div>

        </div>
        {{-- /CONTENIDO PÁGINA --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
