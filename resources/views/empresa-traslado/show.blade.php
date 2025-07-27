@extends('layouts.app')

@section('template_title')
    {{ $empresaTraslado->name ?? 'Show Empresa Traslado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Empresa Traslado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empresa-traslados.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Empresa Traslado:</strong>
                            {{ $empresaTraslado->Nombre_empresa_traslado }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion Empresa:</strong>
                            {{ $empresaTraslado->Descripcion_empresa }}
                        </div>
                        <div class="form-group">
                            <strong>Celular Emergencia:</strong>
                            {{ $empresaTraslado->Celular_Emergencia }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono Oficina:</strong>
                            {{ $empresaTraslado->Telefono_Oficina }}
                        </div>
                        <div class="form-group">
                            <strong>Email Empresa Traslados:</strong>
                            {{ $empresaTraslado->email_empresa_traslados }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
