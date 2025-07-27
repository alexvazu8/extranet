<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre_Grupo_Fotos') }}
            {{ Form::text('Nombre_Grupo_Fotos', $grupoFotosHotel->Nombre_Grupo_Fotos, ['class' => 'form-control' . ($errors->has('Nombre_Grupo_Fotos') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Grupo Fotos']) }}
            {!! $errors->first('Nombre_Grupo_Fotos', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>