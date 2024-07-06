<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="col">
        <div class="card">
            <div class="card-header bg-dark text-white">Ingrese los datos del nuevo usuario</div>
            <div class="card-body">
                {{-- mensajes de error --}}
                @if($errors->any())
                <div class="alert alert-danger">
                    <p> Solucione los siguientes problemas:</p>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{-- /mensajes de error --}}
                <form method="POST" action="{{ route('usuarios.store') }}">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label for="rut" class="form-label">RUT</label>
                            <input type="text" id="rut" name="rut" class="form-control @error('rut') is-invalid @enderror" value="{{old('rut')}}">
                            @error('rut')
                            <div id="rutFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="contraseña" class="form-label">Contraseña</label>
                            <input type="password" id="contraseña" name="contraseña" class="form-control @error('contraseña') is-invalid @enderror">
                            @error('contraseña')
                            <div id="contraseñaFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
                            @error('nombre')
                            <div id="nombreFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="n_rol">Tipo de Perfil</label>
                            <select id="n_rol" name="n_rol" class="form-control @error('n_rol') is-invalid @enderror">
                                <option value="0">Seleccione</option>
                                @foreach($perfiles as $perfil)
                                <option value="{{$perfil->id}}" @if(old('n_rol')==$perfil->id) selected @endif>{{ $perfil->rol }}</option>
                                @endforeach
                            </select>
                            @error('n_rol')
                            <div id="n_rolFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 d-grid gap-2 d-lg-block">
                            <button class="btn btn-warning" type="reset">Restablecer</button>
                            <button class="btn btn-success" type="submit">Agregar Usuario</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>