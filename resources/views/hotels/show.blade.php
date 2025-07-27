@extends('layouts.app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> 
                {{ $hotel->Nombre_Hotel }}
                @if($hotel->estrella->estrellas==1 && $hotel->estrella->tipo_categoria=='E')<img src="{{ asset('/imagen/star.png') }}" title="estrella">@endif
                @if($hotel->estrella->estrellas==2 && $hotel->estrella->tipo_categoria=='E')<img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella">@endif
                @if($hotel->estrella->estrellas==3 && $hotel->estrella->tipo_categoria=='E')<img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella">@endif
                @if($hotel->estrella->estrellas==4 && $hotel->estrella->tipo_categoria=='E')<img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella">@endif
                @if($hotel->estrella->estrellas==5 && $hotel->estrella->tipo_categoria=='E')<img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella">@endif
                @if($hotel->estrella->estrellas==1 && $hotel->estrella->tipo_categoria=='L')<span>&#128273;</span>@endif
                @if($hotel->estrella->estrellas==2 && $hotel->estrella->tipo_categoria=='L')<span>&#128273;</span><span>&#128273;</span>@endif
                @if($hotel->estrella->estrellas==3 && $hotel->estrella->tipo_categoria=='L')<span>&#128273;</span><span>&#128273;</span><span>&#128273;</span>@endif
                @if($hotel->estrella->estrellas==4 && $hotel->estrella->tipo_categoria=='L')<span>&#128273;</span><span>&#128273;</span><span>&#128273;</span><span>&#128273;</span>@endif
                @if($hotel->estrella->estrellas==5 && $hotel->estrella->tipo_categoria=='L')<span>&#128273;</span><span>&#128273;</span><span>&#128273;</span><span>&#128273;</span><span>&#128273;</span>@endif
                </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('hotels.index') }}"> Volver</a>
                <a class="btn btn-primary" href="{{ route('hotels.edit',$hotel) }}">Editar</a>
                <a class="btn btn-primary" href="{{ route('hotel-facilidades-y-servicios.buscar_por_hotel',$hotel->Id_Hotel) }}">Facilidades y Servicios</a>
                <a class="btn btn-primary" href="{{ route('tipo-habitacion-hotels.index2',$hotel->Id_Hotel) }}">Habitaciones</a>
                <a class="btn btn-primary" href="{{ route('hotels.editcoordenadas',$hotel->Id_Hotel) }}">Coordenadas</a>
                <a class="btn btn-primary" href="{{ route('fotos-hotels.indexhotel',$hotel->Id_Hotel) }}">Fotos</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre de Hotel:</strong>
              
                {{ $hotel->Nombre_Hotel }}
                @if($hotel->estrella->estrellas==1 && $hotel->estrella->tipo_categoria=='E')<img src="{{ asset('/imagen/star.png') }}" title="estrella">@endif
                @if($hotel->estrella->estrellas==2 && $hotel->estrella->tipo_categoria=='E')<img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella">@endif
                @if($hotel->estrella->estrellas==3 && $hotel->estrella->tipo_categoria=='E')<img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella">@endif
                @if($hotel->estrella->estrellas==4 && $hotel->estrella->tipo_categoria=='E')<img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella">@endif
                @if($hotel->estrella->estrellas==5 && $hotel->estrella->tipo_categoria=='E')<img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella"><img src="{{ asset('/imagen/star.png') }}" title="estrella">@endif
                @if($hotel->estrella->estrellas==1 && $hotel->estrella->tipo_categoria=='L')<span>&#128273;</span>@endif
                @if($hotel->estrella->estrellas==2 && $hotel->estrella->tipo_categoria=='L')<span>&#128273;</span><span>&#128273;</span>@endif
                @if($hotel->estrella->estrellas==3 && $hotel->estrella->tipo_categoria=='L')<span>&#128273;</span><span>&#128273;</span><span>&#128273;</span>@endif
                @if($hotel->estrella->estrellas==4 && $hotel->estrella->tipo_categoria=='L')<span>&#128273;</span><span>&#128273;</span><span>&#128273;</span><span>&#128273;</span>@endif
                @if($hotel->estrella->estrellas==5 && $hotel->estrella->tipo_categoria=='L')<span>&#128273;</span><span>&#128273;</span><span>&#128273;</span><span>&#128273;</span><span>&#128273;</span>@endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                            
                         @if ($hotel->Foto_Principal_Hotel)
                            <img src="{{ asset('storage/' . $hotel->Foto_Principal_Hotel) }}" alt="Foto del hotel" width="150">
                        @endif
                    </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nit/o Numero de Id Tributaria:</strong>
                {{ $hotel->Numero_identificacion_tributaria }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Direccion Hotel:</strong>
                {{ $hotel->Direccion_Hotel }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefono de Reserva:</strong>
                {{ $hotel->Telefono_reservas_hotel }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Celular de Reserva:</strong>
                {{ $hotel->Cel_reservas_hotel }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>E-Mail de Reserva:</strong>
                {{ $hotel->email_reservas_hotel }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>E-Mail Comercial del Hotel:</strong>
                {{ $hotel->email_comercial_hotel }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pais del Hotel:</strong>
                {{ $hotel->pais->Nombre_Pais }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ciudad del Hotel:</strong>
                {{ $hotel->ciudad->Nombre_Ciudad }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Zona del Hotel:</strong>
                {{ $hotel->zona->Nombre_Zona }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion del Hotel:</strong>
                {{ $hotel->Descripcion_Hotel }}
            </div>
        </div>
        <div class="form-group">
            <strong><label for="latitud">Latitud:{{ $hotel->Latitud }}</label></strong>
            <input type="hidden" name="Latitud" id="Latitud" value="{{ $hotel->Latitud }}" class="form-control" readonly>
        </div>
        <div class="form-group">
            <strong><label for="longitud">Longitud:{{ $hotel->Longitud }}</label> </strong>
            <input type="hidden" name="Longitud" id="Longitud" value="{{ $hotel->Longitud }}" class="form-control" readonly>
        </div>

        <div  class="col-xs-12 col-sm-12 col-md-12">
             <div id="map" style="width: 700px; height: 400px"></div>
        </div>
    </div>
@endsection

@section('scripts')
    
    <script>
        var latitudInput = document.getElementById('Latitud');
        var longitudInput = document.getElementById('Longitud');
       
        var map = L.map('map').setView([latitudInput.value, longitudInput.value], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(map);
        var marker = L.marker([latitudInput.value, longitudInput.value]).addTo(map);
        var circle = L.circle([latitudInput.value, longitudInput.value], {
         color: 'grey',
         fillColor: '#ECEC',
         fillOpacity: 0.5,
         radius: 30
         }).addTo(map);

    </script>
@endsection