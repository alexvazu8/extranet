<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('permission_id') }}
            {{ Form::select('permission_id',$permiso->pluck('name','id'),$roleHasPermission->permission_id, ['class' => 'form-control' . ($errors->has('permission_id') ? ' is-invalid' : ''), 'placeholder' => 'Permission Id']) }}
            {!! $errors->first('permission_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('role_id') }}
            {{ Form::select('role_id',$role->pluck('name','id'), $roleHasPermission->role_id, ['class' => 'form-control' . ($errors->has('role_id') ? ' is-invalid' : ''), 'placeholder' => 'Role Id']) }}
            {!! $errors->first('role_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>