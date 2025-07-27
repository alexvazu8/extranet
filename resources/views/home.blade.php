@extends('layouts.app')

@section('content')
     @if(0)
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('hotels.index') }}">Hoteles</a>
                <a class="btn btn-success" href="{{ route('empresa-traslado-tipo-movilidades.index') }}">Transfer</a>
                <a class="btn btn-success" href="{{ route('tours.index') }}">Tours</a>
            </div>
    @endif
            @if(session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Hoteles, Traslados y Tours') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __(' Estas logeado.') }}
                    <div class="card" style="width: 40%;">
                        <img src="{{ asset('/imagen/Hotel_and_taxi_gray.jpg') }}" class="card-img-top" alt="Extranet">
                        <div class="card-body">
                            <h5 class="card-title">Extranet para Hoteles, Traslados y Tours</h5>
                            <p class="card-text">AUMENTE LA OCUPACIÓN Y VENTAS CON ACCESO A UN MERCADO GLOBAL DE CLIENTES DE ALTO VALOR
                        Nuestra escala incomparable significa que ahora puede llegar a una red en constante expansión de 60.000 operadores turísticos, agentes de viajes, aerolíneas y esquemas de lealtad y puntos.</p>
                           
                        </div>
                    </div>
                 
                   



                </div>
            </div>
        </div>
    </div>
</div>
@endsection