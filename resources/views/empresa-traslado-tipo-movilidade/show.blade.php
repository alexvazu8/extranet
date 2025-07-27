@extends('layouts.app')

@section('template_title')
    {{ $empresaTrasladoTipoMovilidade->name ?? 'Show Empresa Traslado Tipo Movilidade' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Empresa Traslado Tipo Movilidade</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empresa-traslado-tipo-movilidades.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empresa Traslado Id Empresa Traslado:</strong>
                            {{ $empresaTrasladoTipoMovilidade->Empresa_traslado_Id_Empresa_traslado }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Movilidad Id Tipo Movilidad:</strong>
                            {{ $empresaTrasladoTipoMovilidade->Tipo_movilidad_Id_tipo_movilidad }}
                        </div>
                        <div class="form-group">
                            <strong>Numero Max Pasajeros:</strong>
                            {{ $empresaTrasladoTipoMovilidade->Numero_max_pasajeros }}
                        </div>
                        <div class="form-group">
                            <strong>Numero Minimo Pasajeros:</strong>
                            {{ $empresaTrasladoTipoMovilidade->Numero_minimo_pasajeros }}
                        </div>
                        <div class="form-group">
                            <strong>Marca Modelo:</strong>
                            {{ $empresaTrasladoTipoMovilidade->Marca_modelo }}
                        </div>
                        <div class="form-group">
                            <strong>Maletas Maximo:</strong>
                            {{ $empresaTrasladoTipoMovilidade->Maletas_maximo }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Movilidades:</strong>
                            {{ $empresaTrasladoTipoMovilidade->Cantidad_movilidades }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
