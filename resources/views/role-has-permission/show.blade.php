@extends('layouts.app')

@section('template_title')
    {{ $roleHasPermission->name ?? 'Show Role Has Permission' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Role Has Permission</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('role-has-permissions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Permission Id:</strong>
                            {{ $roleHasPermission->permission_id }}
                        </div>
                        <div class="form-group">
                            <strong>Role Id:</strong>
                            {{ $roleHasPermission->role_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
