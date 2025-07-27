@extends('layouts.app')

@section('template_title')
    {{ $hotelFacilidadesYServicio->name ?? 'Show Hotel Facilidades Y Servicio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Hotel Facilidades Y Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('hotel-facilidades-y-servicios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Hotel Id Hotel:</strong>
                            {{ $hotelFacilidadesYServicio->Hotel_Id_Hotel }}
                        </div>
                        <div class="form-group">
                            <strong>Facilidades Y Servicios Generales Id Facilidad Y Servicio Genera:</strong>
                            {{ $hotelFacilidadesYServicio->facilidades_y_servicios_generales_Id_facilidad_y_servicio_genera }}
                        </div>
                        <div class="form-group">
                            <strong>Costo:</strong>
                            {{ $hotelFacilidadesYServicio->costo }}
                        </div>
                        <div class="form-group">
                            <strong>Moneda:</strong>
                            {{ $hotelFacilidadesYServicio->moneda }}
                        </div>
                        <div class="form-group">
                            <strong>Texto Facilidad:</strong>
                            {{ $hotelFacilidadesYServicio->texto_facilidad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
