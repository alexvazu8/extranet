@extends('layouts.app')

@section('template_title')
    Create Tipo Habitacion Hotel
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Tipo Habitacion Hotel</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tipo-habitacion-hotels.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tipo-habitacion-hotel.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
