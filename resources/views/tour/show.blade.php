@extends('layouts.app')

@section('template_title')
    {{ $tour->name ?? 'Show Tour' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tour</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tours.index') }}"> Back</a>
                            <a class="btn btn-primary btn-success" href="{{ route('tours.edit',$tour->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                            <a class="btn btn-primary" href="{{ route('fotos-tours.index') }}"> Fotos</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @php 
                        $fotos=$tour->fotosTours;
                        @endphp

                        <div class="form-group">
                            <strong>Nombre Tour:</strong>
                            {{ $tour->Nombre_tour }}
                        </div>
                        
                         <div class="form-group">
                         @if($tour->Foto_tours)
                             <!-- Imagen con borde redondeado y sombra -->
                            <img class="img-fluid rounded shadow" width="300" src="{{ asset('storage/' . $tour->Foto_tours) }}" alt="Foto del tour" width="150">
                         @endif
                         </div>
                         @foreach ($fotos as $foto)
                         <div class="form-group">
                            <div class="form-group">
                                 <strong>{{ $foto->nombre_foto_tour }}</strong>
                               
                            </div>
                           
                             <!-- Imagen con borde redondeado y sombra -->
                             <img class="img-fluid rounded shadow" style="width: 200px;" src="{{ asset('storage/' . $foto->url_foto_tour) }}" alt="Foto del tour">
                        </div>
                        @endforeach
                       
                        <div class="form-group">
                            <strong>Detalle Tour:</strong>
                            {!! $tour->Detalle_tour !!}
                        </div>
                        <div class="form-group">
                            <strong>Recojo Hotel:</strong>
                            {{ $tour->Recojo_hotel }}
                        </div>
                        <div class="form-group">
                            <strong>Punto Encuentro:</strong>
                            {{ $tour->Punto_encuentro }}
                        </div>
                        <div class="form-group">
                            <strong>Horario Inicio:</strong>
                            {{ $tour->Horario_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Fin:</strong>
                            {{ $tour->Hora_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Entregan Agua:</strong>
                            {{ $tour->Entregan_agua }}
                        </div>
                        <div class="form-group">
                            <strong>Para Discapacitados:</strong>
                            {{ $tour->Para_discapacitados }}
                        </div>
                        <div class="form-group">
                            <strong>Con Bano:</strong>
                            {{ $tour->Con_bano }}
                        </div>
                        <div class="form-group">
                            <strong>Pais Id Pais:</strong>
                            {{ $tour->Pais_Id_Pais }}
                        </div>
                        <div class="form-group">
                            <strong>Ciudad Id Ciudad:</strong>
                            {{ $tour->Ciudad_Id_Ciudad }}
                        </div>
                        <div class="form-group">
                            <strong>Zona Id Zona:</strong>
                            {{ $tour->Zona_Id_Zona }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
