<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
           
            {{ Form::hidden('Id_Zona', $zona->Id_Zona, ['class' => 'form-control' . ($errors->has('Id_Zona') ? ' is-invalid' : ''), 'placeholder' => 'Id Zona']) }}
            {!! $errors->first('Id_Zona', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre_Zona') }}
            {{ Form::text('Nombre_Zona', $zona->Nombre_Zona, ['class' => 'form-control' . ($errors->has('Nombre_Zona') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Zona']) }}
            {!! $errors->first('Nombre_Zona', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Ciudad_Id_Ciudad') }}
            
            <select id="Ciudad_Id_Ciudad" class="form-control @error('Ciudad_Id_Ciudad') is-invalid @enderror" name="Ciudad_Id_Ciudad" value="{{ old('Ciudad_Id_Ciudad') }}" required autocomplete="Ciudad_Id_Ciudad">
                    <option value="">{{__('Seleccione Ciudad') }}</option>
                    @foreach($Ciudades as $linea2)
                    <option value="{{$linea2->Id_Ciudad}}" <?php if($zona->Ciudad_Id_Ciudad==$linea2->Id_Ciudad){echo "selected";} ?>  >{{$linea2->Nombre_Ciudad}}</option>
                    @endforeach
            </select>
            {!! $errors->first('Ciudad_Id_Ciudad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>