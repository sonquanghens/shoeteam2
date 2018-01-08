<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fandy</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ url('admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- FONTAWESOME ICONS STYLES-->
    <link rel="icon" href="/img/favicon.png" type="/image/x-icon">
    <!-- MetisMenu CSS -->
    <link href="{{ url('admin_asset/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ url('admin_asset/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{ url('admin_asset/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- DataTables CSS -->
    <link href="{{ url('admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet">
    <!--CUSTOM STYLES-->
    <!-- DataTables Responsive CSS -->
    <link href="{{ url('admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
    <link href="{{ url('admin_asset/css/style.css')}}" rel="stylesheet" />
    <!-- toastr-5-laravel -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    {!! Charts::styles() !!}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

      <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div id="wrapper">
        @include('auth.admin.layouts.header')
        <!-- /. NAV TOP  -->
        @include('auth.admin.layouts.menu_left')
        <!-- /. SIDEBAR MENU (navbar-side) -->
        <div id="page-wrapper" class="page-wrapper-cls">
         <div class="col-lg-12">
          @if(Session::has('success'))
          <div class="alert alert-success">
              {{Session::get('success')}}
          </div>
          @endif
        </div>
        @yield('content')
        <!-- /. PAGE WRAPPER  -->
        </div>
    </div>
    <!-- /. WRAPPER  -->
    <footer >
        &copy; 2015 YourCompany | By : <a href="" target="_blank">Fandy</a>
    </footer>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ url('/admin_asset/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('/admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url('/admin_asset/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- CUSTOM SCRIPTS -->
    <script src="{{ url('admin_asset/js/custom.js') }}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{ url('/admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>


    <script src="{{ url('admin_asset/js/myscrirp.js') }}"></script>

</body>

</html>
