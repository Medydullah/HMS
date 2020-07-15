<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> HIMS User </title>

    <!-- Fonts -->
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/widgets.css') }}" rel="stylesheet">

    <!-- Graph Styles -->
    <link href="{{ asset('chartjs/chart.js') }}" rel="stylesheet">
    <link href="{{ asset('css/widgets.css') }}" rel="stylesheet">
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


        .visit-heading{
            margin-bottom: 1.8em;
        }

        .current-visit{
            /*border-left: 5px solid #D4AC0D;*/
            padding: 1em;
            border-top-left-radius: 1.4em;
            border-top-right-radius: 1.4em;
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

        .access-token{
            font-size: 1.3em;
            display: inline-block;
            padding: 2px 0.8em;
            margin: 0.1em 0.5em;
            font-family: Consolas, "Liberation Mono", "Courier New", monospace;
        }

        .previous-visits-holder{
            padding: 1em;
        }

        .visit-item {
            background: #EAFAF1;
            padding: 0.8em 1.2em;
            margin-bottom: 3em;
            border-top-right-radius: 1em;
            border-top-left-radius: 1em;
            border-bottom-right-radius: 1em;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .visit-item p{
            /*color: #7D6608;*/
            color: #000000;
            margin: 0 !important;
            font-size: 1.2em;
        }

        .active-form-nav{
            border-bottom: 3px solid #3498DB;
        }

        .fa-adjust{
            font-size: 0.8em;
        }

        .vital-heading{
            font-size: 1.4em;
            color: #28B463;
        }

        .allergy-heading{
            font-size: 1.4em;
            color: #E74C3C;
        }

        .disease-heading{
            font-size: 1.4em;
            color: #E74C3C;
        }

        .immunization-heading{
            font-size: 1.4em;
            color: #17A589;
        }

        .medical-item{
        }

        .chart-card{
            background: #f5f5f5;
        }

    </style>

</head>


<body  >

<div id="app">
    <div class="container-fluid">

        <div class="row">

            @include('user.components.left-nav')

            <!--Right Content -->
            <div class="col-lg-9" style="padding-left:0; padding-right: 0;">

                <!-- Top Navigation -->
                @include('user.components.top_nav')
                <main class="py-4">
                    <div class="container-fluid">
                        <div class="row justify-content-center">

                            <div class="col-md-12">
                                <div class="card">


                                    <div class="card-body" style=" background: #D1F2EB;">

                                                <div class="row current-visit" >

                                                    <!-- Today's Visit heading -->
                                                    <div class="col-12">
                                                        <h2 style=" display: inline-block">
                                                            <i class="fa fa-weight "></i>
                                                            {{ $vitalSign->name }} Trend
                                                        </h2>

                                                        <!-- Mini Menu -->
                                                        <div>
                                                            <ul class="nav">

                                                                <li class="nav-item {{ $viewMode =='records' ? ' active-form-nav':' ' }}">
                                                                    <a class="nav-link"
                                                                       href="{{ route('user.info.medical.vital_sign.trend') }}/{{ $vitalSign->id }}/records">
                                                                        {{ $vitalSign->name }} Records
                                                                        <i class="fa fa-pencil-alt"> </i>
                                                                    </a>
                                                                </li>

                                                                <li class="nav-item {{ $viewMode =='visualization' ? ' active-form-nav':' ' }}">
                                                                    <a class="nav-link"
                                                                       href="{{ route('user.info.medical.vital_sign.trend') }}/{{ $vitalSign->id }}/visualization">
                                                                        View Trend Chart
                                                                        <i class="fa fa-chart-line"> </i>
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div  class="col-12 encounter-item"  >
                                                        <div class="row previous-visits-holder">

                                                            @if( $viewMode == 'visualization' )
                                                                <!-- Chart for 12 Months Records -->
                                                                <div class="col-md-12 ">

                                                                        <div class="visit-item">
                                                                            <div class="nav">
                                                                                <a class=" nav-link  btn btn-sm  btn-outline-primary"
                                                                                   href="#">

                                                                                    @if( count($vitalSign->values) <1 )
                                                                                     <h5 style="margin: 0; color: #ee3015">  No {{ $vitalSign->name }} Recorded </h5>
                                                                                    @else
                                                                                        Last {{ count($vitalSign->values) }} {{ $vitalSign->name }} Records
                                                                                    @endif
                                                                                </a>

                                                                                <a  style="margin-left: 2em;">
                                                                                    @if( count($vitalSign->values) <2 )
                                                                                        <i class="fa fa-info-circle"> </i>
                                                                                        Chart will be drawn if there is more than 1 record
                                                                                    @endif

                                                                                </a>
                                                                            </div>


                                                                            <div class="container chart-card">
                                                                                <div class="col-md-12">
                                                                                    <canvas id="longerChart"></canvas>
                                                                                </div>
                                                                                <h4 style="text-align: center">
                                                                                    Month of recording
                                                                                </h4>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                            @else

                                                                <!-- Records Table-->
                                                                <div class="col-md-8 ">

                                                                    <div class="visit-item">
                                                                        <h4>
                                                                            {{ $vitalSign->name }} records
                                                                        </h4>

                                                                        @if (session('flashMessage'))
                                                                            <div class="alert alert-danger" role="alert">
                                                                                {{ session('flashMessage') }}
                                                                            </div>
                                                                        @endif

                                                                        <!-- New VitalSign Record Form -->
                                                                        <form action="{{ route('user.info.medical.vital_sign.new') }}" method="POST">
                                                                            {{ @csrf_field() }}
                                                                            <input type="hidden" value="{{ $vitalSign->id }}" name="vital_sign_id">

                                                                            <div class="row" style="padding-bottom: 1.5em">
                                                                                <div class="col-md-6">
                                                                                    <div class="input-group "  >
                                                                                        <input type="number" class="form-control"
                                                                                               placeholder="Add new {{ $vitalSign->name }} record" name="vs_value"
                                                                                                    required>
                                                                                        <div class="input-group-append">
                                                                                            <span class="input-group-text">{{ $vitalSign->si_unit }}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <div class="input-group "  >
                                                                                        <button type="submit" class="btn  btn-primary">
                                                                                            Save
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>


                                                                        <!-- LIST of Records -->
                                                                        <div>
                                                                            <table class="table table-bordered table-sm">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>Value</th>
                                                                                    <th>Date</th>
                                                                                    <th>Action </th>
                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>


                                                                                @foreach($vitalSign->values as $i =>  $vitalSignValue)
                                                                                     <tr class=" ">
                                                                                        <td> <i>  @php echo $i+1 @endphp  </i> </td>
                                                                                        <td> <b> {{ $vitalSignValue->value }} </b>  </td>
                                                                                        <td>
                                                                                            {{ Carbon\Carbon::parse($vitalSignValue->created_at)->toFormattedDateString()}},
                                                                                            {{ Carbon\Carbon::parse($vitalSignValue->created_at)->format(' h:i A')}}
                                                                                        </td>
                                                                                        <td>
                                                                                            <a class="btn btn-sm btn-outline-primary"
                                                                                                href="{{ route('user.info.medical.weight.delete') }}/{{ $vitalSignValue->id  }}">
                                                                                                Delete
                                                                                            </a>
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach

                                                                                </tbody>
                                                                            </table>

                                                                            @if( count($vitalSign->values) <1 )
                                                                                <h4>No {{ $vitalSign->name }} Recorded</h4>
                                                                            @endif

                                                                            {{ $vitalSign->values->links() }}
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            @endif



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

@include('user.components.chartjs')


</body>
</html>
