@extends('user.layouts.master')
@section('content')
<div class="container">
  <div id="content" class="space-top-none">
    <div class="main-content">
      <div class="space60">&nbsp;</div>
      <div class="row">
          <div class="col-sm-3">
            <div class="form-group">
              <div class="col-md-12">
                <p style="font-size: 16px;font-weight: bold;  margin-bottom: 10px;  padding-bottom: 10px;">LỌC THEO</p>
              </div>
              <div class="col-md-12">
                <a href="{{url('/products/sale/allproduct')}}"><p style="font-size: 14px;font-weight: bold;  margin-bottom: 10px;  padding-bottom: 10px;">ON SALE</p></a>
              </div>
            </div>
            <div class="form-group" >
              <div class="col-md-12" style="margin-bottom: 15px;">
                <p style="font-size: 16px;font-weight: bold; border-bottom: 1px solid gray;  margin-bottom: 10px;  padding-bottom: 10px;"> NHÃN HIỆU</p>
                @foreach($branch as $value)
                <p style="margin-left: 25px;  font-size: 14px;">
                  <span class="fa fa-caret-right"></span><a href="{{ url('/products/branch/').'/'.$value->name }}"> {{ $value->name }}</a>
                </p>
                @endforeach
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-12" style="margin-bottom: 15px;">
                <p style="font-size: 16px;font-weight: bold; border-bottom: 1px solid gray;  margin-bottom: 10px;  padding-bottom: 10px;"> GIÁ</p>
                <select name="pricesearch" form="pricesearch" class="form-control">
                  <option value="1" {{(isset($_GET['pricesearch']) && $_GET['pricesearch'] == 1) ? 'selected' : '' }}><i></i>30.000 - 150.000</option>
                  <option value="2" {{(isset($_GET['pricesearch']) && $_GET['pricesearch'] == 2) ? 'selected' : '' }}><i></i>150.000 - 400.000</option>
                  <option value="3" {{(isset($_GET['pricesearch']) && $_GET['pricesearch'] == 3) ? 'selected' : '' }}><i></i>400.000 - 800.000</option>
                  <option value="4" {{(isset($_GET['pricesearch']) && $_GET['pricesearch'] == 4) ? 'selected' : '' }}><i></i>800.000 - 1.200.000</option>
                  <option value="5" {{(isset($_GET['pricesearch']) && $_GET['pricesearch'] == 5) ? 'selected' : '' }}><i></i>1.200.000 - 1.600.000</option>
                  <option value="6" {{(isset($_GET['pricesearch']) && $_GET['pricesearch'] == 6) ? 'selected' : '' }}><i></i>1.600.000 trở lên</option>
                          </select>
                          <br>
                          <form id="pricesearch" class="pull-left" action="{{url('/pricesearch')}}" method="get">
                              <input type="submit" class="btn btn-primary"  value="Search by price">
                          </form>
              </div>
            </div>
          </div>
        <div class="col-sm-9">
          <div class="beta-products-list">
            <h4 style="margin-bottom: 20px;">SẢN PHẨM MỚI </h4>
            <div class="beta-products-details">
              <p class="pull-left">@if(isset($products))Tìm thấy {{ count($products) }} @else Không tìm thấy @endif sản phẩm</p>
              <div class="clearfix"></div>
            </div>
            <div class="row" id="data">
                  @foreach($products as $value)
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"  style="margin-top: 10px;margin-bottom: 10px;">
                      <div class="single-item">
                        @if($value->promotion_price > 0)
                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                        @endif
                        <div class="single-item-header">
                          <a href="{{ url('/products/').'/'.$value->id }}"><img src="/uploads/{{ $value->image }}" width="270" height="320" alt=""></a>
                        </div>
                        <div class="single-item-body">
                          <p class="single-item-title">
                            <a href="{{ url('/products/').'/'.$value->id }}">{{ $value->name_product }}
                            </a>
                          </p>
                          <a href="{{ url('/products/').'/'.$value->id }}">
                          <p class="single-item-price">
                          @if($value->promotion_price > 0)
                              <span class="flash-del">{{ number_format($value->unit_price, 0,'','.') }}</span>
                              <span class="flash-sale">{{ number_format($value->promotion_price, 0,'','.')}} VNĐ</span>
                          @else
                             <span>{{ number_format($value->unit_price, 0,'','.') }}&nbsp; {{ $value->unit }} VNĐ</span>
                          @endif

                          </p>
                        </a>
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
