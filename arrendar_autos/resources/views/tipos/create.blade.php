@extends('template.master',['tituloPagina'=>'Crear Tipo de vehiculo'])

@section('contenido')

<div class="col">
    <div class="card">
        <div class="card-header bg-dark text-white">Ingrese los datos del nuevo tipo</div>
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
            <form method="POST" action="{{ route('tipos.store') }}">
                @csrf
                <div class="row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="tipo_vehiculo" class="form-label">Nombre del tipo de vehiculo</label>
                        <input type="text" id="tipo_vehiculo" name="tipo_vehiculo" class="form-control @error('tipo_vehiculo') is-invalid @enderror" value="{{ old('tipo_vehiculo') }}">
                        @error('tipo_vehiculo')
                        <div id="tipo_vehiculoFeedback" class="invalid-feedback">
                            {{$message}}
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="precio_tipo" class="form-label">Precio</label>
                        <input type="number" id="precio_tipo" name="precio_tipo" class="form-control @error('precio_tipo') is-invalid @enderror" value="{{ old('precio_tipo') }}">
                        @error('precio_tipo')
                        <div id="precio_tipoFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 d-grid gap-2 d-lg-block">
                        <button class="btn btn-warning" type="reset">Restablecer</button>
                        <button class="btn btn-success" type="submit">Agregar Tipo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
