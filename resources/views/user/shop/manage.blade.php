@extends('user.layouts.master')
@section('content')
@if(count($orders) > 0)
<section id="cart_items" style="margin-bottom: 50px !important">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Manage Basket</li>
				</ol>
		</div>

		 <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="float: left;">Danh Sách Đơn Hàng Gần Đây</h3>
              <a href="{{ url('carts/manage/export')}}" class="btn btn-success" style="float: right;"> Export Excel</a>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
           	<table  id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Ngày Đặt Hàng</th>
                  <th>Trạng Thái</th>
                  <th>Địa Chỉ Giao Hàng</th>
                  <th>Ngày Giao</th>
                  <th>Số Điện Thoại</th>
                  <th>Tên Người Nhận</th>
                  <th>Người Đặt Hàng</th>
                  <th>Hủy Đơn Đặt Hàng</th>
                  <th>Xem Chi Tiết</th>
                </tr>
                </thead>
                <tbody>
	                @foreach ($orders as $order)
		             <tr>
		                  <td>{{ $order->id}}</td>
		                  <td>{{ $order->date_order}}</td>
		                  <td>@if($order->status == 1 )Đang xử lý @elseif($order->status == 2) Đã xử lý @else Đã Hủy  @endif</td>
		                  <td>{{ $order->address_recevie}} </td>
		                  <td>{{ $order->ship_date}} </td>
		                  <td>{{ $order->phone}} </td>
		                  <td>{{ $order->name_receiver}} </td>

		                  <td>{{ App\User::find($order->user_id)->name}}</td>
		                  @if( $order->status == 1)
		                  <td style="text-align: center;">
			                  <a href="{{ url('carts/manage/' . $order->id . '/cancel')}}" onclick="return xacnhan('Are you sure to want cancle')">
			                  	Hủy
			                  </a>
			              </td>
		                  @else
		                  <td style="text-align: center; vertical-align: middle;">Không khả dụng</td>
		                  @endif
		                   <td><a href="{{ url('carts/manage/' . $order->id .'/detail') }}">Xem chi tiết</a></td>
	                </tr>
										@endforeach
                </tbody>
             </table>
            </div>
            <!-- /.box-body -->
          </div>
         </div>
		</div>

	</section>
	@else
	<section>
		<div class="container">
			<div class="" style="text-align: center; margin: 10px">
	        <h3 class="">Không Tìm Thấy Đơn Hàng</h3>
		        <a href="{{ url('/')}}" class="btn btn-primary btn-lg active" role="button">Tiếp tục mua hàng</a>
	    </div>
		</div>
	</section>
	@endif
@stop
@section('script')
	<script>
	function xacnhan(msg) {
		if (window.confirm(msg)) {
			return true;
		}
		return false;
	}
	</script>
@stop
