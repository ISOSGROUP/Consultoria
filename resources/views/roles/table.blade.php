<div class="table-responsive-sm">



<table class="table table-striped" >
 <tr>
  
   <th>Codigo</th>
   <th>Nombre</th>
   <th width="280px">acción</th>
 </tr>
 @foreach ($roles as $key => $role)
  <tr>
   
    <td>{{ $role->id }}</td>
    <td>{{ $role->name }}</td>
    <td>
              {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('roles.show', [$role->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('roles.edit', [$role->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
              {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>
</div>

         