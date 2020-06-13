<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Verification</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">

    <style>
        .btn-danger, .btn-primary{
            color: #fff !important;
            border-radius: 1em !important;
        }
    </style>
</head>
<body>
<div id="app">

    <main class="py-4">
        <div class="container">

            <div class="card">

                <div class="card-header">
                    <h2 style="text-align: center" >
                        <i class="fa fa-user-tie" > </i>
                        {{ $user->first_name }}  {{ $user->last_name }}

                    </h2>
                </div>

                <div class="card-body">

                    <h3 style="text-align: center;margin-bottom: 1em !important;">
                        Click the button to verify your email
                    </h3>

                    <h2 style="text-align: center">
                        <a class="btn btn-primary" style="margin:1em !important; background: #00acee; padding: 0.5em !important;"
                           href="{{ route('health_provider.mail.verify') }}">
                            <i class="fa fa-check" > </i>
                            Verify
                        </a>
                    </h2>

                </div>


            </div>

        </div>
    </main>
</div>
</body>
</html>
