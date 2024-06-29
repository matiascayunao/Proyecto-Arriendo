@extends('template.master')

@section('contenido')
<div class="row">
    <div class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch">
        <div class="card">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">Gestión de Vehículos</h5>
                <p>Gestiona la flota de vehículos disponibles para arriendo.</p>
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-sm btn-secondary">Ir a Vehículos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch">
        <div class="card">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">Gestión de Clientes</h5>
                <p>Administra la información de los clientes.</p>
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-sm btn-secondary">Ir a Clientes</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch">
        <div class="card">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">Gestión de Arriendos</h5>
                <p>Administra los arriendos vigentes y finalizados.</p>
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-sm btn-secondary">Ir a Arriendos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch">
        <div class="card">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">Gestión de Usuarios</h5>
                <p>Administra las cuentas de usuario del sistema.</p>
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-sm btn-secondary">Ir a Usuarios</a>
                </div>
            </div>
        </div>
</div>
@endsection
