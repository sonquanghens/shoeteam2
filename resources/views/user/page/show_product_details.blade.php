@extends('user.layouts.master')
@section('content')
  @include('user.layouts.pays_step')
  <div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="/uploads/{{$product->image}}" width="270" height="320" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title" style="font-size: 25px;margin-bottom: 15px;text-transform: uppercase;font-weight:  bold;border-bottom: 1px solid #e1e1e1;padding-bottom: 15px;">{{ $product->name_product }}</p>
								<p class="single-item-price">
									<span>{{ number_format($product->unit_price, 0,'','.')}} VNĐ</span>
								</p>
                @if($product->status == '1')
                <p style="  margin-top: 14px;  font-weight: bold;color: red;">
                    HẾT HÀNG
                </p>
                  @endif
							</d>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<p>Size:</p>
							<div class="single-item-options">
								<select class="wc-select" name="size" id="size" onchange="validateSelectBox(this)">
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
                  <option value="41">41</option>
                  <option value="42">42</option>
                  <option value="43">43</option>
                  <option value="44">44</option>
								</select>
              @if($product->status == '0')
								<a class="add-to-cart" href="#" onclick=" addCart({{$product->id}})"><i class="fa fa-shopping-cart"></i></a>
              @endif
                <div class="clearfix"></div>
							</div>
						</div>
					</div>
      </div>
					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{!! $product->description !!}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>SẢN PHẨM CÙNG THƯƠNG HIỆU</h4>

						<div class="row">
              @foreach($items as $product)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{ url('/products/').'/'.$product->id }}"><img src="/uploads/{{ $product->image }}" width="270" height="320" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title" style="font-size: 20px; font-weight:  bold;">{{ $product->name_product }}</p>
                    <a href="{{ url('/products/').'/'.$product->id }}">
										<p class="single-item-price">
											<span>{{ number_format($product->unit_price, 0,'','.') }} VNĐ</span>
										</p>
                  </a>
									</div>
								</div>
							</div>
              @endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Bán Chạy Nhất</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
              @foreach($topproduct as $product)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{ url('/products/').'/'.$product->id }}"><img src="/uploads/{{$product->image}}" alt=""></a>
									<div class="media-body">
										<p style="font-weight:  bold;">
                      {{ $product->name_product }}
                    </p>
										<span class="beta-sales-price">{{ number_format($product->unit_price, 0,'','.') }} VNĐ</span>
									</div>
								</div>
              @endforeach
							</div>
						</div>
          </div>
			 <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title"><a href="{{url('/products/new')}}">Sản Phẩm Mới</a></h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
                @foreach($allproduct as $product)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{ url('/products/').'/'.$product->id }}"><img src="/uploads/{{$product->image}}" alt=""></a>
									<div class="media-body">
                    <p style="font-weight:  bold;">
                      {{ $product->name_product }}
                    </p>
                    <span class="beta-sales-price">{{ number_format($product->unit_price, 0,'','.') }} VNĐ</span>
									</div>
								</div>
                @endforeach
							</div>
						</div>
					</div>
        </div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
  </div>

@stop
