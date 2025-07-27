@extends('layouts.app')

@section('template_title')
    Update Coordenadas
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Coordenadas</span>
                    </div>
                    <div class="card-body">  
                    <?php //print_r($Hotel); ?>
                    {{ $Hotel->Nombre_Hotel }}
                    <form method="POST" action="{{ route('hotels.updatecoordenadas', $Hotel->Id_Hotel) }}"  role="form">
                    @csrf
                    @method('PUT')

                            @include('hotels.coordenadas')

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
