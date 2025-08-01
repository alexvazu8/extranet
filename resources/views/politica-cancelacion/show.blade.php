@extends('layouts.app')

@section('template_title')
    {{ $politicaCancelacion->name ?? 'Show Politica Cancelacion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Politica Cancelacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('politica-cancelacions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Politica:</strong>
                            {{ $politicaCancelacion->Nombre_Politica }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
