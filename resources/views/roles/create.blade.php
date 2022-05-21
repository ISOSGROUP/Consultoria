@extends('layouts.app')

@section('content')
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Lista</li>
      <li class="breadcrumb-item">
        <a href="#">roles</a>
      </li>
      <li class="breadcrumb-item active">Nuevo</li>
    </ol>
    
 


     <div class="container-fluid">
          <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Crear</strong>
                            </div>
                            <div class="card-body">
                               
                                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                           <strong>Nombre:</strong>
                                           {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control','required'=>"required")) !!}
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                         <strong>permisos:</strong>
                                         <br/>
                                         <br/>
                                   <label  class="form-label">Menus</label>
                                   <br/>
                                         @foreach($permissions as $value)
                                            @if($value->type == "m")       

                                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                 {{ $value->name }}</label>
                                                <br/>

                                            @endif                                       

                                         @endforeach
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <br/>
                                    <label for="permissions" class="form-label">Folders</label>

                                    </div>

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
                                        @foreach($folders as $permission)

                                            @if($permission->name == "Archivos_Compartidos")

                                                <tr>
                                                <td>{{ $permission->name }}</td>
                                                <td>
                                                    <input type="checkbox"
                                                    onclick="return false" 
                                                    name="values[{{ $permission->name.' view_files' }}]"
                                                    class='permission'
                                                    checked
                                                     >
                                                </td>
                                                <td>
                                                
                                                    <input type="checkbox" 
                                                    name="values[{{ $permission->name.' upload_files' }}]"
                                                    onclick="return false" 
                                                    class='permission'
                                                     >
                                                </td>
                                                <td>
                                                    <input type="checkbox" 
                                                    onclick="return false" 
                                                    name="values[{{ $permission->name.' download_files' }}]"
                                                    class='permission'
                                                     >
                                                </td>
                                                <td>
                                                    <input type="checkbox" 
                                                    name="values[{{ $permission->name.' delete_files' }}]"
                                                    class='permission'
                                                     >
                                                </td>
                                                <td>
                                                    <input type="checkbox" 
                                                    name="values[{{ $permission->name.' rename_files' }}]"
                                                    class='permission'
                                                     >
                                                </td>
                                                <td>
                                                    <input type="checkbox" 
                                                    name="values[{{ $permission->name.' create_folders' }}]"
                                                    class='permission'
                                                     >
                                                </td>

                                                </tr>
                                            @else

                                                    <tr>
                                                        <td>{{ $permission->name }}</td>
                                                        <td>
                                                            <input type="checkbox" 
                                                            name="values[{{ $permission->name.' view_files' }}]"
                                                            class='permission'
                                                            >
                                                        </td>
                                                        <td>
                                                        
                                                            <input type="checkbox" 
                                                            name="values[{{ $permission->name.' upload_files' }}]"
                                                            class='permission'
                                                            >
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" 
                                                            name="values[{{ $permission->name.' download_files' }}]"
                                                            class='permission'
                                                            >
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" 
                                                            name="values[{{ $permission->name.' delete_files' }}]"
                                                            class='permission'
                                                            >
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" 
                                                            name="values[{{ $permission->name.' rename_files' }}]"
                                                            class='permission'
                                                            >
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" 
                                                            name="values[{{ $permission->name.' create_folders' }}]"
                                                            class='permission'
                                                            >
                                                        </td>

                                                    </tr>
                                                @endif
                                            @endforeach

                                    </table>
                                    <br/>
                                    <br/>


                                     <div class="col-xs-12 col-sm-12 col-md-12">
                                         <button type="submit" class="btn btn-primary">Guardar</button>
                                         <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
                                     </div>

                                   



                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
