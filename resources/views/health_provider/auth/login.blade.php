<!DOCTYPE html>
<html lang="en">
<head>
    <title>DMC Provider Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">

    <style>

        .logo{
            color: #fff;
            background: #3498DB;
            padding: 10px;
            border-radius: 1em;
        }

        .tabs-wrapper{
            padding: 0 !important;
            margin: 0 !important;
            /*background: #ee792f;*/
        }

        .tab{
            background: #f5f5f5;
            margin: 0 !important;
            padding: 0.5em 2em;
            font-size: 1em;
            display: inline-block;
            border-top: 1px solid #eeeeee;
            border-left: 1px solid #eeeeee;
            border-right: 1px solid #eeeeee;
            border-top-left-radius: 0.5em;
            border-top-right-radius: 0.5em;

        }

        .active-tab{
            background: #eeeeee;
            border-top: 1px solid #3498DB !important;
            border-left: 1px solid #3498DB !important;
            border-right: 1px solid #3498DB !important;
            border-bottom: 1px solid #eeeeee;
        }

        .active-tab a{
            color: #000 ;
        }


        .login-wrapper{
            border: 1px solid #3498DB;
            border-top: 1px solid #eeeeee;
            padding: 1em;
            background: #eeeeee;
        }

        .system-text-logo{
            font-family: 'Bree Serif', serif;
        }

        .page-activity-title{
            font-family: 'Noto Sans', sans-serif;
            padding: 1em;
            text-align: center;
            display: inline-block;
        }

        .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-color: #eeeeee #eeeeee #3498DB !important;
        }

        .nav-link.active{
            color: #495057;
            background-color: #eeeeee !important;
            border-color: #3498DB #3498DB #eeeeee !important;
        }

        .nav-link{
            font-size: 1.4em;
            padding-top: 0.2em;
            padding-bottom: 0.2em;
        }

        .provider-image{
            width: 4.5em;
        }

    </style>

</head>
<body style="background: #ffffff">

<nav class="navbar navbar-light bg-light"  style="border-bottom: 1px solid rgba(0,0,0,0.05);">
    <a class="navbar-brand" href="{{ route('home') }}">
        <h3 class="system-text-logo" style="text-align: center; display: block">
            <i class="fa fa-stethoscope logo"> </i>
            HIMS DATALAB
        </h3>
    </a>
</nav>
<br>

<div class="container" style="background: #ffffff">
    <div class="row justify-content-center">

        <div class="col-md-8" >
            <div style="text-align: center; margin-bottom: 1em" >
                <img class="provider-image" src="{{ asset('images/provider.png') }}" style="display: inline-block">
                <h2 class="page-activity-title"> Health Care Provider </h2>
            </div>

            <!-- TABS -->
            <div class="tabs-wrapper"  >
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item">
                        <a class="nav-link {{ $activeTab=='staff'? 'active' : ' ' }}"
                            href="{{ route('health_employee.login') }}/1">
                            <i class="fa fa-user-md"> </i>
                            Staff Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $activeTab=='admin'? 'active' : ' ' }}"
                             href="{{ route('health_provider.admin.login.form') }}">
                           <i class="fa fa-user-shield"> </i>
                            Admin Login
                        </a>
                    </li>
                </ul>
            </div>





            @if( $activeTab == 'staff')
            <!-- STAff -->
            <div class="login-wrapper">


                <!-- Staff Login Form -->
                <div class="card-body">
                    <form method="POST" action="{{ route('health_employee.login.submit') }}" >

                        {{ @@csrf_field() }}
                        <input type="hidden"  name="health_provider_id" value="{{  $health_provider_id }}"  >

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @else
                <!-- ADMIN -->
            <div class="login-wrapper">
                    <div class="card-body">
                        <form method="POST" action="{{ route('health_provider.admin.login.login') }}" >
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>


                                <div class="col-md-8 " style="margin-top: 1em">
                                    <a class="btn btn-link" href="{{ route('health_provider.registration.form') }}">
                                        Register a health facility/Institute like Hospital,
                                        Laboratory, Dispensary , Pharmacy etc
                                    </a>
                                </div>
                        </form>
                    </div>
            </div>
            @endif


        </div>
    </div>
</div>

</body>
</html>


