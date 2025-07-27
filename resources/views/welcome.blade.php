@extends('layouts.app')
@section('content')
<div class="card" style="width: 40%;">
  <img src="{{ asset('/imagen/hotel.jpg') }}" class="card-img-top" alt="Extranet">
  <div class="card-body">
    <h5 class="card-title">Extranet para Hoteles</h5>
    <p class="card-text">AUMENTE LA OCUPACIÓN CON ACCESO A UN MERCADO GLOBAL DE CLIENTES DE ALTO VALOR
Nuestra escala incomparable significa que ahora puede llegar a una red en constante expansión de 60.000 operadores turísticos, agentes de viajes, aerolíneas y esquemas de lealtad y puntos.</p>
    <a href="{{ route('register') }}" class="btn btn-primary">Registrar</a>
  </div>
</div>

@endsection