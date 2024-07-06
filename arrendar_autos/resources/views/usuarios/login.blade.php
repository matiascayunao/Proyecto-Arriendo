<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container vh-100 d-flex align-items-center">
        <div class="row w-100">
            <div class="col-10  col-md-6 d-flex justify-content-center">
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Iniciar Sesión</h5>
                        <form method="POST" action="{{ route('usuarios.verificar') }}">
                            @csrf
                            {{-- rut --}}
                            <div class="mb-3">
                                <label for="rut">RUT</label>
                                <input type="text" class="form-control" id="rut" name="rut" value="{{ old('rut') }}">
                            </div>

                            {{-- contraseña --}}
                            <div class="mb-3">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="contraseña">
                            </div>

                            {{-- botones --}}
                            <div class="mb-3 d-grid  d-md-block text-end">
                                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                            </div>
                        </form>

                        {{-- Formulario para crear cuenta --}}
                        <form method="GET" action="{{ route('usuarios.create') }}">
                            <div class="mb-3 d-grid  d-md-block text-end">
                                <button type="submit" class="btn btn-secondary">Crear Cuenta</button>
                            </div>
                        </form>

                        {{-- errores -
                        @if($errors->any())
                        <div class="alert alert-warning py-1 mt-3">
                            {{ $errors->first() }}
                        </div>
                        @endif
                        {{-- /errores --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
