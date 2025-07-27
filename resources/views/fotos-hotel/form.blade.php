<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre_Foto_Hotel') }}
            {{ Form::text('Nombre_Foto_Hotel', $fotosHotel->Nombre_Foto_Hotel, ['class' => 'form-control' . ($errors->has('Nombre_Foto_Hotel') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Foto Hotel']) }}
            {!! $errors->first('Nombre_Foto_Hotel', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Foto_Hotel') }}
            {{ Form::file('Foto_Hotel') }}
            {!! $errors->first('Foto_Hotel', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
           
            {{ Form::hidden('Hotel_Id_Hotel', $Hotel_Id_Hotel, ['class' => 'form-control' . ($errors->has('Hotel_Id_Hotel') ? ' is-invalid' : ''), 'placeholder' => 'Hotel Id Hotel']) }}
            {!! $errors->first('Hotel_Id_Hotel', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Grupo_Foto_Hotel') }}
           
            
            {{ Form::select('grupo_fotos_id',$grupoFoto->pluck('Nombre_Grupo_Fotos', 'id'), $fotosHotel->grupo_fotos_id, ['class' => 'form-control' . ($errors->has('grupo_fotos_id') ? ' is-invalid' : ''), 'placeholder' => 'Grupo Fotos Hotel']) }}
            {!! $errors->first('grupo_fotos_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>