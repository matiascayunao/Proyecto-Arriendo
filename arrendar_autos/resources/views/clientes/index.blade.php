@extends('template.master', ['tituloPagina' => 'Clientes'])

@section('contenido')
<div class="row">
    <div class="col">
        @if(count($clientes) == 0)
        <div class="alert alert-warning" role="alert">
            No hay Clientes
        </div>
        @else
        <table class="table table-bordered table-striped table-hover">
            <thead class="table">
                <tr>
                    <th>N°</th>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $num => $cliente)
                <tr>
                    <td class="align-middle">{{$num + 1}}</td>
                    <td class="align-middle">{{$cliente->rut_cliente}}</td>
                    <td class="align-middle">{{$cliente->nombre_cliente}}</td>
                    <td class="align-middle">{{$cliente->apellido_cliente}}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <form method="POST" action="{{ route('clientes.destroy', $cliente->rut_cliente) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-title="Borrar Cliente">
                                    Borrar
                                </button>
                            </form>
                            <form method="GET" action="{{ route('clientes.edit', $cliente->rut_cliente) }}">
                                <button class="btn btn-sm btn-warning text-white" data-bs-toggle="tooltip" data-bs-title="Editar Cliente">Editar</button>
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
