@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong> Apoderado ( {{ auth()->id() }} ) </strong>
                    <!-- validacion -->

                </div>
                <div class="card-body">
                    {!! Form::model($apoderado, ['route' => ['apoderado.update', $apoderado->id],
                    'method' => 'PUT']) !!}

                    @include('apoderado.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
