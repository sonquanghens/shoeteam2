@extends('user.layouts.master')
@section('content')
<div class="container">
  <div id="content" class="space-top-none">
    <div class="main-content">
      <div class="space60">&nbsp;</div>
      <div class="row">
          <div class="col-sm-3">
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
                <p style="font-size: 16px;font-weight: bold; border-bottom: 1px solid gray;  margin-bottom: 10px;  padding-bottom: 10px;"> SIZE GIÀY</p>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12" style="margin-bottom: 15px;">
                p<p style="font-size: 16px;font-weight: bold; border-bottom: 1px solid gray;  margin-bottom: 10px;  padding-bottom: 10px;"> GIÁ</p>
                <select name="pricesearch" form="pricesearch" class="form-control">
                              <option value="1"><i></i>30.000 - 150.000</option>
                              <option value="2"><i></i>150.000 - 400.000</option>
                              <option value="3"><i></i>400.000 - 800.000</option>
                              <option value="4"><i></i>800.000 - 1.200.000</option>
                              <option value="5"><i></i>1.200.000 - 1.600.000</option>
                              <option value="6"><i></i>1.600.000 trở lên</option>
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
            <h4>KẾT QUẢ TÌM KIẾM</h4>
            <div class="beta-products-details">
              <p class="pull-left">@if(isset($products))Tìm thấy {{ count($products) }} @else Không tìm thấy @endif sản phẩm</p>
              <div class="clearfix"></div>
            </div>
            <div class="row" id="data">
                @if(isset($products))
                  @foreach($products as $value)
                    <div class="col-sm-3" >
                      <div class="single-item">
                        @if($value->promotion_price > 0)
                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                        @endif
                        <div class="single-item-header">
                          <a href="{{ url('/products/').'/'.$value->id }}"><img src="/img/all1).jpg" alt=""></a>
                        </div>
                        <div class="single-item-body">
                          <p class="single-item-title">  <a href="{{ url('/products/').'/'.$value->id }}">{{ $value->name_product }} - {{ $value->branch->name }}</a></p>
                          <p class="single-item-price">
                            <span>{{ number_format($value->unit_price, 0,'','.') }}&nbsp; {{ $value->unit }}</span>
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
                  @endif

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
<script>
    $(function(){
      $('#searchsubmit').click(function(e) {
        e.preventDefault();
        $.ajax({
           dataType: "json",
           url: '/search',
           data: {keyword: $('#key').value()},
           success: function (result) {
               // update your page with the result json
               console.log(result);
           },
        });
      });
    });
</script>
@stop
