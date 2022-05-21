@if(!empty($errors))
    @if($errors->any())
        <ul class="alert alert-danger" style="list-style-type: none">
            <strong>¡Ups!</strong> Hubo algunos problemas con tu entrada.<br><br>
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    @endif
@endif
