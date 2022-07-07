@extends('layouts.app')

@section('content')
 
<ol class="breadcrumb">
    <li class="breadcrumb-item">Perfil</li>
    </li>
    <li class="breadcrumb-item active">Editar</li>
</ol>


<div class="container-fluid">
          <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Editar</strong>
                            </div>
                            <div class="card-body">

                              {!! Form::model($user, ['method' => 'PATCH','route' => ['myPerfil.update', $user->id]]) !!}

                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">

                                            <strong>Nombre:</strong>

                                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">

                                            <strong>Apellidos:</strong>

                                            {!! Form::text('surnames', null, array('placeholder' => 'Apellidos','class' => 'form-control')) !!}

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">

                                            <strong>Telefono:</strong>

                                            {!! Form::text('phone', null, array('placeholder' => 'Telefono','class' => 'form-control')) !!}

                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Email:</strong>

                                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>contraseña:</strong>

                                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Confirmar contraseña:</strong>

                                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}

                                        </div>
                                    </div>
                              

                              <div class="col-xs-12 col-sm-12 col-md-12">
                                
                               </br>

                                <button type="submit" class="btn btn-primary">Guardar</button>
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