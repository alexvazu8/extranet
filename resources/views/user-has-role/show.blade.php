@extends('layouts.app')

@section('template_title')
    {{ $userHasRole->name ?? 'Show User Has Role' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show User Has Role</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('user-has-roles.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Role Id:</strong>
                            {{ $userHasRole->role_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $userHasRole->user_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
