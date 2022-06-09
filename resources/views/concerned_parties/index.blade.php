@extends('layouts.app')

@section('content')
    

    <ol class="breadcrumb">
      <li class="breadcrumb-item">Lista</li>
      <li class="breadcrumb-item">
        <a href="#">Concerned Parties</a>
      </li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             
                             <a class="pull-right" href="{{ route('ConcernedParties.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body">
                             @include('concerned_parties.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>


    <div class="form-group form-implementer-risks-chance">
        <form action="{{route('userConcernedParties.save')}}" method="post">
            @csrf
            <div class="form-group">
                <label>Nombre:</label>
                
                <input type="text" style="display:none;"name="id" id="user_id" value="{{ $user[0]->id}}"class="form-control" placeholder="Name">

                <select name="user" id="user" class="form-control">
                        @foreach($users as $key => $value)

                            @if($value->name == $user[0]->name)
                                <option value="{{ $value->name }}" selected>{{ $value->name }}</option>
                            @else 
                                <option value="{{ $value->name }}">{{ $value->name }}</option>
                            @endif

                        @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>fecha:</label>
                <div class='input-group' >
                    <input  type='text'  readonly name="date" value="{{ $user[0]->date}}" class="form-control" id='datetimepicker1' />
                </div>
            </div>

            @can('cambiar fecha en apartado partes interesadas')

                <script>
                    document.getElementById("datetimepicker1").removeAttribute("readonly");
                </script>

            @endcan

            

            <div class="form-group">
                <button class="btn btn-success btn-submit">actualizar</button>
            </div>

        </form>
    </div>


@endsection

