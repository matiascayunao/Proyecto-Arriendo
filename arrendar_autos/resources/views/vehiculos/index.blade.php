@extends('template.master' , ['tituloPagina' => 'Vehiculos'])

@section('contenido')

<div class="row">
    <div class="col">
        @if(count($vehiculos) == 0)
        <div class="alert alert-warning" role="alert">
            No hay vehiculos
        </div>
        @else
        <table class="table table-bordered table-striped table-hover">
            <thead class="table">
                <tr>
                    <th>N°</th>
                    <th>Matricula</th>
                    <th>Nombre del vehiculo</th>
                    <th>Tipo del Vehiculo</th>
                    <th>Marca</th>
                    <th>Año</th>
                    <th>Estado</th>
                    <th>Borrar</th>
                    <th>Editar</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehiculos as $num => $vehiculo)
                <tr>
                    <td class="align-middle">{{$num + 1}}</td>
                    <td class="align-middle">{{$vehiculo->matricula}}</td>
                    <td class="align-middle">{{$vehiculo->nombre_vehiculo}}</td>
                    <td class="align-middle">
                        @if($vehiculo->tipo)
                            {{$vehiculo->tipo->tipo_vehiculo}}
                        @else
                            Sin tipo asignado
                        @endif
                    </td>
                    <td class="align-middle">{{$vehiculo->marca}}</td>
                    <td class="align-middle">{{$vehiculo->año}}</td>
                    <td class="align-middle">{{$vehiculo->estado}}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <form method="POST" action="{{ route('vehiculos.destroy', $vehiculo->matricula) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-title="Borrar vehiculo">
                                    Borrar
                                </button>
                            </form>
                        </div>
                    </td> 
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <form method="GET" action="{{ route('vehiculos.edit', $vehiculo->matricula)}}"  >
                                <button class="btn btn-sm btn-warning text-white" data-bs-toggle="tooltip" data-bs-title="Editar vehiculo" >Editar</button>
                            </form>
                        </div>
                    </td>
                    <td class="align-middle"> {{-- imagen --}}
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <form method="GET" action="{{ route('vehiculos.show', $vehiculo->matricula)}}"  >
                                <button class="btn btn-sm btn-warning text-white" data-bs-toggle="tooltip" data-bs-title="Editar Usuario" >Ver imagen</button>
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
