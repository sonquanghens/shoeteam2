@extends('user.layouts.master')
@section('content')
@include('user.layouts.pays_step')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Giỏ Hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Trang Chủ</a> / <span>Giỏ Hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
  <div class="container">
		<div id="content">
			@if(\Cart::count() > 0)
			<div class="table-responsive">
				<!-- Shop Products Table -->
        <table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">Sản Phẩm</th>
							<th class="product-price">Giá</th>
							<th class="product-quantity">Số Lượng</th>
							<th class="product-subtotal">Tổng</th>
							<th class="product-remove">Xóa</th>
						</tr>
          </thead>
					<tbody>
            @foreach(\Cart::content() as $row)
              <tr class="cart_item">
  							<td class="product-name">
  								<div class="media">
  									<img class="pull-left" src="/uploads/{{ $row->options->images }}"  width="80" height="80" alt="">
  									<div class="media-body">
  										<p class="font-large table-title">{{$row->name }}</p>
  										<p class="table-option">Color: Red</p>
  										<p id="result" class="table-option">Size: {{ $row->options->size }}</p>
  									</div>
  								</div>
  							</td>

  							<td class="product-price">
  								<span class="amount">{{number_format($row->price, 0,'','.').' VNĐ'}}</span>
  							</td>
  							<td class="product-quantity">
									<?php $rowId = (string)$row->rowId ?>
								<form>
  									<input type="button" value=" - " onclick="down('{{$row->rowId}}')">
  									<input type="text" id="{{$row->rowId}}" name="quantity" value="{{$row->qty}}" size="2" style="text-align: center; width:70px;">
  									<input type="button" value=" + " onclick="up('{{$row->rowId}}')" >
								</form>
  							</td>

  							<td class="product-subtotal">
  								<span class="amount"><span id="sub{{$row->rowId}}">{{ number_format($row->subtotal, 0, '.','.') . ' VNĐ' }}</span></span>
  							</td>

  							<td class="product-remove">
  								<a href="{{url('carts/delete/').'/'.$row->rowId}}" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
  							</td>

  						</tr>
            @endforeach
          </tbody>
					<tfoot>
						<tr>
							<td colspan="6" class="actions">
								<a class="beta-btn primary" name="update_cart"  href="{{URL::previous()}}">Cập nhật giỏ hàng <i class="fa fa-chevron-right"></i></a>
								<a  class="beta-btn primary" name="proceed" href="{{url('/order/checkout')}}">Đặt Hàng <i class="fa fa-chevron-right"></i></a>
							</td>
						</tr>
					</tfoot>
        </table>

      </div>

			@else
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
						<h3>Không có sản phẩm nào trong giỏ hàng</h3>
						<p style="text-align:center;margin-top:12px;"><a class="btn btn-primary btn-lg"  href="{{url('/')}}" role="button">Tiến tục mua hàng</a></p>
				</div>
			</div>
			@endif
    </div>

		<div class="cart-totals pull-right">
				<div class="cart-totals-row"><h5 class="cart-total-title">Tổng Tiền</h5></div>
				<div class="cart-totals-row"><span>Phí :</span> <span></span></div>
				<div class="cart-totals-row"><span>Tổng Tiền:</span> <span id="totals" class="amount" style="  color:  #000000;  font-weight:  bold;">@if(isset($row)){{ Cart::total()}} VNĐ@endif</span></div>
		</div>
  </div>
	<div class="space50">&nbsp;</div>

@stop

@section('script')
	<script>
			function down(rowId)
			{
					var root = '{{ url('/carts') }}';
					$.get( root + '/' + rowId + '/down-count', function(data, status){
					var sub = data.subtotal.toLocaleString();
					var total = data.total.toLocaleString();
					console.log(data);

					$('#'+ rowId).replaceWith('<input type="text" id="'+rowId+'" name="quantity" value="' + data.qty +'" size="2" style="text-align: center;  width:70px;">');
					$('#sub' + rowId).replaceWith('<span class="amount" id="sub'+rowId+'">'+sub+' VNĐ </span>');
					$('#count').replaceWith('<span id="count">' + data.count +'</span> ');
					$('#totals').replaceWith('<span id="totals" class="amount"  style="  color:  #000000;  font-weight:  bold;">'+total+' VNĐ </span>');
					});
			}

			function up(rowId)
			{
				var root = '{{ url('/carts') }}';
					$.get( root + '/' + rowId + '/up-count', function(data, status){
					var sub = data.subtotal.toLocaleString();
					var total = data.total.toLocaleString();
						console.log(data);

							$('#'+ rowId).replaceWith('<input type="text" id="'+rowId+'" name="quantity" value="' + data.qty +'" size="2" style="text-align: center;  width:70px;">');
							$('#sub' + rowId).replaceWith('<span id="sub'+rowId+'">'+sub+' VNĐ </span>');
							$('#count').replaceWith('<span id="count">' + data.count +'</span> ');
							$('#totals').replaceWith('<span id="totals" class="amount" style="  color:  #000000;  font-weight:  bold;">'+total+' VNĐ </span>');
				});
			}
	</script>
@stop
