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
                Trạng thái giao hàng : @if($order->status == '1') Chưa giao @elseif($order->status == '2') Đã giao @else Đã hủy @endif

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
              <th>Tên</th>
              <th>Số lượng</th>
              <th>Đơn Giá</th>
              <th>Thành Tiền</th>
              <th>Mã Đơn Hàng</th>
              <th>Tên Sản Phẩm</th>
              <th>Size</th>
              <th>Trạng Thái</th>

            </tr>
            </thead>
            <tbody>
              <?php  $total = 0; ?>
              @foreach ($items as $item)
             <tr>
                  <td>{{ $item->id}}</td>
                  <td>{{ $item->order->user->name}}</td>
                  <td>{{ $item->quantily}}</td>
                  <td>{{ number_format($item->unit_price, '0', ',', '.') . ' VNĐ'}}</td>
                  <td>{{ number_format($item->quantily * $item->unit_price, '0', ',', '.') . ' VNĐ'}}</td>
                  <td>{{ $item->order_id}}</td>
                  <?php $product = App\Product::find($item->product_id); ?>
                  @if (empty($product))
                  <td> Sản Phẩm đã xóa hoặc ngừng kinh doanh</td>
                  @else
                  <td><a href="#" data-toggle="tooltip" data-html="true" title="<image width='185' height='200' src='/uploads/1514981668_1.jpg'/>"> 
                    {{ $product->name_product}}</a>

                  </td>
                  @endif
                  <td>{{$item->size }}</td>
                  @if($item->order->status == 1 )
                  <td> Chưa xử lý	</td>
                  @endif
                  @if($item->order->status == 2 )
                  <td> Đã xử lý	</td>
                  @endif
                  @if($item->order->status == 3 )
                  <td> Hủy	</td>
                  @endif
              </tr>
              <?php $total+=$item->quantily * $item->unit_price ?>
              @endforeach
            </tbody>
         </table>
         <p style="float: left;"><b>Tổng Tiền: {{ number_format($total, '0', ',', '.') . ' VNĐ' }}</b></p>
        </div>
        <!-- /.box-body -->
      </div>
     </div>

     <div class="col-md-3">
           {!! Form::open(['url' => '/admin/order/'.$item->order_id.'/status','method' => 'put']) !!}
           @if($item->order->status != 2 )
           @if($item->order->status == 1 )
           {!! Form::select('note',
               [
                  '1'        => 'Chưa xử lý',
                  '2'      => 'Đã xử lý',
                  '3'        => 'Hủy',
              ]
              , null, [ 'class' =>  'form-control',])
           !!}
           @endif
           @if($item->order->status == 2 )
           {!! Form::select('note',
               [
                  '2'      => 'Đã xử lý',
                  '1'        => 'Chưa xử lý',
                  '3'        => 'Hủy',
              ]
              , null, [ 'class' =>  'form-control',])
           !!}
           @endif
           @if($item->order->status == 3 )
           {!! Form::select('note',
               [
                  '3'        => 'Hủy',
                  '1'        => 'Chưa xử lý',
                  '2'      => 'Đã xử lý',
              ]
              , null, [ 'class' =>  'form-control',])
           !!}
           @endif

           {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
           @endif
            <a href="{{ url('carts/manage/'. $item->order_id. '/detail/export')}}" class="btn btn-success"> Export PDF</a>
           {!! Form::close() !!}
     </div>
     <script>
      $(document).ready(function(){
       $('[data-toggle="tooltip"]').tooltip();
      });
     </script>
@stop
