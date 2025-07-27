<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre_tour') }}
            {{ Form::text('Nombre_tour', $tour->Nombre_tour, ['class' => 'form-control' . ($errors->has('Nombre_tour') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Tour','maxlength'=>80]) }}
            {!! $errors->first('Nombre_tour', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Email_contacto_tour') }}
            {{ Form::Email('Email_contacto_tour', $tour->Email_contacto_tour, ['class' => 'form-control' . ($errors->has('Email_contacto_tour') ? ' is-invalid' : ''), 'placeholder' => 'Email de Contacto','maxlength'=>320]) }}
            {!! $errors->first('Email_contacto_tour', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div  class="form-group">
            {{ Form::label('Foto_tours') }}
            <div class="col-md-6">
                {{ Form::file('Foto_tours') }}
                {!! $errors->first('Foto_tours', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            
        </div>
        <div class="form-group">
            {{ Form::label('Detalle_tour') }}
            {{ Form::textarea('Detalle_tour', $tour->Detalle_tour, ['class' => 'form-control' . ($errors->has('Detalle_tour') ? ' is-invalid' : ''), 'placeholder' => 'Detalle Tour']) }}
            {!! $errors->first('Detalle_tour', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Recojo_hotel') }}
            <select id="Recojo_hotel" class="form-control @error('Recojo_hotel') is-invalid @enderror" name="Recojo_hotel" value="{{ old('Recojo_hotel') }}" required autocomplete="Recojo_hotel">
                    <option value="0"  <?php if($tour->Recojo_hotel==0){echo "selected";} ?> > {{__('No') }}</option>
                    
                    <option value="1"<?php if($tour->Recojo_hotel==1){echo "selected";} ?> > {{__('Si') }}</option>
                    
                </select>
           
            {!! $errors->first('Recojo_hotel', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Punto_encuentro') }}
            {{ Form::text('Punto_encuentro', $tour->Punto_encuentro, ['class' => 'form-control' . ($errors->has('Punto_encuentro') ? ' is-invalid' : ''), 'placeholder' => 'Punto Encuentro']) }}
            {!! $errors->first('Punto_encuentro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad_dias_tour') }}
            {{ Form::number('cantidad_dias_tour', $tour->cantidad_dias_tour, ['class' => 'form-control' . ($errors->has('cantidad_dias_tour') ? ' is-invalid' : ''), 'placeholder' => 'cantidad_dias_tour']) }}
            {!! $errors->first('cantidad_dias_tour', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad_Noches_tour') }}
            {{ Form::number('cantidad_noches_tour', $tour->cantidad_noches_tour, ['class' => 'form-control' . ($errors->has('cantidad_noches_tour') ? ' is-invalid' : ''), 'placeholder' => 'cantidad_noches_tour']) }}
            {!! $errors->first('cantidad_noches_tour', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Horario_inicio') }}
            {{ Form::time('Horario_inicio', $tour->Horario_inicio, ['class' => 'form-control' . ($errors->has('Horario_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Horario Inicio']) }}
            {!! $errors->first('Horario_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Hora_fin') }}
            {{ Form::time('Hora_fin', $tour->Hora_fin, ['class' => 'form-control' . ($errors->has('Hora_fin') ? ' is-invalid' : ''), 'placeholder' => 'Hora Fin']) }}
            {!! $errors->first('Hora_fin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Entregan_agua') }}
                     
            <select id="Entregan_agua" class="form-control @error('Entregan_agua') is-invalid @enderror" name="Entregan_agua" value="{{ old('Entregan_agua') }}" required autocomplete="Entregan_agua">
                    <option value="0"  <?php if($tour->Entregan_agua==0){echo "selected";} ?> > {{__('No') }}</option>
                    
                    <option value="1"<?php if($tour->Entregan_agua==1){echo "selected";} ?> > {{__('Si') }}</option>
                    
                </select>

            {!! $errors->first('Entregan_agua', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Para_discapacitados') }}
           
            <select id="Para_discapacitados" class="form-control @error('Para_discapacitados') is-invalid @enderror" name="Para_discapacitados" value="{{ old('Para_discapacitados') }}" required autocomplete="Para_discapacitados">
                    <option value="0"  <?php if($tour->Para_discapacitados==0){echo "selected";} ?> > {{__('No') }}</option>
                    
                    <option value="1"<?php if($tour->Para_discapacitados==1){echo "selected";} ?> > {{__('Si') }}</option>
                    
                </select>

            {!! $errors->first('Para_discapacitados', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Con_bano') }} 
            <select id="Con_bano" class="form-control @error('Con_bano') is-invalid @enderror" name="Con_bano" value="{{ old('Con_bano') }}" required autocomplete="Con_bano">
                    <option value="0"  <?php if($tour->Con_bano==0){echo "selected";} ?> > {{__('No') }}</option>
                    
                    <option value="1"<?php if($tour->Con_bano==1){echo "selected";} ?> > {{__('Si') }}</option>
                    
                </select>

            {!! $errors->first('Con_bano', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
           
            <label for="Pais_Id_Pais">{{ __('Pais Hotel') }}</label>

                <select id="Pais_Id_Pais" class="form-control @error('Pais_Id_Pais') is-invalid @enderror" name="Pais_Id_Pais" value="{{ old('Pais_Id_Pais') }}" required autocomplete="Pais_Id_Pais">
                    <option value="">{{__('Seleccione Pais') }}</option>
                    @foreach($Paises as $linea)
                    <option value="{{$linea->Id_Pais}}" <?php if($tour->Pais_Id_Pais==$linea->Id_Pais){echo "selected";} ?>  >{{$linea->Nombre_Pais}}</option>
                    @endforeach
                </select>

                {!! $errors->first('Pais_Id_Pais', '<div class="invalid-feedback">:message</div>') !!} 
        </div>
        <div class="form-group">
            {{ Form::label('Ciudad_Id_Ciudad') }}
           
                <select id="Ciudad_Id_Ciudad" class="form-control @error('Ciudad_Id_Ciudad') is-invalid @enderror" name="Ciudad_Id_Ciudad" value="{{ old('Ciudad_Id_Ciudad') }}" required autocomplete="Ciudad_Id_Ciudad">
                    <option value="">{{__('Seleccione Ciudad') }}</option>
                    @foreach($Ciudades as $linea2)
                    <option value="{{$linea2->Id_Ciudad}}" <?php if($tour->Ciudad_Id_Ciudad==$linea2->Id_Ciudad){echo "selected";} ?>  >{{$linea2->Nombre_Ciudad}}</option>
                    @endforeach
                </select>
            {!! $errors->first('Ciudad_Id_Ciudad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Zona_Id_Zona') }}
           
                <select id="Zona_Id_Zona" class="form-control @error('Zona_Id_Zona') is-invalid @enderror" name="Zona_Id_Zona" value="{{ old('Zona_Id_Zona') }}" required autocomplete="Zona_Id_Zona">
                    <option value="">{{__('Seleccione Ciudad') }}</option>
                    @foreach($Zonas as $linea3)
                    <option value="{{$linea3->Id_Zona}}" <?php if($tour->Zona_Id_Zona==$linea3->Id_Zona){echo "selected";} ?>  >{{$linea3->Nombre_Zona}}</option>
                    @endforeach
                </select>
            {!! $errors->first('Zona_Id_Zona', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>