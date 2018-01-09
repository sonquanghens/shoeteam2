@extends('auth.admin.layouts.admin_master')
@section('content')

 <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title" style="float: left;">Chi Tiết Đơn Hàng </h3>
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
                  <td>{{ $product->name_product}}</td>
                  @endif
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
           {!! Form::open(['url' => '/admin/branch']) !!}
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
            <a href="{{ url('carts/manage/'. $item->order_id. '/detail/export')}}" class="btn btn-success"> Export PDF</a>
           {!! Form::close() !!}
     </div>


@stop
