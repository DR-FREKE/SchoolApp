<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!--JQERY setup-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- Styles -->
        <link href="{{ asset('css/style2.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script src="{{ asset('js/starter.js') }}"></script> 
    </head>
    <body>
        <div class="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

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
                        
                    </div>
                </div>
            </nav>
            <div class="container" style="margin-top:10em">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="loginTabHolder" id="loginHolder">
                            <div class="panel panel-default">
                                <div class="panel-heading">Login</div>

                                <div class="panel-body">
                                    <form class="form-horizontal">

                                        <div class="form-group">
                                            <!--<label for="email" class="col-md-4 control-label">E-Mail Address</label>-->

                                            <div class="col-md-12 mInput">
                                                <input id="" type="text" class="input_field" name="name" placeholder="School Name or username" required autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <!--<label for="password" class="col-md-4 control-label">Password</label>-->

                                            <div class="col-md-12">
                                                <input id="" type="password" class="input_field" name="password" placeholder="School Code or password" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12 col-md-offset-0">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-5 col-md-offset-0">
                                                <button type="button" class="mLogin" id="btnLogin">
                                                    Login
                                                </button>
                                            </div>
                                            <div class="col-md-7 col-md-offset-0">
                                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color:rgba(49, 79, 79, .8);">
                                                    Forgot School Code?
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

