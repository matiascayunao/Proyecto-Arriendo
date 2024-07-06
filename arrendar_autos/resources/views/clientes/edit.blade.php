@extends('template.master', ['tituloPagina' => 'Editar Cliente'])

@section('contenido')

<div class="col">
    <div class="card">
        <div class="card-header ">Edite los datos del Cliente</div>
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
            <form method="POST" action="{{ route('clientes.update', $cliente->rut_cliente) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="rut_cliente" class="form-label">RUT</label>
                        <input type="text" id="rut_cliente" name="rut_cliente" class="form-control @error('rut_cliente') is-invalid @enderror" value="{{ old('rut_cliente') }}">
                        @error('rut_cliente')
                        <div id="rut_clienteFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
                        <input type="text" id="nombre_cliente" name="nombre_cliente" class="form-control @error('nombre_cliente') is-invalid @enderror" value="{{ old('nombre_cliente') }}">
                        @error('nombre_cliente')
                        <div id="nombre_clienteFeedback" class="invalid-feedback">
                            {{$message}}
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="apellido_cliente" class="form-label">Apellido del Cliente</label>
                        <input type="text" id="apellido_cliente" name="apellido_cliente" class="form-control @error('apellido_cliente') is-invalid @enderror" value="{{ old('apellido_cliente') }}">
                        @error('apellido_cliente')
                        <div id="apellido_clienteFeedback" class="invalid-feedback">
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
