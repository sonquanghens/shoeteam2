@extends('auth.admin.layouts.admin_master')
@section('content')

<div class="col-xs-12">
   <h3  style="float: left;">Chi Tiết Đơn Hàng </h3>
</div>
 <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <div class="panel panel-default">
            <div class="panel-heading">Thông tin khách hàng</div>
            <div class="panel-body">
              <div class="col-lg-6">
                Tên người đặt : {{ $user->name }} <br />
                Tên người nhận : {{ $order->name_receiver }} <br />
                Địa chỉ : {{ $order->address_recevie }} <br />
                Số điện thoại : {{ $order->phone }} <br />
                Ngày đặt : {{date('d-m-Y', strtotime($order->date_order))}} <br />
                Ngày nhận : {{date('d-m-Y', strtotime($order->ship_date))}} <br />
                Trạng thái giao hàng : @if($order->note == '1') Chưa giao @elseif($order->note == '2') Đã giao @else Đã hủy @endif

              </div>
              <div class="col-lg-6">

              </div>
            </div>
          </div>
        </div>

        <!-- /.box-header -->
       <div class="box-body">
        <table  id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>ID</th>
              <th>Số lượng</th>
              <th>Đơn Giá</th>
              <th>Thành Tiền</th>
              <th>Mã Đơn Hàng</th>
              <th>Tên Sản Phẩm</th>

            </tr>
            </thead>
            <tbody>
              <?php  $total = 0; ?>
              @foreach ($items as $item)
             <tr>
                  <td>{{ $item->id}}</td>
                  <td>{{ $item->quantily}}</td>
                  <td>{{ number_format($item->unit_price, '0', ',', '.') . ' VNĐ'}}</td>
                  <td>{{ number_format($item->quantily * $item->unit_price, '0', ',', '.') . ' VNĐ'}}</td>
                  <td>{{ $item->order_id}}</td>
                  <?php $product = App\Product::find($item->product_id); ?>
                  @if (empty($product))
                  <td> Sản Phẩm đã xóa hoặc ngừng kinh doanh</td>
                  @else
                  <td>{{ $product->name_product}}</td>
                  @endif
              </tr>
              <?php $total+=$item->quantily * $item->unit_price ?>
              @endforeach
            </tbody>
         </table>
         <p style="float: right;"><b>Tổng Tiền: {{ number_format($total, '0', ',', '.') . ' VNĐ' }}</b></p>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
     <a href="{{ url('carts/manage/'. $item->order_id. '/detail/export')}}" class="btn btn-success" style="float: right;"> Export PDF</a>
     @if($order->status == '1')
     <a href="{{ url('admin/order/'.$order->id.'/update')}}" class="btn btn-info" style="float: right;">Update</a>
     @endif

@stop
