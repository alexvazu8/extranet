@extends('layouts.app')

@section('template_title')
    {{ $fotosHotel->name ?? 'Show Fotos Hotel' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Fotos Hotel</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('fotos-hotels.indexhotel',$Hotel_Id_Hotel) }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Foto Hotel:</strong>
                            {{ $fotosHotel->Nombre_Foto_Hotel }}
                        </div>
                        <div class="form-group">
                            <strong>Foto Hotel:</strong>
                            <img width="300" src="{{ asset('storage/' . $fotosHotel->Foto_Hotel) }}" alt="Foto del hotel">
                           
                        </div>
                        <div class="form-group">
                            <strong>Hotel Id Hotel:</strong>
                            {{ $fotosHotel->Hotel_Id_Hotel }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
