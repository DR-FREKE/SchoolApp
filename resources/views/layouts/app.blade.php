<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.24.0/babel.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/add.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminDashboard.css') }}" rel="stylesheet">

    <!--more scripts-->
    <script src="{{ asset('js/SmoothScroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/viewteacher.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle bars" id="icon-bars" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <!--{{ config('app.name', 'Laravel') }}-->
                        School Board
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" id="mSchool" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="snackbar" id="snack">welcome back</div>
        <div class="mNav" id="myNavbar">
            @if(Auth::user()->admin == '1')
            <div class="sidenav" id="mSidenav">
                <div class="mSidebar">
                    <ul class="" id="">
                        <li class="active"><a href="{{ url('/') }}"><i class="fa fa-apple"></i><span>Dashboard</span></a></li>
                        <li><a href="#"><i class="fa fa-user-plus"></i><span>Add Schools</span></a></li>
                        <li><a href="#"><i class="fa fa-address-card-o"></i><span>View Schools</span></a></li>
                        <li><a href="#"> <i class="fa fa-user"></i><span>View Teachers</span></a></li>
                        <li><a href="#" ><i class="fa fa-money"></i><span>Add Employees</span></a></li>
                        <li><a href="#"><i class="fa fa-user-circle-o"></i><span>Change Profile</span></a></li>
                        <li><a href="{{ url('/admin') }}"><i class="fa fa-twitter"></i><span>Broadcast-message</span></a></li>
                    </ul>
                </div>
            </div>
        @else
            <div class="topnav" id="mTopnav">
                <div class="myDiv">
                    <ul class="" id="">
                        <li class="active"><a href="{{ url('/') }}"><i class="fa fa-windows"></i> DashBoard</a></li>
                        <li><a href="{{ url('/addteachers') }}"><i class="fa fa-user-plus"></i> Add Teachers</a></li>
                        <li><a href="{{ url('/viewteachers') }}"><i class="fa fa-address-card-o"></i> View Teachers</a></li>
                        <li><a href="{{ url('/profile') }}"> <i class="fa fa-user-circle-o"></i> View & Edit Profile</a></li>
                        <li><a href="{{ url('/admin') }}" >Do Another Stuff</a></li>
                    </ul>
                </div>
            </div>
        @endif
        </div>
        

        @yield('content')
    </div>
    <div class="appFooter">
        @ 2018 - 2019 School Board -<a href="http://localhost:1500"><span>KingSolDev.com</span></a>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('a').on('click', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
                sessionStorage.setItem('name', "{{ Auth::user()->name }}");
            });
                
            // var activeTab = localStorage.getItem('activeTab');
                
            // console.log(activeTab);
                
            // if (activeTab) {
            //     $('a[href="' + activeTab + '"]').tab('show');
            // }
            
        });
    </script>
</body>
</html>
