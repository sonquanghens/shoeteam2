@foreach(\Cart::content() as $row)
  <div class="cart-item">
    <!-- <a class="cart-item-delete" href="{{url('carts/delete/').'/'.$row->rowId}}"><i class="fa fa-times"></i></a> -->
    <div class="media">
      <a class="pull-left" href="#"><img src="/uploads/{{$row->options->images}}" width="50" height="50" alt=""></a>
      <div class="media-body">
        <span class="cart-item-title">{{ $row->name }}</span>
        <span class="cart-item-options">Số Lượng :{{$row->qty}}</span>
        <span class="cart-item-options">Size :{{$row->options->size}}</span>
        <span class="cart-item-amount"><span>{{number_format($row->price, 0,',','.')}} VNĐ</span></span>
      </div>
    </div>
  </div>
@endforeach
