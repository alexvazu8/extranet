@extends('layouts.app2')

@section('template_title')
    {{ $preciosCupoRelease->name ?? 'Show Precios Cupo Release' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
               

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Costo Habitacion:</strong>
                            {{ $preciosCupoRelease->Costo_habitacion }}
                        </div>
                        <div class="form-group">
                            <strong>Release Habitacion:</strong>
                            {{ $preciosCupoRelease->Release_habitacion }}
                        </div>
                        <div class="form-group">
                            <strong>Cupo Habitacion:</strong>
                            {{ $preciosCupoRelease->Cupo_habitacion }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Habitacion Hotel:</strong>
                            {{ $preciosCupoRelease->tipoHabitacionHotel->Nombre_Habitacion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Precio Cupo Release Noche:</strong>
                            {{ $preciosCupoRelease->Fecha_precio_cupo_release_noche }}
                        </div>
                        <div class="form-group">
                            <strong>Cierre:</strong>
                             @if($preciosCupoRelease->Cierre==0)
                              NO
                             @else
                               SI
                             @endif
                           
                        </div>
                        <div class="form-group">
                            <strong>Politica :</strong>
                            {{ $preciosCupoRelease->politicaCancelacion->Nombre_Politica }}
                        </div>
                        <div class="form-group">
                            <strong>Regimen :</strong>
                            {{ $preciosCupoRelease->regimen->nombre_regimen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
