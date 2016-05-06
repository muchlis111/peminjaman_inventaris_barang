<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard | Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{!! asset('assets/images/icons/favicon.ico') !!}">
    <link rel="apple-touch-icon" href="{!! asset('assets/images/icons/favicon.png') !!}">
    <link rel="apple-touch-icon" sizes="72x72" href="{!! asset('assets/images/icons/favicon-72x72.png') !!}">
    <link rel="apple-touch-icon" sizes="114x114" href="{!! asset('assets/images/icons/favicon-114x114.png') !!}">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet"
          href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700 ">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="{!! asset('assets/styles/jquery-ui-1.10.4.custom.min.css') !!}">
    <link type="text/css" rel="stylesheet" href="{!! asset('assets/styles/font-awesome.min.css') !!}">
    <link type="text/css" rel="stylesheet" href="{!! asset('assets/styles/bootstrap.min.css') !!}">
    <link type="text/css" rel="stylesheet" href="{!! asset('assets/styles/animate.css') !!}">
    <link type="text/css" rel="stylesheet" href="{!! asset('assets/styles/all.css') !!}">
    <link type="text/css" rel="stylesheet" href="{!! asset('assets/styles/main.css') !!}">
    <link type="text/css" rel="stylesheet" href="{!! asset('assets/styles/style-responsive.css') !!}">
    <link type="text/css" rel="stylesheet" href="{!! asset('assets/styles/zabuto_calendar.min.css') !!}">
    <link type="text/css" rel="stylesheet" href="{!! asset('assets/styles/pace.css') !!}">
    <link type="text/css" rel="stylesheet" href="{!! asset('assets/styles/jquery.news-ticker.css') !!}">
</head>
<body>
<div>
    <!--BEGIN BACK TO TOP-->
    <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
    <!--END BACK TO TOP-->
    <!--BEGIN TOPBAR-->
    <div id="header-topbar-option-demo" class="page-header-topbar">
        @include('includes.header')
    </div>
    <!--END TOPBAR-->
    <div id="wrapper">
        <!--BEGIN SIDEBAR MENU-->
        @include('includes.sidebar')
                <!--END SIDEBAR MENU-->
        <!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper">
            <!--BEGIN TITLE & BREADCRUMB PAGE-->
            <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <div class="page-header pull-left">
                    <div class="page-title"></div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Home</a>&nbsp;&nbsp;<i
                                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="hidden"><a href="#"></a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li class="active page-title"></li>
                </ol>
                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE-->
            @yield('content')
                    <!--END CONTENT-->
            <!--BEGIN FOOTER-->
            <div id="footer">
                <div class="copyright">
                    <a href="http://themifycloud.com">2014 © KAdmin Responsive Multi-Purpose Template</a></div>
            </div>
            <!--END FOOTER-->
        </div>
        <!--END PAGE WRAPPER-->
    </div>
</div>
<script src="{!! asset('assets/script/jquery-1.10.2.min.js') !!}"></script>
<script src="{!! asset('assets/script/jquery-migrate-1.2.1.min.js') !!}"></script>
<script src="{!! asset('assets/script/jquery-ui.js') !!}"></script>
<script src="{!! asset('assets/script/bootstrap.min.js') !!}"></script>
<script src="{!! asset('assets/script/bootstrap-hover-dropdown.js') !!}"></script>
<script src="{!! asset('assets/script/html5shiv.js') !!}"></script>
<script src="{!! asset('assets/script/respond.min.js') !!}"></script>
<script src="{!! asset('assets/script/jquery.metisMenu.js') !!}"></script>
<script src="{!! asset('assets/script/jquery.slimscroll.js') !!}"></script>
<script src="{!! asset('assets/script/jquery.cookie.js') !!}"></script>
@yield('scripts')
</body>
</html>
