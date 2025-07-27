@extends('layouts.app')

@section('template_title')
    Update Hotel Facilidades Y Servicio
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Hotel Facilidades Y Servicio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('hotel-facilidades-y-servicios.update', $hotelFacilidadesYServicio->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('hotel-facilidades-y-servicio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
