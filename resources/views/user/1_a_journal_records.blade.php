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

    <style>
        .nav-link.active {
            background: #D1F2EB !important;
            border-color: #D1F2EB !important;
        }

        .logo-text {
            text-align: center;
            color: #fff;
        }

        .navbar-nav {

            /*background: #ffa23b;*/
        }

        .nav-item-heading {
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


        .visit-heading {
            margin-bottom: 1.8em;
        }

        .current-visit {
            /*border-left: 5px solid #D4AC0D;*/
            padding: 1em;
            border-top-left-radius: 1.4em;
            border-top-right-radius: 1.4em;
        }

        .encounter-item {
            /*border: 1px solid #aaa;*/
            padding: 0.4em;
            margin-bottom: 1.8em;
        }

        .encounter-heading {
            background: #707B7C;
            color: white;
            padding: 0.4em 0.6em 0.1em 0.6em;
            display: inline-block;
            margin: 0;
            border-top-left-radius: 0.5em;
            border-top-right-radius: 0.5em;
        }

        .encounter-heading-holder {
            border-bottom: 3px solid #707B7C;
        }

        .encounter-body {
            border: 2px solid #707B7C;
            padding: 0.5em;
        }

        .btn-sm {
            border-radius: 1em;
            padding: 0.1em 1em;
        }

        .access-token {
            font-size: 1.3em;
            display: inline-block;
            padding: 2px 0.8em;
            margin: 0.1em 0.5em;
            font-family: Consolas, "Liberation Mono", "Courier New", monospace;
        }

        /*** Visits ***/
        .previous-visits-holder {
            padding: 1em;
        }


        .visit-item {
            padding: 0.8em 1.2em;
            margin-bottom: 3em;
            border-radius: 1em;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .visit-item p {
            /*color: #7D6608;*/
            color: #444444;
            margin: 0 !important;
        }

        .bg-visit {
            background: #f0e68c;
        }

        .bg-symptom {
            background: #DC7633;
        }

        .bg-medication {
            background: #F8F9F9;
        }

        .bg-allergy {
            background: #FADBD8;
         }


        .bg-immunization {
            background: #ABEBC6;
        }



        .active-form-nav {
            border-bottom: 3px solid #3498DB;
        }

        .token-label {
            /*border: 1px solid #1b1e21;*/
            color: #1d68a7;
            font-size: 1.4em;
            font-family: Consolas, "Liberation Mono", "Courier New", monospace;
        }

        .thin-divider {
            height: 1px;
            background: #888888;
            margin: 0 2px 8px 0;
        }

        /*** Visits ***/
    </style>

</head>


<body>

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

                                        <!--ADD OR REACTIVATE -->
                                        <div class="row current-visit">

                                            <!-- Today's Visit heading -->
                                            <div class="col-12">
                                                <h2 style=" display: inline-block">
                                                    <i class="fa fa-calendar-day"></i>
                                                    Medical Journal
                                                </h2>

                                                <div>
                                                    <ul class="nav">
                                                        <li class="nav-item active-form-nav">
                                                            <a class="nav-link" href="#">
                                                                Health Care Activities & Events</a>
                                                        </li>

                                                    </ul>
                                                </div>

                                            </div>

                                            <div class="col-12 encounter-item">
                                                <!-- LIST Journal records -->

                                                <div class="row previous-visits-holder">

                                                    @foreach( $journalRecords as $journalRecord)

                                                        @if($journalRecord->table_name == "visits")
                                                            <div class="col-md-7 ">
                                                                <div class="visit-item bg-visit">
                                                                    <p>
                                                                        <a class="token-label ">
                                                                            <i class="fa fa-walking"></i>
                                                                            Hospital Visit
                                                                        </a>

                                                                        <a class="btn btn-sm btn-success float-right"
                                                                           href="{{ route('user.service.details') }}/{{ $journalRecord->data->id }}">
                                                                            Open
                                                                        </a>

                                                                        <a class="btn btn-sm float-right">
                                                                            <strong>
                                                                                {{
                                                                                 Carbon\Carbon::parse($journalRecord->data->created_at)->toDayDateTimeString()
                                                                                }},
                                                                            </strong>
                                                                        </a>

                                                                    </p>

                                                                    <div class="thin-divider">
                                                                    </div>

                                                                    <p>
                                                                        <i class="fa fa-calendar-day"></i>
                                                                        Service form Token
                                                                        <strong>{{ $journalRecord->data->access_token }}</strong>
                                                                    </p>


                                                                    <p>
                                                                        <i class="fa fa-hashtag"></i>
                                                                        Serial
                                                                        <strong> {{ $journalRecord->data->serial_number  }}  </strong>
                                                                    </p>

                                                                    <p>
                                                                        <i class="fa fa-hospital"></i>
                                                                        Provider
                                                                        <strong>{{ $journalRecord->data->facility_name  }} </strong>
                                                                    </p>

                                                                    <p>
                                                                        <i class="fa fa-money-bill-alt"></i>
                                                                        Payment Mode
                                                                        <strong>{{ $journalRecord->data->payment_type }} </strong>
                                                                    </p>

                                                                    @if( $journalRecord->data->patient_confirmation == false )
                                                                        <p style="color: #ee393e">
                                                                            <i class="fa fa-exclamation-triangle"></i>
                                                                            Open form to confirm
                                                                            service
                                                                        </p>
                                                                    @endif

                                                                </div>
                                                            </div>

                                                        @elseif($journalRecord->table_name == "medication")
                                                            <div class="col-md-7 ">
                                                                <div class="visit-item bg-medication">
                                                                    <p>
                                                                        <a class="token-label ">
                                                                            <i class="fa fa-pills"></i>
                                                                            Medication
                                                                        </a>
                                                                        <a class="btn btn-sm float-right">
                                                                            <strong>
                                                                                {{ Carbon\Carbon::parse($journalRecord->data->created_at)->toDayDateTimeString()}}
                                                                            </strong>
                                                                        </a>
                                                                    </p>

                                                                    <div class="thin-divider"></div>


                                                                    <p>
                                                                        <i class="fa fa-pills"></i>
                                                                        <strong> {{ $journalRecord->data->name }}  </strong>,
                                                                        Taken For
                                                                        <strong> {{ $journalRecord->data->taken_for }}  </strong>
                                                                    </p>

                                                                    <p>
                                                                        <i class="fa fa-calendar-day"></i>
                                                                        From <strong> {{ $journalRecord->data->started_at }}  </strong>
                                                                        To  <strong> {{ $journalRecord->data->ended_at }}  </strong>
                                                                    </p>

                                                                    <p>
                                                                        <i class="fa fa-file-alt"></i>
                                                                        Instruction
                                                                        <strong>{{ $journalRecord->data->instruction }} </strong>
                                                                    </p>

                                                                    <p>
                                                                        <i class="fa fa-hospital"></i>
                                                                        Result
                                                                        <strong>{{ $journalRecord->data->results  }} </strong>
                                                                    </p>


                                                                </div>
                                                            </div>

                                                        @elseif($journalRecord->table_name == "symptom")
                                                            <div class="col-md-7 ">
                                                                <div class="visit-item bg-symptom">
                                                                    <p>
                                                                        <a class="token-label ">
                                                                            <i class="fa fa-pills"></i>
                                                                            Symptom
                                                                        </a>
                                                                        <a class="btn btn-sm float-right">
                                                                            <strong>
                                                                                {{ Carbon\Carbon::parse($journalRecord->data->created_at)->toDayDateTimeString()}}
                                                                            </strong>
                                                                        </a>
                                                                    </p>

                                                                    <div class="thin-divider"></div>


                                                                    <p>
                                                                        <i class="fa fa-hashtag"></i>
                                                                        Serial
                                                                        <strong> {{ $journalRecord->id }}  </strong>
                                                                    </p>

                                                                    <p>
                                                                        <i class="fa fa-hospital"></i>
                                                                        Provider
                                                                        <strong>{{ $journalRecord->table_name  }} </strong>
                                                                    </p>

                                                                    <p>
                                                                        <i class="fa fa-money-bill-alt"></i>
                                                                        Payment Mode
                                                                        <strong>{{ $journalRecord->table_name }} </strong>
                                                                    </p>

                                                                </div>
                                                            </div>

                                                        @elseif($journalRecord->table_name == "allergy")
                                                            <div class="col-md-7 ">
                                                                <div class="visit-item bg-allergy">
                                                                    <p>
                                                                        <a class="token-label ">
                                                                            <i class="fa fa-frown-open"></i>
                                                                            Allergy
                                                                        </a>

                                                                        <a class="btn btn-sm float-right">
                                                                            <strong>
                                                                                {{ Carbon\Carbon::parse($journalRecord->data->created_at)->toDayDateTimeString()}}
                                                                            </strong>
                                                                        </a>
                                                                    </p>

                                                                    <div class="thin-divider"></div>


                                                                    <p>
                                                                        <i class="fa fa-frown"></i>
                                                                        Name
                                                                        <strong> {{ $journalRecord->data->name }}  </strong>
                                                                    </p>

                                                                    <p>
                                                                        <i class="fa fa-chevron-circle-right"></i>
                                                                        Reaction
                                                                        <strong>{{ $journalRecord->data->reaction  }} </strong>
                                                                    </p>

                                                                    <p>
                                                                        <i class="fa fa-bed"></i>
                                                                        Severity
                                                                        <strong>{{ $journalRecord->data->severity  }} </strong>
                                                                    </p>


                                                                </div>
                                                            </div>

                                                        @elseif($journalRecord->table_name == "immunization")
                                                            <div class="col-md-7 ">
                                                                <div class="visit-item bg-immunization">
                                                                    <p>
                                                                        <a class="token-label ">
                                                                            <i class="fa fa-syringe"></i>
                                                                            Immunization
                                                                        </a>
                                                                        <a class="btn btn-sm float-right">
                                                                            <strong>
                                                                                {{ Carbon\Carbon::parse($journalRecord->data->created_at)->toDayDateTimeString()}}
                                                                            </strong>
                                                                        </a>
                                                                    </p>

                                                                    <div class="thin-divider"></div>


                                                                    <p>
                                                                        <i class="fa fa-syringe"></i>
                                                                        Name
                                                                        <strong> {{ $journalRecord->data->name }}  </strong>
                                                                    </p>

                                                                    <p>
                                                                        <i class="fa fa-chevron-circle-right"></i>
                                                                        Prescribed For
                                                                        <strong> {{ $journalRecord->data->prescribed_for }}  </strong>
                                                                    </p>
                                                                    <p>
                                                                        <i class="fa fa-mortar-pestle"></i>
                                                                        Dosage
                                                                        <strong>
                                                                            {{  $journalRecord->data->dosage == null ? "Not Available":  $journalRecord->data->dosage }}
                                                                        </strong>
                                                                    </p>


                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach

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
