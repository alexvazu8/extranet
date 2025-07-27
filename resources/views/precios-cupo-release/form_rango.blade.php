<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Costo_habitacion') }}
            {{ Form::text('Costo_habitacion', $preciosCupoRelease->Costo_habitacion, ['class' => 'form-control' . ($errors->has('Costo_habitacion') ? ' is-invalid' : ''), 'placeholder' => 'Costo Habitacion']) }}
            {!! $errors->first('Costo_habitacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Release_habitacion') }}
            {{ Form::text('Release_habitacion', $preciosCupoRelease->Release_habitacion, ['class' => 'form-control' . ($errors->has('Release_habitacion') ? ' is-invalid' : ''), 'placeholder' => 'Release Habitacion']) }}
            {!! $errors->first('Release_habitacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cupo_habitacion') }}
            {{ Form::text('Cupo_habitacion', $preciosCupoRelease->Cupo_habitacion, ['class' => 'form-control' . ($errors->has('Cupo_habitacion') ? ' is-invalid' : ''), 'placeholder' => 'Cupo Habitacion']) }}
            {!! $errors->first('Cupo_habitacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo_habitacion_hotel') }}
            {{ Form::select('Tipo_habitacion_hotel_id_tipo_habitacion_hotel', $tipoHabitacionHotel->pluck('Nombre_Habitacion', 'id'), $tipoHabitacionHotel->first()->id, ['class' => 'form-control' . ($errors->has('Tipo_habitacion_hotel_id_tipo_habitacion_hotel') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Habitacion Hotel Id Tipo Habitacion Hotel']) }}
            {!! $errors->first('Tipo_habitacion_hotel_id_tipo_habitacion_hotel', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha_Desde') }}
            <?php  $fecha_hoy=date('Y/m/d') ?>
            {{ Form::date('Fecha_de', $fecha_hoy, ['class' => 'form-control' . ($errors->has('Fecha_de') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Desde']) }}
            {!! $errors->first('Fecha_de', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha_Hasta') }}
            {{ Form::date('Fecha_hasta', "", ['class' => 'form-control' . ($errors->has('Fecha_hasta') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Hasta']) }}
            {!! $errors->first('Fecha_hasta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Politica_Cancelacion') }}
            {{ Form::select('politica_id', $politicaCancelacion->pluck('Nombre_Politica', 'id'),$preciosCupoRelease->politica_id, ['class' => 'form-control' . ($errors->has('politica_id') ? ' is-invalid' : ''), 'placeholder' => 'politica_id']) }}
            {!! $errors->first('politica_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('regimen_id') }}
            {{ Form::select('regimen_id', $regimen->pluck('nombre_regimen', 'id'), $preciosCupoRelease->regimen_id, ['class' => 'form-control' . ($errors->has('regimen_id') ? ' is-invalid' : ''), 'placeholder' => 'Regimen Id']) }}
            {!! $errors->first('regimen_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>