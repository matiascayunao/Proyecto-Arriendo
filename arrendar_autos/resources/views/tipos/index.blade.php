@extends('template.master' , ['tituloPagina' => 'Tipos de Vehiculos'])

@section('contenido')

<div class="row">
    <div class="col">
        @if(count($tipos) == 0)
        <div class="alert alert-warning" role="alert">
            No hay tipos
        </div>
        @else
        <table class="table table-bordered table-striped table-hover">
            <thead class="table">
                <tr>
                    <th>N°</th>
                    <th>Tipo de vehiculo</th>
                    <th>Precio del tipo de vehiculo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tipos as $num => $tipo)
                <tr>
                    <td class="align-middle">{{$num + 1}}</td>
                    <td class="align-middle">{{$tipo->tipo_vehiculo}}</td>
                    <td class="align-middle">{{$tipo->precio_tipo}}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <form method="POST" action="{{ route('tipos.destroy', $tipo->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-title="Borrar Tipo">
                                    Borrar
                                </button>
                            </form>
                            <form method="GET" action="{{ route('tipos.edit', $tipo->id)}}">
                                <button class="btn btn-sm btn-warning text-white" data-bs-toggle="tooltip" data-bs-title="Editar Tipo" >Editar</button>
                            </form>
                        </div>
                    </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

@endsection
