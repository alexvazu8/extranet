@extends('layouts.app')

@section('template_title')
    Update User Has Role
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update User Has Role</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user-has-roles.update', $userHasRole->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('user-has-role.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
