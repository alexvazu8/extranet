@extends('layouts.app')

@section('template_title')
    Update Facilidades Y Servicios General
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Facilidades Y Servicios General</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('facilidades-y-servicios-generals.update', $facilidadesYServiciosGeneral->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('facilidades-y-servicios-general.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
