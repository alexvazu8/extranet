@extends('layouts.app')

@section('template_title')
    {{ $tipoHabitacionGeneral->name ?? 'Show Tipo Habitacion General' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tipo Habitacion General</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipo-habitacion-generals.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre General Habitacion:</strong>
                            {{ $tipoHabitacionGeneral->Nombre_general_Habitacion }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Adultos:</strong>
                            {{ $tipoHabitacionGeneral->Cantidad_Adultos }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Menores:</strong>
                            {{ $tipoHabitacionGeneral->Cantidad_Menores }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
