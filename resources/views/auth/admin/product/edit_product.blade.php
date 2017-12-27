@extends('auth.admin.layouts.admin_master')
@section('content')
  <div id="page-inner">
      <div class="row">
          <div class="col-md-12">
              <h1 class="page-head">Product <small>Edit</small></h1>

          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
                {!! Form::model($product,['url' => '/admin/product'.'/'.$product->id,'method' => 'put']) !!}
                   @include('auth.admin.pratials.forms.product')
               {!! Form::close() !!}
          </div>
      </div>

  <!-- /. PAGE INNER  -->
  </div>


@stop
