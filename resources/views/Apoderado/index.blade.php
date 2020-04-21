@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">
                    <strong>Apoderado ( {{ auth()->id() }} )</strong>
                    @can('apoderado.create')
                        <a href="{{ route('apoderado.create') }}" class="btn btn-sm btn-primary float-right">Crear</a>
                    @endcan
                    <!--<a href="">{{-- auth()->user()->name --}}</a> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striper table-hover">
                            <thead>
                                <tr>
                                    <th width="10px">ID</th>
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
                                @if($apoderados->count() )
                                    @foreach ($apoderados as $apoderado)
                                    <tr>
                                        <td>{{ $apoderado->id }}</td>
                                        <td>{{ $apoderado->rut_apoderado }}</td>
                                        <td>{{ $apoderado->nombre }}</td>
                                        <td>{{ $apoderado->apellidop }}</td>
                                        <td>{{ $apoderado->apellidom }}</td>
                                        <td>{{ $apoderado->direccion }}</td>
                                        <td>{{ $apoderado->nacionalidad->nacionalidad ?? ''}}</td>
                                        <td>{{ $apoderado->telefono }}</td>
                                        <td width="10px">
                                            @can('apoderado.show')
                                            <a href="{{ route('apoderado.show', $apoderado->id) }}"
                                                class="btn btn-secondary btn-sm">Ver</a>
                                            @endcan
                                        </td>
                                        <td width="10px">
                                            @can('apoderado.edit')
                                            <a href="{{ route('apoderado.edit', $apoderado->id) }}"
                                                class="btn btn-secondary btn-sm">Editar</a>
                                            @endcan
                                        </td>
                                        <td width="10px">
                                            @can('apoderado.destroy')
                                            {{-- {!! Form::open(['route'=>['apoderado.destroy',$apoderado->id],
                                            'method' => 'DELETE'])  !!}
                                                <button class="btn btn-danger btn-sm">
                                                    Eliminar
                                                </button>
                                            {!! Form::close() !!} --}}
                                            <button class="btn btn-danger btn-sm"
                                                onclick="event.preventDefault();
                                                    numero = {{$apoderado->id}};" data-toggle="modal" data-target="#myModal">
                                                {{ __('Eliminar') }}
                                            </button>
                                            <form id="deleteform{{$apoderado->id}}" action="{{ route('apoderado.destroy',['apoderado' => $apoderado->id]) }}" method="POST" style="display: none;">
                                                @csrf
                                                {{method_field('DELETE')}}
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        @if($apoderados->count() )
                            {{ $apoderados->links()}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal content-->
    <div id="myModal" class="modal fade " role="dialog">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong> Eliminar </strong></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>¿ Seguro desea eliminar el apoderado ?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger"
                        onclick="event.preventDefault();
                        borrar();"> 
                        Eliminar
                    </button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal content-->
    <!-- Enviar delete-->
    <script>
        var numero = 0;
        function borrar(){
            let form = 'deleteform' + numero;
            document.getElementById(form).submit();
        }
    </script>
    <!-- Enviar delete-->
</div>
@endsection