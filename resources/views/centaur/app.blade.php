<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>

    <!-- Bootstrap - Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap-datetimepicker.css') }}">
    <script src="{{ url('js/app.js') }}"></script>
    <script src="{{ url('js/bootbox.min.js') }}"></script>
    <script src="{{ url('js/moment/moment.js') }}"></script>
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/pie.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

    <!-- Resources -->

    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body{
            margin: 0;
            padding: 70px 0 0 0!important;
            background:#F2F2F2;
            background-size: cover!important;
            color: #000;
        }

        .btn-warning{
            background-color: orange!important;
        }

        .fixed_div{
            margin-left: -30px;
            position: fixed;
            top: 50px;
            z-index: 500;
            background-color: #FFFFFF;
            height: 61px;
            width: 100%;
            padding: 5px 20px 40px 20px;
            margin-bottom: 320px;
            border-bottom: 1px dotted #cccccc;
        }
        .active {
            background-color: #232323 !important;
            border-right: none!important;
            border-right: 1px solid green!important;


        }

        .sidebar-nav li a:hover {
            background: rgb(0,0,0);
            /*color: #ffffff;*/
            border-right: 1px solid green!important;

        }
        .panel-body{
            background-color: #FFFFFF!important;
        }

        .toggled {
            width: 100%;
            transition: left 0.3s ease;
            transition-delay: 3s;
        }
        .navbar-default .navbar-brand {
            color: #ffffff!important;
            font-size:23px!important;
            font-weight: bold;

        }
        .navbar-default{
            /*background: #FFFFFF;*/
            background: radial-gradient(at top left,red .1cm,#000,green)!important;
            background-size: cover!important;
        }
        .well{
            background: #ffffff;
        }
        .btn-primary,.btn-info{
            background: radial-gradient(at top left,red .1cm,#000,green)!important;
            color: #ffffff!important;
        }
        .navbar-default li a{
            color: #3097d1!important;
            font-weight: bold;


        }
        .nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
            background: #e1e1e1 !important;
            background-size: cover!important;
            border-color: #3097D1;
        }
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            min-width: 160px;
            padding: 5px 0;
            margin: 2px 0 0;
            list-style: none;
            font-size: 14px;
            text-align: left;
            background:#fafafa;
            background-size: cover!important;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 6px 12px rgba(0,0,0,.175);
            background-clip: padding-box;
        }
        .dropdown-menu li a:hover{
            background-color: #e1e1e1;
        }

        /*.table-striped>tbody>tr:nth-of-type(odd) {*/
            /*background: radial-gradient(at left top ,#000,mediumseagreen)!important;*/
            /*color: #ffffff!important;*/
        /*}*/

        /*.table-hover>tbody>tr:hover {*/
            /*background: radial-gradient(at left top ,#000,mediumseagreen)!important;*/
            /*color: #ffffff!important;*/
            /*cursor:pointer;*/
        /*}*/

        /*.table-striped>tbody>tr:nth-of-type(even) {*/
            /*background: radial-gradient(at left top ,red,#000)!important;*/
            /*color: #ffffff!important;*/
        /*}*/

        #sidebar-wrapper {
            z-index: 1;
            position: fixed;
            width: 200px;
            height: 100%;
            text-align: left;
            overflow-y: auto;
            /*background: #FFFFFF;*/
            /*background:#F;*/
            background: radial-gradient(at left top ,red .1cm,#000,mediumseagreen);
            /*background: -webkit-radial-gradient(circle,red 47%, green, black);*/
            background-size: cover;
            border-right: .5px solid #e3e3e3;
            /*opacity: 0.9;*/
            top: 0;
            left: 0;
            margin-right: 20px;
            display: block;
            transition: background-color 3s ease-out;
            -webkit-transition: background-color 3s ease-out;
            -moz-transition: background-color 3s ease-out;
            -o-transition: background-color 3s ease-out;
        }

        #page-content-wrapper {
            width: 100%;
            position: absolute;
            background-color: inherit;
            transition: left 0.3s linear;

        }

        #wrapper.toggled #sidebar-wrapper {
            width: 200px;
            transition: left 0.3s linear;
        }

        #wrapper.toggled #page-content-wrapper {
            padding-left: 200px;
            -webkit-transition: left 0.3s linear;
        }

        .sidebar-nav {
            padding-top: 40px;
            list-style: none;
            padding-left: 0;
            transition: background-color 2s ease-out;
        }

        .sidebar-nav li {
            line-height: 70px;
            border-bottom: 1px dotted #ffffff;
            padding-left: 0;
            text-align: left;
            transition: background-color 3s ease-out;
            -webkit-transition: background-color 3s ease-out;
            -moz-transition: background-color 3s ease-out;
            -o-transition: background-color 3s ease-out;

        }

        .sidebar-nav li a {
            display: block;
            text-decoration: none;
            padding-left: 10px;
            color: #ffffff;
            font-weight: bold;
            transition: background-color 3s ease-out;
            -webkit-transition: background-color 3s ease-out;
            -moz-transition: background-color 3s ease-out;
            -o-transition: background-color 3s ease-out;

        }




    </style>
