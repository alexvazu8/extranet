@extends('layouts.app')

@section('template_title')
    Create Facilidades Y Servicios General
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Facilidades Y Servicios General</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('facilidades-y-servicios-generals.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('facilidades-y-servicios-general.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
