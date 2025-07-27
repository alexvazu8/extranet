<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre_empresa_traslado') }}
            {{ Form::text('Nombre_empresa_traslado', $empresaTraslado->Nombre_empresa_traslado, ['class' => 'form-control' . ($errors->has('Nombre_empresa_traslado') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Empresa Traslado']) }}
            {!! $errors->first('Nombre_empresa_traslado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion_empresa') }}
            {{ Form::text('Descripcion_empresa', $empresaTraslado->Descripcion_empresa, ['class' => 'form-control' . ($errors->has('Descripcion_empresa') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Empresa']) }}
            {!! $errors->first('Descripcion_empresa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Celular_Emergencia') }}
            {{ Form::text('Celular_Emergencia', $empresaTraslado->Celular_Emergencia, ['class' => 'form-control' . ($errors->has('Celular_Emergencia') ? ' is-invalid' : ''), 'placeholder' => 'Celular Emergencia']) }}
            {!! $errors->first('Celular_Emergencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Telefono_Oficina') }}
            {{ Form::text('Telefono_Oficina', $empresaTraslado->Telefono_Oficina, ['class' => 'form-control' . ($errors->has('Telefono_Oficina') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Oficina']) }}
            {!! $errors->first('Telefono_Oficina', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email_empresa_traslados') }}
            {{ Form::text('email_empresa_traslados', $empresaTraslado->email_empresa_traslados, ['class' => 'form-control' . ($errors->has('email_empresa_traslados') ? ' is-invalid' : ''), 'placeholder' => 'Email Empresa Traslados']) }}
            {!! $errors->first('email_empresa_traslados', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>