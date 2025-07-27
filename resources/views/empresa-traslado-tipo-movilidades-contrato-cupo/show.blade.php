@extends('layouts.app')

@section('template_title')
    {{ $empresaTrasladoTipoMovilidadesContratoCupo->name ?? 'Show Empresa Traslado Tipo Movilidades Contrato Cupo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Empresa Traslado Tipo Movilidades Contrato Cupo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('etmcc.index',[$empresaTrasladoTipoMovilidadesContratoCupo->Empresa_traslado_tipo_movilidades_id,$empresaTrasladoTipoMovilidadesContratoCupo->Servicio_traslado_Id]) }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cantidad Adultos:</strong>
                            {{ $empresaTrasladoTipoMovilidadesContratoCupo->Cantidad_adultos }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Menores:</strong>
                            {{ $empresaTrasladoTipoMovilidadesContratoCupo->Cantidad_menores }}
                        </div>
                        <div class="form-group">
                            <strong>Costo Adulto:</strong>
                            {{ $empresaTrasladoTipoMovilidadesContratoCupo->Costo_adulto }}
                        </div>
                        <div class="form-group">
                            <strong>Costo Menor:</strong>
                            {{ $empresaTrasladoTipoMovilidadesContratoCupo->Costo_menor }}
                        </div>
                        <div class="form-group">
                            <strong>Edad Menor:</strong>
                            {{ $empresaTrasladoTipoMovilidadesContratoCupo->Edad_menor }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Disponible:</strong>
                            {{ $empresaTrasladoTipoMovilidadesContratoCupo->Fecha_disponible }}
                        </div>
                        <div class="form-group">
                            <strong>Cupo:</strong>
                            {{ $empresaTrasladoTipoMovilidadesContratoCupo->Cupo }}
                        </div>
                        <div class="form-group">
                            <strong>Release:</strong>
                            {{ $empresaTrasladoTipoMovilidadesContratoCupo->Release }}
                        </div>
                        <div class="form-group">
                            <strong>Cierre:</strong>
                            {{ $empresaTrasladoTipoMovilidadesContratoCupo->cierre }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Inicio Atencion:</strong>
                            {{ $empresaTrasladoTipoMovilidadesContratoCupo->hora_inicio_atencion }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Final Atencion:</strong>
                            {{ $empresaTrasladoTipoMovilidadesContratoCupo->hora_final_atencion }}
                        </div>
                        <div class="form-group">
                            <strong>Empresa Traslado Tipo Movilidades Id:</strong>
                            {{ $empresaTrasladoTipoMovilidadesContratoCupo->Empresa_traslado_tipo_movilidades_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
