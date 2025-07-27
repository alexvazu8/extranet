<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre_tipo_movilidad') }}
            {{ Form::text('Nombre_tipo_movilidad', $tipoMovilidade->Nombre_tipo_movilidad, ['class' => 'form-control' . ($errors->has('Nombre_tipo_movilidad') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Tipo Movilidad']) }}
            {!! $errors->first('Nombre_tipo_movilidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Foto_tipo_movilidad') }}
            {{ Form::file('Foto_tipo_movilidad') }}
            {!! $errors->first('Foto_tipo_movilidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>