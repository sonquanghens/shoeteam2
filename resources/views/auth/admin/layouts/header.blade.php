<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a  class="navbar-brand" href="{{url('/')}}">
            <img src="/img/Recent-Clients-Nike.png" alt="" style="height: 62px;  width: 96px;  margin-left: 25px;
">
        </a>
    </div>

    <div class="notifications-wrapper">
<ul class="nav">


        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user-plus"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user-plus"></i> My Profile</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                  {{ csrf_field() }}
                </form>
            </ul>
        </li>
    </ul>

    </div>
</nav>
