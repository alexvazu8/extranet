<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Hotel_Id_Hotel') }}
            {{ Form::text('Hotel_Id_Hotel', $hotelFacilidadesYServicio->Hotel_Id_Hotel, ['class' => 'form-control' . ($errors->has('Hotel_Id_Hotel') ? ' is-invalid' : ''), 'placeholder' => 'Hotel Id Hotel']) }}
            {!! $errors->first('Hotel_Id_Hotel', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('facilidades_y_servicios_generales_Id_facilidad_y_servicio_genera') }}
            {{ Form::text('facilidades_y_servicios_generales_Id_facilidad_y_servicio_genera', $hotelFacilidadesYServicio->facilidades_y_servicios_generales_Id_facilidad_y_servicio_genera, ['class' => 'form-control' . ($errors->has('facilidades_y_servicios_generales_Id_facilidad_y_servicio_genera') ? ' is-invalid' : ''), 'placeholder' => 'Facilidades Y Servicios Generales Id Facilidad Y Servicio Genera']) }}
            {!! $errors->first('facilidades_y_servicios_generales_Id_facilidad_y_servicio_genera', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('costo') }}
            {{ Form::text('costo', $hotelFacilidadesYServicio->costo, ['class' => 'form-control' . ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'Costo']) }}
            {!! $errors->first('costo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('moneda') }}
            {{ Form::text('moneda', $hotelFacilidadesYServicio->moneda, ['class' => 'form-control' . ($errors->has('moneda') ? ' is-invalid' : ''), 'placeholder' => 'Moneda']) }}
            {!! $errors->first('moneda', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('texto_facilidad') }}
            {{ Form::text('texto_facilidad', $hotelFacilidadesYServicio->texto_facilidad, ['class' => 'form-control' . ($errors->has('texto_facilidad') ? ' is-invalid' : ''), 'placeholder' => 'Texto Facilidad']) }}
            {!! $errors->first('texto_facilidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>