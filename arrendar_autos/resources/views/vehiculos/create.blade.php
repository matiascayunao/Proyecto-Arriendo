@extends('template.master',['tituloPagina'=>'Crear Vehiculo'])

@section('contenido')

<div class="col">
    <div class="card">
        <div class="card-header ">Ingrese los datos del nuevo vehiculo</div>
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
            <form method="POST" action="{{ route('vehiculos.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="matricula" class="form-label">Matricula</label>
                        <input type="text" id="matricula" name="matricula" class="form-control @error('matricula') is-invalid @enderror" value="{{old('matricula')}}">
                        @error('matricula')
                        <div id="matriculaFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre_vehiculo" class="form-label">Nombre del Vehiculo</label>
                        <input type="text" id="nombre_vehiculo" name="nombre_vehiculo" class="form-control @error('nombre_vehiculo') is-invalid @enderror" value="{{old('nombre_vehiculo')}}">
                        @error('nombre_vehiculo')
                        <div id="nombre_vehiculoFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" id="marca" name="marca" class="form-control @error('marca') is-invalid @enderror" value="{{ old('marca') }}">
                        @error('marca')
                        <div id="marcaFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="año" class="form-label">año</label>
                        <input type="number" id="año" name="año" class="form-control @error('año') is-invalid @enderror" value="{{ old('año') }}">
                        @error('año')
                        <div id="añoFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" id="estado" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{old('estado')}}">
                        @error('estado')
                        <div id="estadoFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" id="imagen" name="imagen" class="form-control @error('imagen') is-invalid @enderror">
                        @error('imagen')
                        <div id="nombreFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tipo_v">Tipo de Vehiculo</label>
                        <select id="tipo_v" name="tipo_v" class="form-control @error('tipo_v') is-invalid @enderror">
                            <option value="0">Seleccione</option>
                            @foreach($tipos as $tipo)
                            <option value="{{$tipo->id}}" @if(old('tipo_v')==$tipo->id) selected @endif>{{ $tipo->tipo_vehiculo }}</option>
                            @endforeach
                        </select>
                        @error('tipo_v')
                        <div id="tipo_vFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 d-grid gap-2 d-lg-block">
                        <button class="btn btn-warning" type="reset">Restablecer</button>
                        <button class="btn btn-success" type="submit">Agregar Vehiculo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
