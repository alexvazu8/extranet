@extends('layouts.app')

@section('template_title')
    {{ $grupoFotosHotel->name ?? 'Show Grupo Fotos Hotel' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Grupo Fotos Hotel</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('grupo-fotos-hotels.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Grupo Fotos:</strong>
                            {{ $grupoFotosHotel->Nombre_Grupo_Fotos }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
