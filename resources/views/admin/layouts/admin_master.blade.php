<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fandy</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{ url('admin_asset/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME ICONS STYLES-->
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <link href="{{ url('admin_asset/css/font-awesome.css')}}" rel="stylesheet" />
    <!--CUSTOM STYLES-->
    <link href="{{ url('admin_asset/css/style.css')}}" rel="stylesheet" />
      <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
        @include('admin.layouts.header')
        <!-- /. NAV TOP  -->
        @include('admin.layouts.menu_left')
        <!-- /. SIDEBAR MENU (navbar-side) -->
        <div id="page-wrapper" class="page-wrapper-cls">
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

    <script src="{{ url('/js/jquery-1.3.2.js') }}"></script>

    <script src="{{ url('admin_asset/js/jquery-1.11.1.js') }}"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{ url('admin_asset/js/bootstrap.js') }}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{ url('admin_asset/js/jquery.metisMenu.js') }}"></script>
    <script src="{{ url('/js/jquery.watermark.js') }}"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="{{ url('admin_asset/js/custom.js') }}"></script>
    <script type="text/javascript">
    $(function() {
        // this will get the full URL at the address bar
        var url = window.location.href;

        // passes on every "a" tag
        $("#main-menu a").each(function() {
            // checks if its the same on the address bar
            if (url == (this.href)) {
                $(this).closest("a").addClass("active-menu");
				      $(this).parents('a').addClass('parent-active');
            }
        // $('#main-menu a').click(function(e) {
        //         e.preventDefault();
        //         $('#page-inner').load(url);
        // });
        });
    });


</script>

</body>
</html>
