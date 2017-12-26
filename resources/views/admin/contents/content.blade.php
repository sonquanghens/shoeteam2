@extends('admin.layouts.admin_master')
@section('content')
  <div id="page-inner">
      <div class="row">
          <div class="col-md-12">
              <h1 class="page-head-line">DASHBOARD</h1>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <div class="alert alert-info">
                {!! Form::open(['url' => '/add','files' => true ]) !!}
                   @include('admin.pratials.forms.branch')
               {!! Form::close() !!}
              </div>
          </div>
      </div>

  <!-- /. PAGE INNER  -->
  </div>
@stop
