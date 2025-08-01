@extends('layouts.app')

@section('template_title')
    {{ $regimen->name ?? 'Show Regimen' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Regimen</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('regimens.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Regimen:</strong>
                            {{ $regimen->nombre_regimen }}
                        </div>
                        <div class="form-group">
                            <strong>Codigo Regimen:</strong>
                            {{ $regimen->codigo_regimen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
