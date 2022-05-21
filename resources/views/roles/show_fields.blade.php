<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{{ $role->name }}</p>
</div>

 
<!-- permission Field -->
<div class="lead">
    {!! Form::label('name', 'permisos:') !!}
    @if(!empty($rolePermissions))
        @foreach($rolePermissions as $permission)
            <label class="badge badge-success">{{ $permission->name }}</label>
        @endforeach
    @endif
</div>
 
 

