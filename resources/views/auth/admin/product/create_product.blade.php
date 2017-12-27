@extends('auth.admin.layouts.admin_master')
@section('content')
  <div id="page-inner">
      <div class="row">
          <div class="col-md-12">
              <h1 class="page-head">Product <small>Create</small></h1>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
                {!! Form::open(['url' => '/admin/product/add','files' => true]) !!}
                   @include('auth.admin.pratials.forms.product')
               {!! Form::close() !!}
          </div>
      </div>

  <!-- /. PAGE INNER  -->
  </div>


@stop
