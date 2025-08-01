@extends('layouts.app')

@section('template_title')
    Create Tours Contrato Cupo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Tours Contrato Cupo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tours-contrato-cupos.store_rango') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tours-contrato-cupo.form_rango')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
