@extends('user.layouts.master')
@section('content')
      <!--slider-->
  @include('user.layouts.slider')
  @include('user.layouts.pays_step')
      <!--slider-->

  <div class="container">
    <div id="content" class="space-top-none">
      <div class="main-content">
        <div class="space60">&nbsp;</div>
        <div class="row">
          <div class="col-sm-12">
            <div class="beta-products-list">
              <div class="col-sm-6">
                <h4>Sản Phẩm Mới</h4>
              </div>
              <div class="col-sm-6">
                <a href="{{url('/products/new')}}"><p style="text-align: right;color: #008CBA;font-weight:  bold;margin-top: 10px;">
                  Xem chi tiết <span class="fa fa-caret-right fa-2"></span>
                </p></a>
              </div>
              <div class="beta-products-details">
                <p class="pull-left"></p>
                <div class="clearfix"></div>
              </div>
              <div class="row">
                @foreach($products as $product)
                <div class="col-sm-3" style="margin-bottom:20px;">
                  <div class="single-item">
                    @if($product->promotion_price > 0)
                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                    @endif
                    <div class="single-item-header">
                      <a href="{{ url('/products/').'/'.$product->id }}"><img src="/uploads/{{ $product->image }}" width="270" height="320" alt=""></a>
                    </div>
                    <div class="single-item-body">
                      <p class="single-item-title">
                        <a href="{{ url('/products/').'/'.$product->id }}">{{ $product->name_product }}
                        </a>
                      </p>
                      <a href="{{ url('/products/').'/'.$product->id }}">
                      <p class="single-item-price">
                      @if($product->promotion_price > 0)
                          <span class="flash-del">{{ number_format($product->unit_price, 0,'','.') }}</span>
                          <span class="flash-sale">{{ number_format($product->promotion_price, 0,'','.')}} VNĐ</span>
                      @else
                          <span>{{ number_format($product->unit_price, 0,'','.') }}&nbsp; {{ $product->unit }} VNĐ</span>
                      @endif
                      </p>
                    </a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="space40">&nbsp;</div>
            </div> <!-- .beta-products-list -->
          </div>
        </div> <!-- end section with sidebar and main content -->
      </div> <!-- .main-content -->
    </div> <!-- #content -->
</div>

<div class="header-body">
		<img src="img/Banner-Uptempo1.jpg" alt="">
</div>

<div class="container">
    <div id="content" class="space-top-none">
      <div class="main-content">
        <div class="space60">&nbsp;</div>
        <div class="row">
          <div class="col-sm-12">
            <div class="beta-products-list">
              <div class="col-sm-6">
                <h4>Sản Phẩm Ưa Thích</h4>
              </div>
              <div class="col-sm-6">
                <a href="{{url('/products/sale/allproduct')}}"><p style="text-align: right;color: #008CBA;font-weight:  bold;margin-top: 10px;">
                  Xem chi tiết <span class="fa fa-caret-right fa-2"></span>
                </p></a>
              </div>
              <div class="beta-products-details">
                <p class="pull-left"></p>
                <div class="clearfix"></div>
              </div>
              <div class="row">
                @foreach($topproduct as $product)
                <div class="col-sm-3" style="margin-bottom:20px;">
                  <div class="single-item">
                    @if($product->promotion_price > 0)
                      <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                    @endif
                    <div class="single-item-header">
                      <a href="{{ url('/products/').'/'.$product->id }}"><img src="/uploads/{{ $product->image }}" width="270" height="320" alt=""></a>
                    </div>
                    <div class="single-item-body">
                      <p class="single-item-title"><a href="{{ url('/products/').'/'.$product->id }}">{{ $product->name_product }}</a></p>
                      <a href="{{ url('/products/').'/'.$product->id }}">
                      <p class="single-item-price">
                      @if($product->promotion_price > 0)
                        <span class="flash-del">{{ number_format($product->unit_price, 0,'','.') }}</span>
                        <span class="flash-sale">{{ number_format($product->promotion_price, 0,'','.')}} VNĐ</span>
                      @else
                        <span>{{ number_format($product->unit_price, 0,'','.') }}&nbsp; VNĐ</span>
                      @endif

                      </p>
                    </a>
                    </div>

                  </div>
                </div>
                @endforeach
              </div>
              <div class="space40">&nbsp;</div>
               <!-- .beta-products-list -->
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


@stop

@section('script')

@stop
