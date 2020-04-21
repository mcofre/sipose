@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Apoderado ( {{ auth()->id() }} )</strong>
                </div>
                <div class="card-body">
                    <p><strong>Rut Apoderado    : </strong> {{ $apoderado->rut_apoderado }}</p>
                    <p><strong>Nombre           : </strong> {{ $apoderado->nombre }}</p>
                    <p><strong>Apellido Paterno : </strong> {{ $apoderado->apellidop }}</p>
                    <p><strong>Apellido Materno : </strong> {{ $apoderado->apellidom }}</p>
                    <p><strong>Dirección        : </strong> {{ $apoderado->direccion }}</p>
                    <p><strong>Nacionalidad     : </strong> {{ $apoderado->nacionalidad->nacionalidad ?? ''}}</p>
                    <p><strong>Teléfono         : </strong> {{ $apoderado->telefono }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection