@extends('layouts.app')

@section('template_title')
    {{ $reserva->name ?? 'Show Reserva' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Reserva</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reservas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Tipo Reserva:</strong>
                            {{ $reserva->tipo_reserva }}
                        </div>
                        <div class="form-group">
                            <strong>Localizador:</strong>
                            {{ $reserva->Localizador }}
                        </div>
                        <div class="form-group">
                            <strong>Importe Reserva:</strong>
                            {{ $reserva->Importe_Reserva }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Cliente:</strong>
                            {{ $reserva->Nombre_Cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Numero Adultos:</strong>
                            {{ $reserva->Numero_Adultos }}
                        </div>
                        <div class="form-group">
                            <strong>Numero Menores:</strong>
                            {{ $reserva->Numero_menores }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario:</strong>
                            {{ $usuario->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email Contacto Reserva:</strong>
                            {{ $reserva->Email_contacto_reserva }}
                        </div>
                        <div class="form-group">
                            <strong>Comentarios:</strong>
                            {{ $reserva->Comentarios }}
                        </div>
                        <?php //print_r($detalleReservas);?>
                        @foreach($detalleReservas as $detalle)
                        <div class="form-group">
                            <strong>Fecha In:</strong>
                            {{ $detalle->Fecha_in }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha In:</strong>
                            {{ $detalle->Fecha_out }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Servicio:</strong>
                            {{ $detalle->Precio_Servicio }}
                        </div>
                        <div class="form-group">
                            <strong>Costo:</strong>
                            {{ $detalle->Costo_servicio }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Adultos:</strong>
                            {{ $detalle->Numero_Adultos }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Menores:</strong>
                            {{ $detalle->Numero_menores }}
                        </div>
                            
                        <div class="form-group">
                            <strong>Tour:</strong>
                            {{ $detalle->tour->Nombre_tour }}
                        </div>
                        <div class="form-group">
                            
                            <img width="300" src="data:png;base64,{{@base64_encode($detalle->tour->Foto_tours)}}"> 
                        </div>
                        <div class="form-group">
                            <strong>Recojo del hotel:</strong>
                            {{ $detalle->tour->Recojo_hotel }}
                        </div>
                        <div class="form-group">
                            <strong>Punto de Punto_encuentro:</strong>
                            {{ $detalle->tour->Punto_encuentro }}
                        </div>
                        <div class="form-group">
                            <strong>Dias:</strong>
                            {{ $detalle->tour->cantidad_dias_tour }}
                        </div>
                        <div class="form-group">
                            <strong>Noches:</strong>
                            {{ $detalle->tour->cantidad_noches_tour }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Inicio:</strong>
                            {{ $detalle->tour->Horario_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Fin:</strong>
                            {{ $detalle->tour->Hora_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Agua:</strong>
                            {{ $detalle->tour->Entregan_agua }}
                        </div>
                        <div class="form-group">
                            <strong>Discapacitados:</strong>
                            {{ $detalle->tour->Para_discapacitados }}
                        </div>
                        <div class="form-group">
                            <strong>Baño:</strong>
                            {{ $detalle->tour->Con_bano }}
                        </div>
                        <div class="form-group">
                            <strong>Pais:</strong>
                            {{ $detalle->tour->paise->Nombre_Pais }}
                        </div>
                        <div class="form-group">
                            <strong>Ciudad:</strong>
                            {{ $detalle->tour->ciudade->Nombre_Ciudad }}
                        </div>

                            

                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
