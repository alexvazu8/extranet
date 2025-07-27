@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Añadir Nuevo Hotel</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('hotels.index') }}"> Atras</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Hay algun problema con tu campo.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">

        <div class="row mb-3">
            <label for="Nombre_hotel" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del Hotel') }}</label>

            <div class="col-md-6">
                <input id="Nombre_hotel" type="text" class="form-control @error('Nombre_hotel') is-invalid @enderror" name="Nombre_hotel" value="{{ old('Nombre_hotel') }}" required autocomplete="Nombre_hotel">

                @error('Nombre_hotel')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="Estrellas" class="col-md-4 col-form-label text-md-end">{{ __('Estrellas') }}</label>

            <div class="col-md-6">

                <select id="estrellas_id" class="form-control @error('estrellas_id') is-invalid @enderror" name="estrellas_id" required autocomplete="estrellas_id">
                    <option value="">{{__('Seleccione Estrellas') }}</option>
                    @foreach($estrellas as $linea)
                    <option value="{{$linea->id}}">{{$linea->estrellas}}{{$linea->tipo_categoria}}</option>
                    @endforeach
                </select>
                @error('estrellas_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="Numero_identificacion_tributaria" class="col-md-4 col-form-label text-md-end">{{ __('Numero identificacion tributaria Hotel') }}</label>

            <div class="col-md-6">
                <input id="Numero_identificacion_tributaria" type="number" class="form-control @error('Numero_identificacion_tributaria') is-invalid @enderror" name="Numero_identificacion_tributaria" value="{{ old('Numero_identificacion_tributaria') }}" required autocomplete="Numero_identificacion_tributaria">

                @error('Numero_identificacion_tributaria')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="Direccion_Hotel" class="col-md-4 col-form-label text-md-end">{{ __('Direccion Hotel') }}</label>

            <div class="col-md-6">
                <input id="Direccion_Hotel" type="text" class="form-control @error('Direccion_Hotel') is-invalid @enderror" name="Direccion_Hotel" value="{{ old('Direccion_Hotel') }}" required autocomplete="Direccion_Hotel">

                @error('Direccion_Hotel')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="Telefono_reservas_hotel" class="col-md-4 col-form-label text-md-end">{{ __('Telefono Reservas Hotel') }}</label>

            <div class="col-md-6">
                <input id="Telefono_reservas_hotel" type="number" class="form-control @error('Telefono_reservas_hotel') is-invalid @enderror" name="Telefono_reservas_hotel" value="{{ old('Telefono_reservas_hotel') }}" required autocomplete="Telefono_reservas_hotel">

                @error('Telefono_reservas_hotel')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="Cel_reservas_hotel" class="col-md-4 col-form-label text-md-end">{{ __('Cel Reservas Hotel') }}</label>

            <div class="col-md-6">
                <input id="Cel_reservas_hotel" type="number" class="form-control @error('Cel_reservas_hotel') is-invalid @enderror" name="Cel_reservas_hotel" value="{{ old('Cel_reservas_hotel') }}" required autocomplete="Cel_reservas_hotel">

                @error('Cel_reservas_hotel')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email_reservas_hotel" class="col-md-4 col-form-label text-md-end">{{ __('Email Reservas Hotel') }}</label>

            <div class="col-md-6">
                <input id="email_reservas_hotel" type="email" class="form-control @error('email_reservas_hotel') is-invalid @enderror" name="email_reservas_hotel" value="{{ old('email_reservas_hotel') }}" required autocomplete="email_reservas_hotel">

                @error('email_reservas_hotel')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email_comercial_hotel" class="col-md-4 col-form-label text-md-end">{{ __('Email Comercial Hotel') }}</label>

            <div class="col-md-6">
                <input id="email_comercial_hotel" type="email" class="form-control @error('email_comercial_hotel') is-invalid @enderror" name="email_comercial_hotel" value="{{ old('email_comercial_hotel') }}" required autocomplete="email_comercial_hotel">

                @error('email_comercial_hotel')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="Pais" class="col-md-4 col-form-label text-md-end">{{ __('Pais Hotel') }}</label>

            <div class="col-md-6">

                <select id="Id_Pais" class="form-control @error('Id_Pais') is-invalid @enderror" name="Id_Pais" value="{{ old('Id_Pais') }}" required autocomplete="Id_Pais">
                    <option value="">{{__('Seleccione Pais') }}</option>
                    @foreach($Paises as $linea)
                    <option value="{{$linea->Id_Pais}}">{{$linea->Nombre_Pais}}</option>
                    @endforeach
                </select>
                @error('Id_Pais')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="Ciudad" class="col-md-4 col-form-label text-md-end">{{ __('Ciudad Hotel') }}</label>

            <div class="col-md-6">

                <select id="Id_Ciudad" class="form-control @error('Id_Ciudad') is-invalid @enderror" name="Id_Ciudad" required autocomplete="Id_Ciudad">
                    <option value="">{{__('Seleccione Ciudad') }}</option>

                </select>
                @error('Id_Ciudad')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="Zona" class="col-md-4 col-form-label text-md-end">{{ __('Zona Hotel') }}</label>

            <div class="col-md-6">

                <select id="Id_Zona" class="form-control @error('Id_Ciudad') is-invalid @enderror" name="Id_Zona" required autocomplete="Id_Zona">
                    <option value="">{{__('Seleccione Zona') }}</option>

                </select>
                @error('Id_Zona')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            {{ Form::label('Foto_Principal_Hotel') }}
            <div class="col-md-6">
                {{ Form::file('Foto_Principal_Hotel') }}
                {!! $errors->first('Foto_Principal_Hotel', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            
        </div>

    </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Crear</button>
            
        </div>
    </div>
   

</form>


@endsection