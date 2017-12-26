@extends('user.layouts.master')
@section('content')
<div class="container">
  <div id="content" class="space-top-none">
    <div class="main-content">
      <div class="space60">&nbsp;</div>
      <div class="row">
          <div class="col-sm-3">
            <ul class="aside-menu">
							  <li><strong>NHÃN HIỆU</strong></li>
                  @foreach($branch as $value)
                      <li style=" padding: 0px;  border-bottom: 0px;  list-style: circle;  margin-left: 30px;"><a href="{{ url('/products/branch/').'/'.$value->name }}"> {{ $value->name }}</a></li>
                  @endforeach
                <li><strong>GIÁ</strong></li>
            </ul>
          </div>
        <div class="col-sm-9">
          <div class="beta-products-list">
            <h4 style="margin-bottom: 20px;">KẾT QUẢ TÌM KIẾM : {{ $branch_name }} </h4>
            <div class="row" id="data">
                  @foreach($products as $value)
                    <div class="col-sm-3" >
                      <div class="single-item">
                        <div class="single-item-header">
                          <a href="{{ url('/products/').'/'.$value->id }}"><img src="/img/all1).jpg" alt=""></a>
                        </div>
                        <div class="single-item-body">
                          <p class="single-item-title">  <a href="{{ url('/products/').'/'.$value->id }}">{{ $value->name_product }} - {{ $value->branch->name }}</a></p>
                          <p class="single-item-price">
                            <span>{{ number_format($value->unit_price, 0, ',', '.') }}&nbsp; {{ $value->unit }}</span>
                          </p>
                        </div>
                        <div class="single-item-caption">
                          <a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
                          <a class="beta-btn primary" href="#">Đặt Hàng <i class="fa fa-chevron-right"></i></a>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                <div class="row">{{ $products->links() }}</div>

                <div class="space50">&nbsp;</div>
              </div>
            </div>
          </div> <!-- .beta-products-list -->
        </div>
      </div> <!-- end section with sidebar and main content -->
    </div> <!-- .main-content -->
  </div> <!-- #content -->
@stop

@section('script')

@stop
