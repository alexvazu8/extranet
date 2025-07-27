<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('costo_regimen') }}
            {{ Form::number('costo_regimen', $regimenTipoHabitacionHotel->costo_regimen, ['class' => 'form-control' . ($errors->has('costo_regimen') ? ' is-invalid' : ''), 'placeholder' => 'Costo Regimen']) }}
            {!! $errors->first('costo_regimen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_tipo_habitacion_hotel') }}
          
            {{ Form::select('id_tipo_habitacion_hotel',[$lista_tipo_habitacion->id => $lista_tipo_habitacion->Nombre_Habitacion], $regimenTipoHabitacionHotel->id_tipo_habitacion_hotel, ['class' => 'form-control' . ($errors->has('id_tipo_habitacion_hotel') ? ' is-invalid' : ''), 'placeholder' => 'Id Tipo Habitacion Hotel']) }}
            {!! $errors->first('id_tipo_habitacion_hotel', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_regimen') }}
            {{ Form::select('id_regimen', collect($lista_regimenes)->pluck('nombre_regimen', 'id') ,$regimenTipoHabitacionHotel->id_regimen, ['class' => 'form-control' . ($errors->has('id_regimen') ? ' is-invalid' : ''), 'placeholder' => 'Id Regimen']) }}
            {!! $errors->first('id_regimen', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>