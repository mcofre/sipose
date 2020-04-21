<div class="form-group row">
    {{ Form::label('rut_apoderado', 'Rut Apoderado :',['class' => 'col-md-4 col-form-label']) }}
    <br>
    <div class="col-md-12">
        {{ Form::number('rut_apoderado', null, ['class' => 'form-control' . ($errors->has('rut_apoderado') ? ' is-invalid' : ''),
            'required' => 'required','placeholder' =>'Rut sin digito verificador', 'max' => 999999999]) }}
        @if ($errors->has('rut_apoderado'))
            <span class="invalid-feedback">{{ $errors->first('rut_apoderado') }}</span>
        @endif
    </div>
</div>

<div class="form-group row">
    {{ Form::label('nombre', 'Nombre Apoderado :',['class' => 'col-md-4 col-form-label']) }}
    <div class="col-md-12">
        {{ Form::text('nombre', null, ['maxlength' => 100,'class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'required' => 'required']) }}
        @if ($errors->has('nombre'))
            <span class="invalid-feedback">{{ $errors->first('nombre') }}</span>
        @endif
    </div>
</div>

<div class="form-group row">
    {{ Form::label('apellidop', 'Apellido Paterno :',['class' => 'col-md-4 col-form-label']) }}
    <div class="col-md-12">
        {{ Form::text('apellidop', null,['maxlength' => 100, 'class' => 'form-control' . ($errors->has('apellidop') ? ' is-invalid' : ''),  'required' => 'required']) }}
        @if ($errors->has('apellidop'))
            <span class="invalid-feedback">{{ $errors->first('apellidop') }}</span>
        @endif
    </div>
</div>

<div class="form-group row">
    {{ Form::label('apellidom', 'Apellido Materno :',['class' => 'col-md-4 col-form-label']) }}
    <div class="col-md-12">
        {{ Form::text('apellidom', null,['maxlength' => 100,'class' => 'form-control' . ($errors->has('apellidom') ? ' is-invalid' : ''), 'required' => 'required']) }}
        @if ($errors->has('apellidom'))
            <span class="invalid-feedback">{{ $errors->first('apellidom') }}</span>
        @endif
    </div>
</div>

<div class="form-group row">
    {{ Form::label('direccion', 'Dirección :',['class' => 'col-md-4 col-form-label']) }}
    <div class="col-md-12">
        {{ Form::text('direccion', null, ['maxlength' => 50,'class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'required' => 'required']) }}
        @if ($errors->has('direccion'))
            <span class="invalid-feedback">{{ $errors->first('direccion') }}</span>
        @endif
    </div>
</div>

<div class="form-group row">
    {{ Form::label('nacionalidad_id', 'Nacionalidad :',['class' => 'col-md-4 col-form-label']) }}
    {{-- Form::text('nacionalidad_id', null, [ 'class' => 'form-control']) --}}
    <div class="col-md-12">
        {{ Form::select('nacionalidad_id', $nacionalidad_id, null, array('class'=>'form-control'  . ($errors->has('nacionalidad_id') ? ' is-invalid' : ''),
            'placeholder'=>'Seleccione Nacionalidad...', 'required' => 'required')) }}
        @if ($errors->has('nacionalidad_id'))
            <span class="invalid-feedback">{{ $errors->first('nacionalidad_id') }}</span>
        @endif
    </div>
</div>

<div class="form-group row">
    {{ Form::label('telefono', 'Teléfono :',['class' => 'col-md-4 col-form-label']) }}
    <div class="col-md-12">
        {{ Form::text('telefono', null, [ 'maxlength' => 9, 'class' => 'form-control'. ($errors->has('telefono') ? ' is-invalid' : ''), 'required' => 'required']) }}
        @if ($errors->has('telefono'))
            <span class="invalid-feedback">{{ $errors->first('telefono') }}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-3 mx-auto ">
        {{ Form::submit('Guardar', [ 'class' => 'btn btn-primary']) }}
    </div>
</div>
