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
              <h4>Sản Phẩm Mới</h4>
              <div class="beta-products-details">
                <p class="pull-left"></p>
                <div class="clearfix"></div>
              </div>
              <div class="row">
                @foreach($products as $product)
                <div class="col-sm-3">
                  <div class="single-item">
                    @if($product->promotion_price > 0)
                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                    @endif
                    <div class="single-item-header">
                      <a href="{{ url('/products/').'/'.$product->id }}"><img src="/uploads/{{ $product->image }}" width="270" height="320" alt=""></a>
                    </div>
                    <div class="single-item-body">
                      <p class="single-item-title"><a href="{{ url('/products/').'/'.$product->id }}">{{ $product->name_product }} - {{ $product->branch->name }}</a></p>
                      <a href="{{ url('/products/').'/'.$product->id }}">
                      <p class="single-item-price">
                      @if($product->promotion_price > 0)
                          <span class="flash-del">{{ number_format($product->unit_price, 0,'','.') }}</span>
                          <span class="flash-sale">{{ number_format($product->promotion_price, 0,'','.')}} VNĐ</span>
                      @endif
                        <span>{{ number_format($product->unit_price, 0,'','.') }}&nbsp; {{ $product->unit }}</span>
                      </p>
                    </a>
                    </div>

                  </div>
                </div>
                @endforeach
              </div>
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
              <h4>Sản Phảm Ưa Thích</h4>
              <div class="beta-products-details">
                <p class="pull-left"></p>
                <div class="clearfix"></div>
              </div>
              <div class="row">
                @foreach($topproduct as $product)
                <div class="col-sm-3">
                  <div class="single-item">
                    @if($product->promotion_price > 0)
                      <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                    @endif
                    <div class="single-item-header">
                      <a href="{{ url('/products/').'/'.$product->id }}"><img src="/uploads/{{ $product->image }}" width="270" height="320" alt=""></a>
                    </div>
                    <div class="single-item-body">
                      <p class="single-item-title"><a href="{{ url('/products/').'/'.$product->id }}">{{ $product->name_product }} - {{ $product->branch->name }}</a></p>
                      <a href="{{ url('/products/').'/'.$product->id }}">
                      <p class="single-item-price">
                      @if($product->promotion_price > 0)
                        <span class="flash-del">{{ number_format($product->unit_price, 0,'','.') }}</span>
                        <span class="flash-sale">{{ number_format($product->promotion_price, 0,'','.')}} VNĐ</span>
                      @endif
                        <span>{{ number_format($product->unit_price, 0,'','.') }}&nbsp; VNĐ</span>
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
