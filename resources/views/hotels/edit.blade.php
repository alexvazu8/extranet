@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('hotels.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Hay algunos problemas con el input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('hotels.update',$hotel) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre Hotel:</strong>
                <input type="text" name="Nombre_hotel" value="{{ $hotel->Nombre_Hotel }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="Estrellas" class="form-group">{{ __('Estrellas') }}</label>

            <div class="col-md-6">

                <select id="estrellas_id" class="form-control @error('estrellas_id') is-invalid @enderror" name="estrellas_id" required autocomplete="estrellas_id">
                    <option value="">{{__('Seleccione Estrellas') }}</option>
                    @foreach($estrellas as $linea)
                    <option value="{{$linea->id}}" <?php if($hotel->estrellas_id==$linea->id){?> selected <?php } ?>>{{$linea->estrellas}}{{$linea->tipo_categoria}}</option>
                    @endforeach
                </select>
                @error('estrellas_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 ">
            <div class="form-group">
                <strong>NIT/NIF:</strong>
                <input type="text" name="Numero_identificacion_tributaria" value="{{ $hotel->Numero_identificacion_tributaria }}" class="form-control" placeholder="Numero_identificacion_tributaria">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('Direccion Hotel') }}</strong>
                <input id="Direccion_Hotel" type="text" class="form-control @error('Direccion_Hotel') is-invalid @enderror" name="Direccion_Hotel" value="{{ $hotel->Direccion_Hotel }}" required autocomplete="Direccion_Hotel">

                @error('Direccion_Hotel')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('Telefono Reservas Hotel') }}</strong>
                <input id="Telefono_reservas_hotel" type="number" class="form-control @error('Telefono_reservas_hotel') is-invalid @enderror" name="Telefono_reservas_hotel" value="{{ $hotel->Telefono_reservas_hotel }}" required autocomplete="Telefono_reservas_hotel">

                @error('Telefono_reservas_hotel')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>{{ __('Cel Reservas Hotel') }}</strong>

           
                <input id="Cel_reservas_hotel" type="number" class="form-control @error('Cel_reservas_hotel') is-invalid @enderror" name="Cel_reservas_hotel" value="{{ $hotel->Cel_reservas_hotel }}" required autocomplete="Cel_reservas_hotel">

                @error('Cel_reservas_hotel')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="class="col-xs-12 col-sm-12 col-md-12"">
        <div class="form-group">
            <strong>{{ __('Email Reservas Hotel') }}</strong>

            
                <input id="email_reservas_hotel" type="email" class="form-control @error('email_reservas_hotel') is-invalid @enderror" name="email_reservas_hotel" value="{{ $hotel->email_reservas_hotel }}" required autocomplete="email_reservas_hotel">

                @error('email_reservas_hotel')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="class="col-xs-12 col-sm-12 col-md-12"">
        <div class="form-group">
            <strong>{{ __('Email Comercial Hotel') }}</strong>

            
                <input id="email_comercial_hotel" type="email" class="form-control @error('email_comercial_hotel') is-invalid @enderror" name="email_comercial_hotel" value="{{ $hotel->email_comercial_hotel }}" required autocomplete="email_comercial_hotel">

                @error('email_comercial_hotel')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="class="col-xs-12 col-sm-12 col-md-12"">
        <div class="form-group">
            <strong>{{ __('Pais Hotel') }}</strong>

            

                <select id="Id_Pais" class="form-control @error('Id_Pais') is-invalid @enderror" name="Id_Pais" value="{{ old('Id_Pais') }}" required autocomplete="Id_Pais">
                    <option value="">{{__('Seleccione Pais') }}</option>
                    @foreach($Paises as $linea) 
                    <option value="{{$linea->Id_Pais}}" <?php  if((integer)($hotel->Pais_Id_Pais)===(integer)($linea->Id_Pais)){ echo "selected"; } ?>> {{$linea->Nombre_Pais}}</option>
                    @endforeach
                </select>
                @error('Id_Pais')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="class="col-xs-12 col-sm-12 col-md-12"">
        <div class="form-group">
            <strong>{{ __('Ciudad Hotel') }}</strong>

                <select id="Id_Ciudad" class="form-control @error('Id_Ciudad') is-invalid @enderror" name="Id_Ciudad" autocomplete="Id_Ciudad">
                    <option value="">{{__('Seleccione Ciudad') }}</option>
                    @foreach($ciudades as $ciudad) 
                    <option value="{{$ciudad->Id_Ciudad}}" <?php  if((integer)($hotel->ciudad_Id_ciudad)===(integer)($ciudad->Id_Ciudad)){ echo "selected"; } ?>> {{$ciudad->Nombre_Ciudad}}</option>
                    @endforeach
                   

                </select>
                @error('Id_Ciudad')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('Zona Hotel') }}</strong>

                <select id="Id_Zona" class="form-control @error('Id_Ciudad') is-invalid @enderror" name="Id_Zona"  autocomplete="Id_Zona">
                    <option value="">{{__('Seleccione Zona') }}</option>
                    @foreach($zonas as $zona) 
                    <option value="{{$zona->Id_Zona}}" <?php  if((integer)($hotel->Zona_Id_Zona)===(integer)($zona->Id_Zona)){ echo "selected"; } ?>> {{$zona->Nombre_Zona}}</option>
                    @endforeach

                </select>
                @error('Id_Zona')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('Descripcion Hotel') }}</strong>
            <textarea id="Descripcion_Hotel"  class="form-control @error('Descripcion_Hotel') is-invalid @enderror" name="Descripcion_Hotel" required autocomplete="Descripcion_Hotel" rows="4" cols="50">
                {{ $hotel->Descripcion_Hotel }}
            </textarea>
            @error('Descripcion_Hotel')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
               
        </div>
        </div>        


        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>    {{ Form::label('Foto_Principal_Hotel') }}  </strong> 
            
                {{ Form::file('Foto_Principal_Hotel') }}
                {!! $errors->first('Foto_Principal_Hotel', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="form-group">
             <button type="submit" class="btn btn-primary">Editar</button>
            </div> 
        </div>
    </div>

</form>

@endsection