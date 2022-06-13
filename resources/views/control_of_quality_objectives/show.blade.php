@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('controlOfQualityObjectives.index') }}">Control Of Quality Objectives</a>
            </li>
            <li class="breadcrumb-item active">Detalle</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>Details</strong>
                                  <a href="{{ route('controlOfQualityObjectives.index') }}" class="btn btn-light">Atrás</a>
                             </div>
                             <div class="card-body">
                                 @include('control_of_quality_objectives.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
