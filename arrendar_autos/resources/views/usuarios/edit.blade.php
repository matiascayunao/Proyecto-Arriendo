@extends('template.master', ['tituloPagina' => 'Editar Usuario'])

@section('contenido')

<div class="col">
    <div class="card">
        <div class="card-header ">Edite los datos del usuario</div>
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
            <form method="POST" action="{{ route('usuarios.update', $usuario->rut) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="rut" class="form-label">Editar RUT</label>
                        <input type="text" id="rut" name="rut" class="form-control @error('rut') is-invalid @enderror" value="{{ old('rut', $usuario->rut) }}">
                        @error('rut')
                        <div id="rutFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="contraseña" class="form-label">Editar Contraseña</label>
                        <input type="password" id="contraseña" name="contraseña" class="form-control @error('contraseña') is-invalid @enderror">
                        @error('contraseña')
                        <div id="contraseñaFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Editar Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $usuario->nombre) }}">
                        @error('nombre')
                        <div id="nombreFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="n_rol">Editar Tipo de Perfil</label>
                        <select id="n_rol" name="n_rol" class="form-control @error('n_rol') is-invalid @enderror">
                            <option value="0">Seleccione</option>
                            @foreach($perfiles as $perfil)
                            <option value="{{$perfil->id}}" @if(old('n_rol', $usuario->n_rol) == $perfil->id) selected @endif>{{ $perfil->rol }}</option>
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
                        <button class="btn btn-success" type="submit">Actualizar Usuario</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
