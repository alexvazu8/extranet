<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Facilidad_y_Servicio_general') }}
            {{ Form::text('Facilidad_y_Servicio_general', $facilidadesYServiciosGeneral->Facilidad_y_Servicio_general, ['class' => 'form-control' . ($errors->has('Facilidad_y_Servicio_general') ? ' is-invalid' : ''), 'placeholder' => 'Facilidad Y Servicio General']) }}
            {!! $errors->first('Facilidad_y_Servicio_general', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>