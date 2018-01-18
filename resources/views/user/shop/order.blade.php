@extends('user.layouts.master')
@section('content')
@include('user.layouts.pays_step')
<div class="container">
	@if(\Cart::count() > 0)
		<div id="content">
			<form action="{{ url('/order') }}" method="post" class="beta-form-checkout">
				  {{ csrf_field() }}
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>
						<div>
							<div class="form-group" style="font-size:  14px;font-weight:  bold;">
								<div class="panel-heading" style="padding-left:0px;">Địa chỉ giao hàng của quý khách</div>
						  </div>
							<div class="form-group">
								<strong><label for="name">Họ tên (*)</label></strong>

								<div class="form-controls">
									<input class="form-control" type="text" id="name_receiver" placeholder="Họ tên" name="name_receiver"  @if(Auth::check()) ? value="{{Auth::user()->name}}" : value=""  @endif>
									@if($errors->has('name_receiver'))
										<p style="color: #e30000;font-weight: bold;">
												{{ $errors->first('name_receiver') }}
										</p>
									@endif
								</div>

							</div>
							<!-- <div class="form-block">
								<label>Giới tính </label>
								<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
								<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>

							</div> -->

							<div class="form-group">
								<label for="email">Email (*)</label>
								<div class="form-controls">
									<input class="form-control" type="email" name="email" id="email"  @if(Auth::check()) ? value="{{Auth::user()->email}}" : value=""  @endif placeholder="expample@gmail.com">
									@if($errors->has('email'))
										<p style="color: #e30000;font-weight: bold;">
												{{ $errors->first('email') }}
										</p>
									@endif
								</div>
							</div>

							<div class="form-group">
								<label for="adress">Địa chỉ nhận (*)</label>
								<div class="form-controls">
									<input class="form-control" type="text" id="adress" value="{!! old('adress') !!}" name="adress" placeholder="Street Address" >
									@if($errors->has('adress'))
										<p style="color: #e30000;font-weight: bold;">
												{{ $errors->first('adress') }}
										</p>
									@endif
								</div>
							</div>


							<div class="form-group">
								<label for="phone">Điện thoại (*)</label>
								<div class="form-controls">
									<input class="form-control" type="text" id="phone" value="{!! old('phone') !!}" placeholder="Phone Number" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
									@if($errors->has('phone'))
										<p style="color: #e30000;font-weight: bold;">
												{{ $errors->first('phone') }}
										</p>
									@endif
								</div>
							</div>


						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
                  @foreach(\Cart::content() as $row)
										<div class="media">
											<img width="25%" src="/uploads/{{$row->options->images}}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$row->name}}</p>
												<span class="color-gray your-order-info" style="font-weight:bold;">Size : {{$row->options->size}}</span>
												<span class="color-red your-order-info" style="color: #f90;font-weight:bold;">Đơn Giá: {{number_format($row->price, 0,',','.')}} VNĐ</span>
												<span class="color-gray your-order-info" style="color: #f90;">Số Lượng: {{$row->qty}}</span>
											</div>
										</div>
                  @endforeach
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{Cart::total()}} VNĐ</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>
									</li>
								</ul>
							</div>
							<div class="text-center"><button class="beta-btn primary" type="submit">Đặt hàng</input></a></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div>
		@else
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
					<h3>Không có sản phẩm nào trong giỏ hàng</h3>
					<p style="text-align:center;margin-top:12px;"><a class="btn btn-primary btn-lg"  href="{{url('/')}}" role="button">Tiến tục mua hàng</a></p>
			</div>
		</div>
		@endif
</div>    <!-- #content -->
@stop
