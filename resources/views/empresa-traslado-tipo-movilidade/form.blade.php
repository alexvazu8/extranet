<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            
            {{ Form::label('Empresa_traslado_Id_Empresa_traslado') }}
            {{ Form::select('Empresa_traslado_Id_Empresa_traslado', $empresaTraslado,$empresaTrasladoTipoMovilidade->Empresa_traslado_Id_Empresa_traslado, ['class' => 'form-control' . ($errors->has('Empresa_traslado_Id_Empresa_traslado') ? ' is-invalid' : ''), 'placeholder' => 'Id Empresa Traslado']) }}
            {!! $errors->first('Empresa_traslado_Id_Empresa_traslado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo_movilidad_Id_tipo_movilidad') }}
            {{ Form::select('Tipo_movilidad_Id_tipo_movilidad', $tipoMovilidades,$empresaTrasladoTipoMovilidade->Tipo_movilidad_Id_tipo_movilidad, ['class' => 'form-control' . ($errors->has('Tipo_movilidad_Id_tipo_movilidad') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Movilidad Id Tipo Movilidad']) }}
            {!! $errors->first('Tipo_movilidad_Id_tipo_movilidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Numero_max_pasajeros') }}
            {{ Form::text('Numero_max_pasajeros', $empresaTrasladoTipoMovilidade->Numero_max_pasajeros, ['class' => 'form-control' . ($errors->has('Numero_max_pasajeros') ? ' is-invalid' : ''), 'placeholder' => 'Numero Max Pasajeros']) }}
            {!! $errors->first('Numero_max_pasajeros', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Numero_minimo_pasajeros') }}
            {{ Form::text('Numero_minimo_pasajeros', $empresaTrasladoTipoMovilidade->Numero_minimo_pasajeros, ['class' => 'form-control' . ($errors->has('Numero_minimo_pasajeros') ? ' is-invalid' : ''), 'placeholder' => 'Numero Minimo Pasajeros']) }}
            {!! $errors->first('Numero_minimo_pasajeros', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Marca_modelo') }}
            {{ Form::text('Marca_modelo', $empresaTrasladoTipoMovilidade->Marca_modelo, ['class' => 'form-control' . ($errors->has('Marca_modelo') ? ' is-invalid' : ''), 'placeholder' => 'Marca Modelo']) }}
            {!! $errors->first('Marca_modelo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Maletas_maximo') }}
            {{ Form::text('Maletas_maximo', $empresaTrasladoTipoMovilidade->Maletas_maximo, ['class' => 'form-control' . ($errors->has('Maletas_maximo') ? ' is-invalid' : ''), 'placeholder' => 'Maletas Maximo']) }}
            {!! $errors->first('Maletas_maximo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad_movilidades') }}
            {{ Form::text('Cantidad_movilidades', $empresaTrasladoTipoMovilidade->Cantidad_movilidades, ['class' => 'form-control' . ($errors->has('Cantidad_movilidades') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Movilidades']) }}
            {!! $errors->first('Cantidad_movilidades', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>