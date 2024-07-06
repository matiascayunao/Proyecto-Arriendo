@extends('template.master' , ['tituloPagina' => 'Vehiculo Foto'])

@section('contenido')

<div class="row">
    <div class="col">
        <div class="card mb-3">
            <img src="{{ Storage::url($arriendo->imagen_entrega) }}" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">{{ $arriendo->matricula_arriendo }}</h5>
                <p class="card-text">Imagen del vehiculo {{$arriendo->matricula_arriendo}}</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card mb-3">
            <img src="{{ Storage::url($arriendo->imagen_recepcion) }}" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">{{ $arriendo->matricula_arriendo }}</h5>
                <p class="card-text">Imagen del vehiculo {{$arriendo->matricula_arriendo}}</p>
            </div>
        </div>
    </div>
</div>

@endsection