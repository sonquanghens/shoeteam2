@extends('user.layouts.master')
@section('content')
<div class="container">
  <div id="content" class="space-top-none">
    <div class="main-content">
      <div class="space60">&nbsp;</div>
      <div class="row">
        <div class="col-sm-3">
						<ul class="aside-menu">
							<li><a href="#">Typography</a></li>
							<li><a href="#">Buttons</a></li>
							<li><a href="#">Dividers</a></li>
							<li><a href="#">Columns</a></li>
							<li><a href="#">Icon box</a></li>
							<li><a href="#">Notifications</a></li>
							<li><a href="#">Progress bars and Skill meter</a></li>
							<li><a href="#">Tabs</a></li>
							<li><a href="#">Testimonial</a></li>
							<li><a href="#">Video</a></li>
							<li><a href="#">Social icons</a></li>
							<li><a href="#">Carousel sliders</a></li>
							<li><a href="#">Custom List</a></li>
							<li><a href="#">Image frames &amp; gallery</a></li>
							<li><a href="#">Google Maps</a></li>
							<li><a href="#">Accordion and Toggles</a></li>
							<li class="is-active"><a href="#">Custom callout box</a></li>
							<li><a href="#">Page section</a></li>
							<li><a href="#">Mini callout box</a></li>
							<li><a href="#">Content box</a></li>
							<li><a href="#">Computer sliders</a></li>
							<li><a href="#">Pricing &amp; Data tables</a></li>
							<li><a href="#">Process Builders</a></li>
						</ul>
					</div>
        <div class="col-sm-9">
          <div class="beta-products-list">
            <h4>KẾT QUẢ TÌM KIẾM</h4>
            <div class="beta-products-details">
              <p class="pull-left">@if(isset($products))Tìm thấy {{ count($products) }} @else Không tìm thấy @endif sản phẩm</p>
              <div class="clearfix"></div>
            </div>

            <div class="row">
                @if(isset($products))
                  @foreach($products as $value)
                    <div class="col-sm-3">
                      <div class="single-item">
                        <div class="single-item-header">
                          <a href="product.html"><img src="assets/dest/images/products/1.jpg" alt=""></a>
                        </div>
                        <div class="single-item-body">
                          <p class="single-item-title">{{ $value->name }}</p>
                          <p class="single-item-price">
                            <span>{{ $value->unit_price }}</span>
                          </p>
                        </div>
                        <div class="single-item-caption">
                          <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                          <a class="beta-btn primary" href="product.html">Đặt Hàng <i class="fa fa-chevron-right"></i></a>
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
