<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head><!--/head-->
<body>
  <div>
    <!-- <img src="/img/logo_footer.png" /> -->
  </div>
  <div>
    <h1 style="text-align:center;">CHI TIẾT HÓA ĐƠN</h1>
  </div>

  <div>
    <h4 style="margin-bottom:0px;">Thông tin khách hàng</h4>
    <div>
        @foreach($orders as $value)
        <?php $user = App\User::find($value->user_id);  ?>
          <p style="margin-bottom:0px;width:50%;float:left;">
            Họ tên người đặt : <span style="float: right;margin-right: 60%;">{{$user->name }}</span>
          </p>
          <p style="margin-top: 0px;margin-bottom:  0px;width:50%;float:left;">
            Họ tên người nhận : <span style="float: right;margin-right: 60%;">{{$value->name_receiver }}</span>
          </p>
          <p style="margin-top: 0px;margin-bottom:  0px;width:50%;float:left;">
            Địa Chỉ : <span style="float: right;margin-right: 60%;">{{$value->address_recevie }}</span>
          </p>
          <p style="margin-top: 0px;margin-bottom:  0px;width:50%;float:left;">
            Số Điện Thoại : <span style="float: right;margin-right: 60%;">{{$value->phone }}</span>
          </p>
          <p style="margin-top: 0px;margin-bottom:  0px;width:50%;float:left;">
            Ngày Đặt Hàng : <span style="float: right;margin-right: 60%;">{{$value->date_order }}</span>
          </p>
          <p style="margin-top: 0px;width:50%;float:left;">
            Ngày Ship : <span style="float: right;margin-right: 60%;">{{$value->ship_date }}</span>
          </p>
        @endforeach
    </div>
  </div>

  <div class="box-body">
	  <table  id="example2" style="border: 1px solid #ddd;width: 100%;
    margin-bottom: 20px;border-collapse: collapse;
    border-spacing: 0;">
    	<thead>
      	<tr>
      		<th style="border: 1px solid #ddd;">ID</th>
      		<th style="border: 1px solid #ddd;">Salary</th>
      		<th style="border: 1px solid #ddd;">Price</th>
      		<th style="border: 1px solid #ddd;">Subtotal</th>
      		<th style="border: 1px solid #ddd;">Order Id</th>
      		<th style="border: 1px solid #ddd;">Product Name</th>
          <th style="border: 1px solid #ddd;">Size</th>
      	</tr>
    	</thead>
	    <tbody style="padding: 8px;">
      	<?php  $total = 0; ?>
          @foreach ($items as $item)
           <tr>
                <td style="border: 1px solid #ddd;text-align:center;">{{ $item->id}}</td>
                <td style="border: 1px solid #ddd;text-align:center;">{{ $item->quantily}}</td>
                <td style="border: 1px solid #ddd;text-align:center;">{{ number_format($item->unit_price, '0', ',', '.') . ' VND'}}</td>
                <td style="border: 1px solid #ddd;text-align:center;">{{ number_format($item->quantily * $item->unit_price, '0', ',', '.') . ' VND'}}</td>
                <td style="border: 1px solid #ddd;text-align:center;">{{ $item->order_id}}</td>
                <?php $product = App\Product::find($item->product_id); ?>
                @if (empty($product))
                <td style="border: 1px solid #ddd;text-align:center;"> Product deleted or stopped business</td>
                @else
                <td style="border: 1px solid #ddd;text-align:center;">{{ $product->name_product}}</td>
                @endif
                <td style="border: 1px solid #ddd;text-align:center;">{{ $item->size}}</td>
          </tr>
          <?php $total+=$item->quantily * $item->unit_price ?>
          @endforeach
	    </tbody>
	</table>
</div>
	<p style="text-align:right;"><b>Total: {{ number_format($total, '0', ',', '.') . ' VND' }}</b></p>
</body>
</html>
