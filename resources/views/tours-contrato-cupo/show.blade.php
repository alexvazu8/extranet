@extends('layouts.app')

@section('template_title')
    {{ $toursContratoCupo->name ?? 'Show Tours Contrato Cupo' }}
@endsection

@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tours Contrato Cupo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tours-contrato-cupos.index',$toursContratoCupo->Tours_id) }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                         <div class="form-group">
                            <strong>Cantidad Adultos:</strong>
                            {{ $toursContratoCupo->Cantidad_adultos }}
                        </div>
                        
                        <div class="form-group">
                            <strong>Costo Adulto:</strong>
                            {{ $toursContratoCupo->Costo_adulto }}
                        </div>
                         <div class="form-group">
                            <strong>Cantidad Menores:</strong>
                            {{ $toursContratoCupo->Cantidad_menores }}
                        </div>                        
                        <div class="form-group">
                            <strong>Costo Menor:</strong>
                            {{ $toursContratoCupo->Costo_menor }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Disponible:</strong>
                            {{ $toursContratoCupo->Fecha_disponible }}
                        </div>
                        <div class="form-group">
                            <strong>Costo Total:</strong>
                            @php
                            $total=$toursContratoCupo->Cantidad_adultos*$toursContratoCupo->Costo_adulto+$toursContratoCupo->Cantidad_menores*$toursContratoCupo->Costo_menor;
                            @endphp
                            {{ $total }}
                        </div>
                        <div class="form-group">
                            <strong>Cupo:</strong>
                            {{ $toursContratoCupo->Cupo }}
                        </div>
                        <div class="form-group">
                            <strong>Release:</strong>
                            {{ $toursContratoCupo->Release }}
                        </div>
                        <div class="form-group">
                            <strong>Cierre:</strong>
                            @php
                                if ($toursContratoCupo->cierre == 0) {
                                    echo "NO";
                                } else {
                                    echo "SI";
                                }
                            @endphp
                           
                        </div>
                        <div class="form-group">
                            <strong>Tours :</strong>
                            {{  $tour=$toursContratoCupo->find($toursContratoCupo->id,'Tours_id')->tour->Nombre_tour }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
