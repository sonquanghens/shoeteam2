<nav  class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                  <a href="{{url('/admin')}}">
                      <img src="/img/f-fandy-74267292.jpg" class="img-circle" />
                  </a>
                </div>

            </li>
             <li>
                <a  href="#"><i class="fa fa-users fa-fw"></i> <strong>{{ Auth::user()->name }}</strong></a>
            </li>

            <li>
                <a  href="{{ url('/admin/order') }}"><i class="fa fa-cube fa-fw"></i>Order</a>
            </li>
            <li>
                <a href="{{ url('/admin/product/list_product') }}"><i class="fa fa-cube fa-fw"></i>Products</a>
            </li>
            </li>
            <li>
                 <a href="{{ url('/admin/branch/list_branch') }}"><i class="fa fa-venus "></i>Branch </a>
            </li>
            <li>
                <a href="{{ url('/admin/users') }}"><i class="fa fa-users fa-fw"></i>Users </a>
                 <!-- <ul class="nav nav-second-level">
                    <li>
                        <a href="#"><i class="fa fa-plus-square"></i>Second  Link</a>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-list-ul"></i>Second Link</a>
                    </li>
                     <li>
                        <a href="#">Second Level<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third  Link</a>
                            </li>
                            <li>
                                <a href="#">Third Link</a>
                            </li>

                        </ul>

                    </li>
                </ul> -->
            </li>
            <li>
                <a href="{{ url('/admin/slide/list_slide') }}"><i class="fa fa-dashcube "></i>Slide Page</a>
            </li>

        </ul>
    </div>

</nav>
