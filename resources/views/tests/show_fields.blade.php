<!-- String Field -->
<div class="form-group">
    {!! Form::label('string', 'String:') !!}
    <p>{{ $test->string }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $test->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $test->updated_at }}</p>
</div>

