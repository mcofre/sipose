@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card table-responsive">
                <div class="card-header">
                    <strong>Apoderado</strong>
                    <strong> 
                        @auth
                            <a href="">{{ @Auth::id() }}</a>
                        @endauth
                    </strong>
                    @can('apoderado.create')
                        <a href="{{ route('apoderado.create') }}" class="btn btn-sm btn-primary float-right">Crear</a>
                    @endcan
                </div>
                <div class="card-body table-responsive">                    
                    <table class="table table-striper table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID*</th>
                                <th>Rut Apoderado</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Dirección</th>
                                <th>Nacionalidad</th>
                                <th>Teléfono</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $apoderados->id }}</td>
                                <td>{{ $apoderados->rut_apoderado }}</td>
                                <td>{{ $apoderados->nombre }}</td>
                                <td>{{ $apoderados->apellidop }}</td>
                                <td>{{ $apoderados->apellidom }}</td>
                                <td>{{ $apoderados->direccion }}</td>
                                <td>{{ $apoderados->nacionalidad_id }}</td>
                                <td>{{ $apoderados->telefono }}</td>
                                <td width="10px">
                                    @can('apoderado.show')
                                    <a href="{{ route('apoderado.show', $apoderados->id) }}"
                                        class="btn btn-secondary btn-sm">Ver</a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('apoderado.edit')
                                    <a href="{{ route('apoderado.edit', $apoderados->id) }}"
                                        class="btn btn-secondary btn-sm">Editar</a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('apoderado.destroy')
                                    {!! Form::open(['route'=>['apoderado.destroy',$apoderados->id],
                                    'method' => 'DELETE'])  !!}
                                        <button class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- $apoderados->render() --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection