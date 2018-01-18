<div class="header-bottom" style="background-color: #ffffff;">
  <div class="container">
    <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
    <div class="visible-xs clearfix"></div>
    <nav class="main-menu" style="margin-top: 30px;float: left;">
      <ul class="l-inline ov">
        <li><a href="{{ url('/') }}">Trang chủ</a></li>
        <li><a href="{{url('/products/new')}}">Sản phẩm</a>
          <?php  $branchs = App\Branch::all();  ?>
          <ul class="sub-menu">
            @foreach($branchs as $branch)
            <li><a href="{{ url('/products/branch/').'/'.$branch->name }}">{{ $branch->name }}</a></li>
            @endforeach
          </ul>
        </li>
        <li><a href="{{url('/products/sale/allproduct')}}">SALE</a></li>
        <li><a href="contacts.html">Liên hệ</a></li>
      </ul>
      <div class="clearfix"></div>
    </nav>
    <div class="beta-comp">
      <div id="cart-wrap" class="cart">
        <div class="beta-select"><i class="fa fa-shopping-cart"></i>  Giỏ hàng(<span id="count">{{\Cart::count()}}</span>) <i class="fa fa-chevron-down"></i></div>
        <div class="beta-dropdown cart-body">
        <div class="cart-items">
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
        </div>
          <div class="cart-caption">
            <div class="center">
              <div class="space10">&nbsp;</div>
              <a href="{{url('/carts/checkout')}}" class="beta-btn primary text-center">Checkout <i class="fa fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
      </div> <!-- .cart -->
    </div>
  </div>
   <!-- .container -->
</div> <!-- .header-bottom -->
