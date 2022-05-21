@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
      <li class="breadcrumb-item">Lista</li>
      <li class="breadcrumb-item">
        <a href="#">Roles</a>
      </li>
      <li class="breadcrumb-item active">Editar</li>
    </ol>


   

<div class="container-fluid">
          <div class="animated fadeIn">
          @include('message_errors.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Editar</strong>
                            </div>
                            <div class="card-body">
                              {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                                
                                <div class="form-group">
                                  <strong>Name:</strong>
                                  {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required'=>"required")) !!}
                                </div>
                                <div class="form-group">
                                  <strong>Permisos:</strong>
                                   <br/>
                                   <br/>
                                   <label  class="form-label">Menus</label>
                                   <br/>

                                   @foreach($permissions as $value)
                                        @if($value->type == "m")       
                                          <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissionsMenus) ? true : false, array('class' => 'name')) }}
                                          {{ $value->name }}</label>
                                          <br/>
                                        @endif                                       
                                    @endforeach

                                </div>

                                <label for="permissions" class="form-label">Folders</label>
                                <table class="table table-striped">
                                <thead>
                                    <th scope="col" width="3%">Name</th>
                                    <th scope="col" width="4%">view folder & archivos</th>
                                    <th scope="col" width="3%">subir</th> 
                                    <th scope="col" width="3%">descargar</th>
                                    <th scope="col" width="3%">eliminar</th> 
                                    <th scope="col" width="3%">renombrar</th> 
                                    <th scope="col" width="1%">crear carpetas</th> 
                                </thead>


                                @php
                                  $list;

                                @endphp

                                  @foreach($roleFolderPermissions as $permission)

                                      @if($permission->name == "Archivos_Compartidos")

                                            <tr>
                                            <td>{{ $permission->name }}</td>
                                            <td>
                                                <input type="checkbox"
                                                onclick="return false" 
                                                name="values[{{ $permission->name.' view_files' }}]"
                                                class='permission'
                                                {{ ($permission->view_files == true) 
                                                    ? 'checked'
                                                    : '' }}>
                                            </td>
                                            <td>
                                              
                                                <input type="checkbox" 
                                                name="values[{{ $permission->name.' upload_files' }}]"
                                                onclick="return false" 

                                                class='permission'
                                                {{ ($permission->upload_files == true) 
                                                    ? 'checked'
                                                    : '' }}>
                                            </td>
                                            <td>
                                                <input type="checkbox" 
                                                onclick="return false" 
                                                name="values[{{ $permission->name.' download_files' }}]"
                                                class='permission'
                                                {{ ($permission->download_files == true) 
                                                    ? 'checked'
                                                    : '' }}>
                                            </td>
                                            <td>
                                                <input type="checkbox" 
                                                name="values[{{ $permission->name.' delete_files' }}]"
                                                class='permission'
                                                {{ ($permission->delete_files == true) 
                                                    ? 'checked'
                                                    : '' }}>
                                            </td>
                                            <td>
                                                <input type="checkbox" 
                                                name="values[{{ $permission->name.' rename_files' }}]"
                                                class='permission'
                                                {{ ($permission->rename_files == true) 
                                                    ? 'checked'
                                                    : '' }}>
                                            </td>
                                            <td>
                                                <input type="checkbox" 
                                                name="values[{{ $permission->name.' create_folders' }}]"
                                                class='permission'
                                                {{ ($permission->create_folders == true) 
                                                    ? 'checked'
                                                    : '' }}>
                                            </td>

                                        </tr>
                                      @else

                                            <tr>
                                                <td>{{ $permission->name }}</td>
                                                <td>
                                                    <input type="checkbox" 
                                                    name="values[{{ $permission->name.' view_files' }}]"
                                                    class='permission'
                                                    {{ ($permission->view_files == true) 
                                                        ? 'checked'
                                                        : '' }}>
                                                </td>
                                                <td>
                                                  
                                                    <input type="checkbox" 
                                                    name="values[{{ $permission->name.' upload_files' }}]"
                                                    class='permission'
                                                    {{ ($permission->upload_files == true) 
                                                        ? 'checked'
                                                        : '' }}>
                                                </td>
                                                <td>
                                                    <input type="checkbox" 
                                                    name="values[{{ $permission->name.' download_files' }}]"
                                                    class='permission'
                                                    {{ ($permission->download_files == true) 
                                                        ? 'checked'
                                                        : '' }}>
                                                </td>
                                                <td>
                                                    <input type="checkbox" 
                                                    name="values[{{ $permission->name.' delete_files' }}]"
                                                    class='permission'
                                                    {{ ($permission->delete_files == true) 
                                                        ? 'checked'
                                                        : '' }}>
                                                </td>
                                                <td>
                                                    <input type="checkbox" 
                                                    name="values[{{ $permission->name.' rename_files' }}]"
                                                    class='permission'
                                                    {{ ($permission->rename_files == true) 
                                                        ? 'checked'
                                                        : '' }}>
                                                </td>
                                                <td>
                                                    <input type="checkbox" 
                                                    name="values[{{ $permission->name.' create_folders' }}]"
                                                    class='permission'
                                                    {{ ($permission->create_folders == true) 
                                                        ? 'checked'
                                                        : '' }}>
                                                </td>

                                            </tr>

                                          @endif

                                  @endforeach
                                </table>
                                  <br/>
                                  <br/>
                                  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                   <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
                                  </div>
                              
                              {!! Form::close() !!}
</div>
                        </div>
                    </div>
                </div>
           </div>
    </div>

 
@endsection
 