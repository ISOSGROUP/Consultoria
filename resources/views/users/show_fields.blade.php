<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Role Field -->
<div class="form-group">
    {!! Form::label('role', 'Role:') !!}
    <p>{{ $userRole[0]->name }}</p>
</div>

 
 

