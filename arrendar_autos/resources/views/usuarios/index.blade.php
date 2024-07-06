@extends('template.master' , ['tituloPagina' => 'Usuarios'])

@section('contenido')

<div class="row">
    <div class="col">
        @if(count($usuarios) == 0)
        <div class="alert alert-warning" role="alert">
            No hay usuarios
        </div>
        @else
        <table class="table table-bordered table-striped table-hover">
            <thead class="table">
                <tr>
                    <th>N°</th>
                    <th>RUT</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $num => $usuario)
                <tr>
                    <td class="align-middle">{{$num + 1}}</td>
                    <td class="align-middle">{{$usuario->rut}}</td>
                    <td class="align-middle">{{$usuario->nombre}}</td>
                    <td class="align-middle">
                        @if ($usuario->n_rol == 1)
                            Administrador
                        @else
                            Ejecutivo
                        @endif
                    </td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <form method="POST" action="{{ route('usuarios.destroy', $usuario->rut) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-title="Borrar usuario">
                                    Borrar
                                </button>
                            </form>
                            <form method="GET" action="{{ route('usuarios.edit', $usuario->rut)}}"  >
                                <button class="btn btn-sm btn-warning text-white" data-bs-toggle="tooltip" data-bs-title="Editar Usuario" >Editar</button>
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
