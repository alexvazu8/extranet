@extends('layouts.app')

@section('template_title')
    Update Empresa Traslado Tipo Movilidades Contrato Cupo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Empresa Traslado Tipo Movilidades Contrato Cupo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('etmcc.update', $empresaTrasladoTipoMovilidadesContratoCupo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('empresa-traslado-tipo-movilidades-contrato-cupo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
