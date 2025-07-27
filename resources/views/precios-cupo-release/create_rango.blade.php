@extends('layouts.app')

@section('template_title')
    Create Precios Cupo Release
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Precios Cupo y Release</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('precios-cupo-releases.store_rango') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('precios-cupo-release.form_rango')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
