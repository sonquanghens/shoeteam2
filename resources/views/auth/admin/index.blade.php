@extends('auth.admin.layouts.admin_master')
@section('content')
  <div id="page-inner">
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-lg-3 col-md-6">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-users fa-5x"></i>
                              </div>

                              <div class="col-xs-9 text-right">
                                  <div class="huge"></div>
                                  <div style="margin-top: 20px;">Sản Phẩm Ưa Thích!</div>
                              </div>
                          </div>
                      </div>
                      <a href="#">
                          <div class="panel-footer">
                              <span class="pull-left">View Details</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="panel panel-green">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-tasks fa-5x"></i>
                              </div>
                              <?php $product = App\Product::where('count','>',0)->get(); ?>
                              <div class="col-xs-9 text-right">
                                  <div class="huge">{{ count($product) }}</div>
                                  <div style="margin-top: 20px;">Sản phẩm ưa thích!</div>
                              </div>
                          </div>
                      </div>
                      <a href="{{url('/admin/product/list_top_product')}}">
                          <div class="panel-footer">
                              <span class="pull-left">View Details</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="panel panel-yellow">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-shopping-cart fa-5x"></i>
                              </div>
                              <?php $orders = App\Order::where('status','=', 1)->get(); ?>
                              <div class="col-xs-9 text-right">
                                  <div class="huge">{{ count($orders) }}</div>
                                  <div style="margin-top: 20px;">Đơn hàng mới!</div>
                              </div>
                          </div>
                      </div>
                      <a href="{{ url('/admin/order') }}">
                          <div class="panel-footer">
                              <span class="pull-left">View Details</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="panel panel-red">
                      <div class="panel-heading">
                          <div class="row">
                              <div class="col-xs-3">
                                  <i class="fa fa-support fa-5x"></i>
                              </div>
                            <?php $order = App\Order::where('status','=', 2)->get(); ?>
                              <div class="col-xs-9 text-right">
                                  <div class="huge">{{ count($order) }}</div>
                                  <div style="margin-top: 20px;">Đơn hàng đã xử lý!</div>
                              </div>
                          </div>
                      </div>
                      <a href="{{ url('/admin/order/cancel') }}">
                          <div class="panel-footer">
                              <span class="pull-left">View Details</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
            <div class="col-md-3">
              <h3>Thống kê hàng năm :</h3>
            </div>
            <div class="col-md-9" style="margin-top:20px;">
              {!! Form::open(['url' => '/admin/chart','method' => 'get']) !!}
              {!! Form::select('date',$date,null, ['class' => 'form-control date']) !!}
              {!! Form::submit('Thống Kê', ['class' => 'btn btn-primary']) !!}
              {!! Form::close() !!}
            </div>
            <div class="col-md-12">
                {!! $chart->html() !!}
            </div>

          </div>
          {!! Charts::scripts() !!}
          {!! $chart->script() !!}
      </div>

  <!-- /. PAGE INNER  -->
  </div>


@stop
