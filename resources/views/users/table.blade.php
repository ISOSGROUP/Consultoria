<div class="table-responsive-sm">



<table class="table table-striped" >
 <tr>
  
   <th>Nombre</th>
   <th>Email</th>
   <th>Rol</th>
   <th width="280px">acción</th>
 </tr>
 @foreach ($users as $user)
  <tr>
   
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
              {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
              {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>
</div>

         