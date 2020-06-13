<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/widgets.css') }}" rel="stylesheet">

    <style>
        .nav-link.active{
            background: #D1F2EB !important;
            border-color:#D1F2EB !important ;
        }

        .logo-text{
            text-align: center;
            color: #fff;
        }

        .navbar-nav{

            /*background: #ffa23b;*/
        }
        .nav-item-heading{
            border-bottom: 1px solid #fff8b3;
            border-bottom-left-radius: 8px;
            color: #fff;
            padding: 0.2em;
            margin-top: 1em;
            width: 100%;

        }
        .left-menu-link {
            color: #eeeeee !important;
        }
        .visit-holder{
            padding: 2em 2em ;
            background: #D1F2EB;
        }
        .current-visit{
            /*border-left: 5px solid #D4AC0D;*/
            margin: 0.5em;
            padding: 1em;
            border-top-left-radius: 1.4em;
            border-top-right-radius: 1.4em;
            background: #ffffff;
        }
        .encounter-item{
            /*border: 1px solid #aaa;*/
            padding: 0.4em;
            margin-bottom: 1.8em;
        }
        .encounter-heading{
            background: #707B7C;
            color: white;
            padding: 0.4em 0.6em 0.1em 0.6em;
            display: inline-block;
            margin: 0;
            border-top-left-radius: 0.5em;
            border-top-right-radius: 0.5em;
        }
        .encounter-heading-holder{
            border-bottom: 3px solid #707B7C;
        }
        .encounter-body{
            border: 2px solid #707B7C;
            padding: 0.5em;
        }
        .btn-sm{
            border-radius: 1em;
            padding: 0.1em 1em;
        }

        .search-container{
            position: relative;
            min-height: 60vh;
            /*border: 1px solid #1d68a7 ;*/
        }

        .search-div {
            /*min-width: 50vw;*/
        }

        .fa-search{
            font-size: 1em;
            color: #1d68a7;
        }

        .search-result-container{
            /*border: #5b95ee 1px solid;*/
            border-radius: 1em;
            padding: 0.5em
        }

        .search-result{
            background: #efefef;
            padding: 1em;
            border-radius: 0.8em;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .search-result p, a{
            margin: 0 !important;
        }
    </style>


</head>


<body  data-spy="scroll" data-offset="60">

<div id="app">
    <div class="container-fluid">

        <div class="row">

            @include('expert.components.left-nav')

            <!--Right Content -->
            <div class="col-lg-9" style="padding-left:0; padding-right: 0;">

                <!-- Top Navigation -->
                @include('expert.components.top_nav')

                <main class="py-4">
                    <div class="container-fluid">
                        <div class="row justify-content-center">

                            <div class="col-md-12">
                                <div class="card">

                                    <div class="card-body" >

                                        <!-- Search form -->
                                        <div class="search-container" style="background: #ffffff; padding: 1em">

                                            <!-- Search Form -->
                                            <div class="search-div" >
                                                    <div class="row">
                                                        <div class="col">
                                                            <form action="{{ route('hce.patient.wallet.search.submit') }}" method="GET">
                                                                {{ @csrf_field() }}
                                                                {{--<h4 style="text-align: center"> Search medical wallet</h4>--}}
                                                                <div class="input-group mb-3">
                                                                    <input name="access_token" type="text" class="form-control"
                                                                           value="{{ $accessToken }}"
                                                                           placeholder="Token">

                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">
                                                                            <button type="submit" class="btn btn-link">
                                                                                <i class="fa fa-search"> </i>
                                                                                Search
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                               </div>

                                            <!-- Search Results -->
                                            <div  class="search-result-container">


                                                <div class="row">
                                                    <div class="col-12">
                                                        @if (session('flashMessage'))
                                                            <div class="alert alert-danger" role="alert">
                                                                <i class="fa fa-info-circle"> </i>
                                                                {{ session('flashMessage') }}
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>

                                                <div class="row ">
                                                    <div class="col-md-6 ">
                                                        <div class="search-result">

                                                            <h4>
                                                                Confirm Identity
                                                            </h4>

                                                            <p> <b>
                                                                    <i class="fa fa-user-circle"></i>
                                                                    {{ $user->name }}
                                                                </b>
                                                            </p>

                                                            <p>
                                                                <i class="fa fa-calendar-day"> </i>
                                                                Visit date: {{ $visit->created_at }}
                                                            </p>

                                                            <p> <a class="btn btn-sm btn-outline-primary"
                                                                    href="{{ route('hce.patient.consultation.service_form') }}/{{ $visit->id }}">
                                                                    Confirm </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

        </div>
    </div>
</div>


<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}" defer></script>
<script src="{{ asset('js/popper.min.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>


</body>
</html>
