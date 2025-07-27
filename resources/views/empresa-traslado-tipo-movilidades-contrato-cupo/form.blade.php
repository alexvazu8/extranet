<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Cantidad_adultos') }}
            {{ Form::number('Cantidad_adultos', $empresaTrasladoTipoMovilidadesContratoCupo->Cantidad_adultos, ['class' => 'form-control' . ($errors->has('Cantidad_adultos') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Adultos']) }}
            {!! $errors->first('Cantidad_adultos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad_menores') }}
            {{ Form::number('Cantidad_menores', $empresaTrasladoTipoMovilidadesContratoCupo->Cantidad_menores, ['class' => 'form-control' . ($errors->has('Cantidad_menores') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Menores']) }}
            {!! $errors->first('Cantidad_menores', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Costo_adulto') }}
            {{ Form::number('Costo_adulto', $empresaTrasladoTipoMovilidadesContratoCupo->Costo_adulto, ['class' => 'form-control' . ($errors->has('Costo_adulto') ? ' is-invalid' : ''), 'placeholder' => 'Costo Adulto','step' => '0.01']) }}
            {!! $errors->first('Costo_adulto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Costo_menor') }}
            {{ Form::number('Costo_menor', $empresaTrasladoTipoMovilidadesContratoCupo->Costo_menor,['class' => 'form-control' . ($errors->has('Costo_menor') ? ' is-invalid' : ''), 'placeholder' => 'Costo Menor','step' => '0.01']) }}
            {!! $errors->first('Costo_menor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Edad_menor') }}
            {{ Form::number('Edad_menor', $empresaTrasladoTipoMovilidadesContratoCupo->Edad_menor, ['class' => 'form-control' . ($errors->has('Edad_menor') ? ' is-invalid' : ''), 'placeholder' => 'Edad Menor']) }}
            {!! $errors->first('Edad_menor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha_disponible') }}
            {{ Form::date('Fecha_disponible', $empresaTrasladoTipoMovilidadesContratoCupo->Fecha_disponible, ['class' => 'form-control' . ($errors->has('Fecha_disponible') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Disponible']) }}
            {!! $errors->first('Fecha_disponible', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cupo') }}
            {{ Form::number('Cupo', $empresaTrasladoTipoMovilidadesContratoCupo->Cupo, ['class' => 'form-control' . ($errors->has('Cupo') ? ' is-invalid' : ''), 'placeholder' => 'Cupo']) }}
            {!! $errors->first('Cupo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Release') }}
            {{ Form::number('Release', $empresaTrasladoTipoMovilidadesContratoCupo->Release, ['class' => 'form-control' . ($errors->has('Release') ? ' is-invalid' : ''), 'placeholder' => 'Release']) }}
            {!! $errors->first('Release', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cierre') }}
            {{ Form::select('cierre', [0 => 'No', 1 => 'Sí'],$empresaTrasladoTipoMovilidadesContratoCupo->cierre, ['class' => 'form-control' . ($errors->has('cierre') ? ' is-invalid' : ''), 'placeholder' => 'Cierre']) }}
            {!! $errors->first('cierre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_inicio_atencion') }}
            {{ Form::time('hora_inicio_atencion', $empresaTrasladoTipoMovilidadesContratoCupo->hora_inicio_atencion, ['class' => 'form-control' . ($errors->has('hora_inicio_atencion') ? ' is-invalid' : ''), 'placeholder' => 'Hora Inicio Atencion']) }}
            {!! $errors->first('hora_inicio_atencion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_final_atencion') }}
            {{ Form::time('hora_final_atencion', $empresaTrasladoTipoMovilidadesContratoCupo->hora_final_atencion, ['class' => 'form-control' . ($errors->has('hora_final_atencion') ? ' is-invalid' : ''), 'placeholder' => 'Hora Final Atencion']) }}
            {!! $errors->first('hora_final_atencion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <?php 
            if(isset($empresa_traslado_tm_Id)){$empresaTrasladoTipoMovilidadesContratoCupo->Empresa_traslado_tipo_movilidades_id=$empresa_traslado_tm_Id;}
            ?>
        <div class="form-group">
            {{ Form::label('Empresa_traslado_tipo_movilidades_id') }}
            {{ Form::select('Empresa_traslado_tipo_movilidades_id',$empresaTrasladoTipoMovilidade, $empresaTrasladoTipoMovilidadesContratoCupo->Empresa_traslado_tipo_movilidades_id, ['class' => 'form-control' . ($errors->has('Empresa_traslado_tipo_movilidades_id') ? ' is-invalid' : ''), 'placeholder' => 'Empresa Traslado Tipo Movilidades Id']) }}
            {!! $errors->first('Empresa_traslado_tipo_movilidades_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Servicio_traslado_Id') }}
            <?php 
            if(isset($idserviciotraslado)){$empresaTrasladoTipoMovilidadesContratoCupo->Servicio_traslado_Id=$idserviciotraslado;}
            ?>
            {{ Form::select('Servicio_traslado_Id',$ServicioTraslado, $empresaTrasladoTipoMovilidadesContratoCupo->Servicio_traslado_Id, ['class' => 'form-control' . ($errors->has('Servicio_traslado_Id') ? ' is-invalid' : ''), 'placeholder' => 'Servicio traslado']) }}
            {!! $errors->first('Servicio_traslado_Id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>