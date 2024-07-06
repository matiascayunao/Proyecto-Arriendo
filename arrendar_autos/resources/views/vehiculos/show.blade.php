@extends('template.master' , ['tituloPagina' => 'Vehiculo Foto'])

@section('contenido')

<div class="row">
    <div class="col">
        <div class="card mb-3">
            <img src="{{ Storage::url($vehiculo->imagen) }}" class="card-img-top" >
            <div class="card-body d-flex flex-column ">
                <h5 class="card-title">{{ $vehiculo->nombre_vehiculo }}</h5>
                <p class="card-text">Imagen del vehiculo {{$vehiculo->nombre_vehiculo}}</p>
            </div>
        </div>
    </div>
</div>

@endsection