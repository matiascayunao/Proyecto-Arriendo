@inject('carbon','Carbon\Carbon')
@extends('template.master' , ['tituloPagina' => 'Arriendos'])

@section('contenido')

<div class="row">
    <div class="col">
        @if(count($arriendos) == 0)
        <div class="alert alert-warning" role="alert">
            No hay arriendos
        </div>
        @else
        <table class="table table-bordered table-striped table-hover">
            <thead class="table">
                <tr>
                    <th>N°</th>
                    <th>Matricula</th>
                    <th>Rut</th>
                    <th>Tipo del Vehiculo</th>
                    <th>Valor</th>
                    <th>Fecha de Arriendo</th>
                    <th>Fecha de Devolucion</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($arriendos as $num => $arriendo)
                <tr>
                    <td class="align-middle">{{$num + 1}}</td>
                    <td class="align-middle">{{$arriendo->matricula_arriendo}}</td>
                    <td class="align-middle">{{$arriendo->rut_arrendatario}}</td>
                    <td class="align-middle">{{$arriendo->tipo}}</td>
                    <td class="align-middle">{{$arriendo->valor_arriendo}}</td>
                    <td class="align-middle">{{$carbon::parse($arriendo->fecha_inicio)->format('d-m-Y h:i a')}}</td>
                    <td class="align-middle">{{$carbon::parse($arriendo->fecha_fin)->format('d-m-Y h:i a')}}</td>

                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <form method="POST" action="{{ route('arriendos.destroy', $arriendo->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-title="Borrar arriendo">
                                    Borrar
                                </button>
                            </form>
                            <form method="GET" action="{{ route('arriendos.update', $arriendo->id)}}"  >
                                <button class="btn btn-sm btn-warning text-white" data-bs-toggle="tooltip" data-bs-title="Editar arriendo" >Editar</button>
                            </form>
                        </div>
                    </td>
                    <td class="align-middle"> 
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <form method="GET" action="{{ route('arriendos.show', $arriendo->id)}}"  >
                                <button class="btn btn-sm btn-warning text-white" data-bs-toggle="tooltip" data-bs-title="Ver Arriendo" >Ver imagen 1</button>
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
