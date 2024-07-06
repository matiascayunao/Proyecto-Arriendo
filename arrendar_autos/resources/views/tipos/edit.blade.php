@extends('template.master', ['tituloPagina' => 'Editar Tipo de vehiculo'])

@section('contenido')

<div class="col">
    <div class="card">
        <div class="card-header ">Edite los datos del tipo de vehiculo</div>
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
            <form method="POST" action="{{ route('tipos.update', $tipo->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="tipo_vehiculo" class="form-label">Editar Nombre del tipo de vehiculo</label>
                        <input type="text" id="tipo_vehiculo" name="tipo_vehiculo" class="form-control @error('tipo_vehiculo') is-invalid @enderror" value="{{ old('tipo_vehiculo', $tipo->tipo_vehiculo) }}">
                        @error('tipo_vehiculo')
                        <div id="tipo_vehiculoFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="precio_tipo" class="form-label">Editar Precio</label>
                        <input type="number" id="precio_tipo" name="precio_tipo" class="form-control @error('precio_tipo') is-invalid @enderror" value="{{ old('precio_tipo', $tipo->precio_tipo) }}">
                        @error('precio_tipo')
                        <div id="precio_tipoFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 d-grid gap-2 d-lg-block">
                        <button class="btn btn-warning" type="reset">Restablecer</button>
                        <button class="btn btn-success" type="submit">Actualizar Tipo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
