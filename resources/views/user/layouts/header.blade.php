<div class="header-top">
  <div class="container">
    <div class="pull-right auto-width-right">
      <ul class="top-details menu-beta l-inline">
        @if(Auth::guest())
        <li><a href="/register">Đăng kí</a></li>
        <li><a href="/login">Đăng nhập</a></li>
        @else
        <li><a href="/home"><i class="fa fa-user"></i>{{Auth::user()->name}}</a></li>
        <li><a href="{{route('logout')}}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();"                  >Đăng xuất</a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
          </form>
          <li><a href="/admin">Quản lý</a></li>
        @endif
      </ul>
    </div>
    <div class="clearfix"></div>
  </div> <!-- .container -->
</div> <!-- .header-top -->
<div class="header-body">
  <div class="container beta-relative">
    <div class="pull-left">
      <a href="{{ url('/') }}" id="logo"><img src="/logo-fandy-noel.png" width="200px" alt=""></a>
    </div>
    <div class="pull-right beta-components space-left ov">
      <div class="space10">&nbsp;</div>
      <div class="beta-comp">
        <form role="search" method="get" id="searchform" action="{{ url('/search') }}">
              <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
              <button  type="submit" id="searchsubmit" class="fa fa-search"></button>
        </form>
      </div>

    </div>
    <div class="clearfix"></div>
  </div> <!-- .container -->
</div> <!-- .header-body -->
