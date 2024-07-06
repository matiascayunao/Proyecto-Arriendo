@extends('template.master', ['tituloPagina' => 'Editar arriendo'])

@section('contenido')
<div class="col">
    <div class="card">
        <div class="card-header bg-dark text-white">Edite los datos del arriendo</div>
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
            <form method="POST" action="{{ route('arriendos.update', $arriendo->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3">
                        <label class="form-label" for="matricula_arriendo">Matricula</label>
                        <select id="matricula_arriendo" name="matricula_arriendo" class="form-control @error('matricula_arriendo') is-invalid @enderror">
                            <option value="0">Seleccione</option>
                            @foreach($vehiculos as $vehiculo)
                            <option value="{{$vehiculo->matricula}}" @if(old('matricula_arriendo')==$vehiculo->matricula) selected @endif>{{ $vehiculo->matricula }}</option>
                            @endforeach
                        </select>
                        @error('matricula_arriendo')
                        <div id="matricula_arriendoFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="rut_arrendatario">Rut arrendatario</label>
                        <select id="rut_arrendatario" name="rut_arrendatario" class="form-control @error('rut_arrendatario') is-invalid @enderror">
                            <option value="0">Seleccione</option>
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->rut_cliente}}" @if(old('rut_arrendatario')==$cliente->rut_cliente) selected @endif>{{ $cliente->rut_cliente }}</option>
                            @endforeach
                        </select>
                        @error('rut_arrendatario')
                        <div id="rut_arrendatarioFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tipo">Tipo de auto</label>
                        <select id="tipo" name="tipo" class="form-control @error('tipo') is-invalid @enderror">
                            <option value="0">Seleccione</option>
                            @foreach($tipos as $tipo)
                                <option value="{{$tipo->id}}" data-precio="{{$tipo->precio_vehiculo}}" @if(old('tipo')==$tipo->id) selected @endif>{{ $tipo->tipo_vehiculo }}</option>
                            @endforeach
                        </select>
                        @error('tipo')
                        <div id="tipoFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3 col-12 col-md-6">
                        <label for="valor_arriendo" class="form-label">Valor del arriendo</label>
                        <input type="text" id="valor_arriendo" name="valor_arriendo" class="form-control @error('valor_arriendo') is-invalid @enderror"
                               value="{{ old('valor_arriendo') ?: ($tipos->first() ? $tipos->first()->precio_vehiculo : '') }}">
                        @error('valor_arriendo')
                        <div id="valor_arriendoFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="fecha_inicio" class="form-label">Fecha inicio</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" value="{{ old('fecha_inicio') }}">
                        @error('fecha_inicio')
                        <div id="fecha_inicioFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="fecha_fin" class="form-label">Fecha fin</label>
                        <input type="date" id="fecha_fin" name="fecha_fin" class="form-control @error('fecha_fin') is-invalid @enderror" value="{{ old('fecha_fin') }}">
                        @error('fecha_fin')
                        <div id="fecha_finFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="estado_arriendo" class="form-label">Estado del arriendo</label>
                        <input type="text" id="estado_arriendo" name="estado_arriendo" class="form-control @error('estado_arriendo') is-invalid @enderror" value="{{old('estado_arriendo')}}">
                        @error('estado_arriendo')
                        <div id="estado_arriendoFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="imagen_entrega" class="form-label">Imagen entrega</label>
                        <input type="file" id="imagen_entrega" name="imagen_entrega" class="form-control @error('imagen_entrega') is-invalid @enderror">
                        @error('imagen_entrega')
                        <div id="imagen_entregaFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="imagen_recepcion" class="form-label">Imagen recepcion</label>
                        <input type="file" id="imagen_recepcion" name="imagen_recepcion" class="form-control @error('imagen_recepcion') is-invalid @enderror">
                        @error('imagen')
                        <div id="imagen_recepcionFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 d-grid gap-2 d-lg-block">
                        <button class="btn btn-warning" type="reset">Restablecer</button>
                        <button class="btn btn-success" type="submit">Agregar Arriendo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


