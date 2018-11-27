<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Padmaja Hari">
    <title>HRMS</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="index.html">
                        <img class="brand-logo" alt="modern admin logo"
                             src="{{ asset('assets/img/logo.jpg') }}">
                        <h3 class="brand-text">HRMS</h3>
                    </a>
                </li>

                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                                class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <div class="input-group mt-1">
                        <input type="text" class="form-control" placeholder="Employee name, number"
                               style="width: 300px" id="searchBox">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="searchButton"><i
                                        class="ficon ft-search"></i> Search</button>
                        </div>
                    </div>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <span class="user-name text-bold-700">{{ Auth::user()->name }}</span>
                    <span class="user-name text-bold-700" style="padding-left: 20px"><a href="{{ route('logout') }}">Logout</a></span>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="#">
                    <i class="la la-list"></i>
                    <span class="menu-title">Inductions</span></a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('inductions.index') }}">List</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('inductions.create') }}">Create New</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a href="#"><i class="la la-user"></i>
                    </i><span class="menu-title">Employee Profile</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('employees.index') }}">List</a>
                    </li>
                    {{--<li><a class="menu-item" href="{{ route('employees.create') }}">Create New</a>
                    </li>--}}
                </ul>
            </li>
            <li class=" nav-item">
                <a href="#"><i class="la la-user-plus"></i>
                    </i><span class="menu-title">Promotions</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('promotions.index') }}">List</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a href="#"><i class="la la-money"></i>
                    </i><span class="menu-title">Increments</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('increments.index') }}">List</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a href="#"><i class="la la-sign-out"></i>
                    </i><span class="menu-title">Leaves</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('leaves.index') }}">List</a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item">
                <a href="#"><i class="la la-star"></i>
                    </i><span class="menu-title">Rewards</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('rewards.index') }}">List</a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item">
                <a href="#"><i class="la la-group"></i>
                    </i><span class="menu-title">punishments</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('punishments.index') }}">List</a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item">
                <a href="#"><i class="la la-group"></i>
                    </i><span class="menu-title">Operations</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="">List</a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item">
                <a href="#"><i class="la la-group"></i>
                    </i><span class="menu-title">Trainings</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="">Outside Training</a>
                    </li>
                    <li><a class="menu-item" href="">In house Training</a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item">
                <a href="#"><i class="la la-group"></i>
                    </i><span class="menu-title">GH unit Transfers</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="">List</a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item">
                <a href="#"><i class="la la-group"></i>
                    </i><span class="menu-title">Reports</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="">List</a>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
</div>


<!-- ************* Main Content Starts Here ***************** -->

<div class="content" style="background-color: #ffffff;">
    @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-success') }} alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session::get('message') }}
        </div>

    @endif
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>

<!-- ************* Main Content Ends Here ***************** -->

<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 TS Greyhounds, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Developed by Padmaja Goli</span>
    </p>
</footer>
<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/js/core/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/common.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/handlebars.min-latest.js') }}" type="text/javascript"></script>
@yield('javascripts')
<script type="text/javascript">
    $(function () {
        $(".datePicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        $('#searchButton').click(function() {
            if (!$('#searchBox').val()) {
                return false;
            }

            window.location.href = '{{ url('/') }}' + '/employees?q=' + $('#searchBox').val();
        });
    });
</script>

</body>
</html>