</head>
<body style="padding-top: 50px;">
<div id="app">

    <div id="wrapper" class="toggled" style="height: auto">

        {{--side bar--}}
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">

                @if (Sentinel::check() && Sentinel::inRole('moderator'))

                    <li style="border-top: 1px dotted white">
                        <a href="{{ url('dashboard') }}">
                            <i class="fa fa-dashboard" aria-hidden="true"></i>
                            Dashboard
                        </a>
                    </li>

                <li style="border-top: 1px dotted white">
                    <a href="{{ url('resources') }}">
                        <i class="fa fa-laptop" aria-hidden="true"></i>
                        Resources
                    </a>
                </li>
                    <li>
                        <a href="{{ route('in-possession') }}">
                            <i class="fa fa-laptop" aria-hidden="true"></i>
                            Items In Possession
                        </a>
                    </li>
                @elseif(Sentinel::check() && Sentinel::inRole('administrator'))
                    <li class="{{ Request::is('dashboard*')? 'active':'' }}"><a href="{{ route('dashboard') }}">
                            <i class="fa fa-dashboard" aria-hidden="true"></i>  Dashboard</a>
                    </li>
                    <li class="{{ Request::is('assets*')? 'active':'' }}"><a href="{{ url('assets') }}">
                            <i class="fa fa-laptop" aria-hidden="true"></i> Assets
                        <span class="badge">
                            {{ DB::table('assets')->count() }}
                        </span>
                         </a></li>
                    <li class="{{ Request::is('categories*')? 'active':'' }}"><a href="{{ route('categories') }}">
                            <i class="fa fa-cogs" aria-hidden="true"></i> categories</a></li>
                    <li class="{{ Request::is('departments*')? 'active':'' }}"><a href="{{ route('departments') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            Departments
                            <div class="badge badge-warning">
                                {{ DB::table('departments')->count() }}
                            </div>
                        </a>
                    </li>
                    <li class="{{ Request::is('users*') ? 'active' : '' }}"><a href="{{ route('users.index') }}">
                            <i class="fa fa-users" aria-hidden="true"></i> Users</a></li>
                    <li class="{{ Request::is('reservations*')? 'active':'' }}"><a href="{{ route('reservations') }}">
                            <i class="fa fa-users" aria-hidden="true"></i> Reservations</a>
                    </li>
                @elseif(Sentinel::check() && Sentinel::inRole('subscriber'))
                    <li><a href="{{ url('assets') }}">
                            <i class="fa fa-laptop" aria-hidden="true"></i> Assets</a></li>
                    @else
                    <li><a href="">
                            <i class="fa fa-laptop"></i> About The System</a></li>
                    <li><a href="">
                            <i class="fa fa-adn"></i> How To Use</a>
                    </li>
                    <li><a href="">
                            <i class="fa fa-adn"></i> Help</a>
                    </li>
                    <li><a href="{{ url('login') }}">
                            <i class="fa fa-sign-in"></i> Login</a>
                    </li>

                @endif

            </ul>
        </div>
        <div id="page-content-wrapper">
            <button type="button" id="menu-toggle" class="btn btn-success sr-only" style="margin-top: 50px;z-index: 1;position: absolute">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-tasks" aria-hidden="true"></i>
            </button>
            <div class="container-fluid">
                <div class="">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        @include('layouts.partials.menu')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<script>
    function confirm_delete(form) {
        bootbox.confirm({
            title: "Confirm Action",
            message: "Do you really want to delete this item ?",
            buttons: {
                confirm: {
                    label: '<i class="fa fa-check-circle"></i> Delete',
                    className: 'btn-success'
                },
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancel',
                    className: 'btn-danger'
                }
            },
            callback: function (yes) {
                if(yes){
                    $(form).submit();
                }
            }
        });
    }

</script>
<!-- Scripts -->






{{--<div class="container">--}}
    {{--@include('Centaur::notifications')--}}
    {{--@yield('content')--}}
{{--</div>--}}

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script !src="">
    $("#menu-toggle").click(function (e) {

        $("#wrapper").toggleClass('toggled').css({
            'transition': 'left 0.6s ease'


        });
    });


</script>
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!-- Restfulizer.js - A tool for simulating put,patch and delete requests -->
<script src="{{ asset('restfulizer.js') }}"></script>
<script src="{{ asset('js/laravel-bootstrap-modal-form.js') }}"></script>
<script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
</body>
</html>