@extends('layouts.app')

@section('template_title')
    {{ $facilidadesYServiciosGeneral->name ?? 'Show Facilidades Y Servicios General' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Facilidades Y Servicios General</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('facilidades-y-servicios-generals.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Facilidad Y Servicio General:</strong>
                            {{ $facilidadesYServiciosGeneral->Facilidad_y_Servicio_general }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
