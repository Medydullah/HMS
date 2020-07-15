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
            padding: 0.4em 1em 0.1em 1.5em;
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
            padding: 0.5em 2em;
        }

        .encounter-data{
            margin: 0.2em 0 0.5em 0.5em !important;
        }

        .btn-sm{
            border-radius: 1em;
            padding: 0.1em 1em;
        }

        .investigation-item{
            background: #EAEDED;
            border-left: 6px solid #F4D03F;
            margin: 1em 0.5em 3.2em 0.5em;
            padding-top: 0.8em;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

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
            background: #f0e68c;
            padding: 0.8em 1.2em;
            margin-bottom: 3em;
            border-radius: 1em;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }

        .visit-item p{
            /*color: #7D6608;*/
            color: #444444;
            margin: 0 !important;
        }

        .active-form-nav{
            border-bottom: 3px solid #3498DB;
        }

        .token-label{
            /*border: 1px solid #1b1e21;*/
            color: #1d68a7;
            font-size: 1.4em;
            font-family: Consolas, "Liberation Mono", "Courier New", monospace;
        }

        .thin-divider{
            height: 1px;
            background: #888888;
            margin:  0 2px 8px 0;
        }

        .prescription-item{
            margin: 0;
            font-size: 1.2em;
        }

        .list-indicator{
            margin: 0 0em;
            padding: 0 0.5em;
            background: #000;
            color: white;
            border-radius: 1em;
        }

        .action-button{
            margin: 0.2em 0 0.5em 0.5em;
            padding: 2px 0.8em !important;
            border-radius: 0.8em;
            line-height: 1 !important;
        }

        .encounter-data{
            margin: 0;
            font-size: 1.2em;
        }

        .encounter-data-number{
            border: #3498DB 1px solid;
            padding: 0 0.4em;
            border-radius: 0.5em;
            font-style: normal;
            font-size: 0.9em;
        }

        .investigation-item-caret{
            color: #F4D03F;
            font-size: 1.3em;
        }

        .confirmed-badge{
            background: #F1C40F;
            color: #ffffff;
            border-radius: 1em;
            padding: 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            font-style: normal;
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

                                        <!-- Service form Details -->
                                        <div class="visit-holder">
                                            <div class="row current-visit" >



                                                @if (session('flashMessage'))
                                                    <div class="alert alert-success col-12" role="alert">
                                                        {{ session('flashMessage') }}
                                                    </div>
                                                @endif


                                                <!-- Today's Visit Accounts Summary -->
                                                <div class="col-12">

                                                    <h5 class=" ">
                                                        <a class="btn btn-sm btn-primary"
                                                            href="{{ route('user.visits') }}">
                                                            <i class="fa fa-arrow-left"> </i>
                                                            Back
                                                        </a>

                                                        @if( $visit->patient_confirmation == true )
                                                        <i class="confirmed-badge   float-right"  >
                                                            <i class="fa fa-certificate"> </i>
                                                            Service Confirmed
                                                        </i>
                                                        @else
                                                        <a class="btn btn-sm btn-success float-right"
                                                           href="{{ route('user.service.confirm') }}/{{ $visit->id }}">
                                                            <i class="fa fa-check-circle"> </i>
                                                            Accept Service
                                                        </a>
                                                        @endif

                                                    </h5>
                                                </div>

                                                <!-- Today's Visit Accounts Summary -->
                                                <div class="col-12">

                                                    <h5 style="font-size: 1.1em;">
                                                        <span style=" padding-right: 0.8em">
                                                        Serial N<u>o</u>
                                                        </span>

                                                        <span style="" class="code-font">
                                                        <strong>{{ $visit->serial_number }}  </strong>
                                                        </span><br/>

                                                        <span style=" padding-right: 0.8em">
                                                        Created <b> {{ $visit->created_at }} </b>
                                                        </span><br>

                                                        <span class=" " style=" padding-right: 0.8em">
                                                        Consultation fee <b> {{ $visit->consultation_fee }} </b>
                                                        </span>
                                                    </h5>
                                                    <br/>
                                                </div>

                                                <!-- Encounter 1  Chief Complaint / Symptoms-->
                                                <div id="symptom" class="col-12 encounter-item"  >
                                                    <div class="row " >
                                                        <!-- Chief Complaint heading --->
                                                        <div class="col-12 ">
                                                            <div class="encounter-heading-holder">
                                                                <h4 class="encounter-heading">
                                                                    <i class="fa fa-frown"> </i>
                                                                    Chief Complaint / Symptoms
                                                                </h4>
                                                            </div>
                                                        </div>

                                                        <!-- Chief Complaint  body -->
                                                        <div class="col-12 ">
                                                            <div class="encounter-body">
                                                                <div>
                                                                    @foreach( $encounters as $encounter )
                                                                        @if( $encounter->encounter_code == 001 )
                                                                            @foreach( $encounter->encounterDatas as $encounterData )
                                                                                <p class="encounter-data">
                                                                                    <i class="fa fa-frown-open" style="color: #E74C3C; font-size: 0.9em"> </i>
                                                                                    {{ $encounterData->text_1 }}
                                                                                </p>
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <!-- Encounter 6 Final Diagnosis  -->
                                                <div id="advice" class="col-12 encounter-item"  >
                                                        <div class="row" >
                                                            <!--Advice heading --->
                                                            <div class="col-12 ">
                                                                <div class="encounter-heading-holder">
                                                                    <h4 class="encounter-heading">
                                                                        <i class="fa fa-clipboard-list"> </i>
                                                                        Final Diagnoses
                                                                    </h4>
                                                                </div>
                                                            </div>

                                                            <!-- Advice body -->
                                                            <div class="col-12 ">
                                                                <div class="encounter-body">
                                                                    <div>
                                                                        @foreach( $encounters as $encounter )
                                                                            @if( $encounter->encounter_code == 006 )
                                                                                @foreach( $encounter->encounterDatas as $encounterData )
                                                                                    <p class="encounter-data">
                                                                                        <i class="fa fa-check"> </i>
                                                                                        {{ $encounterData->text_1 }}
                                                                                    </p>
                                                                                @endforeach
                                                                            @endif
                                                                        @endforeach
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                <!-- Encounter 4 Prescriptions -->
                                                <div id="prescription" class="col-12 encounter-item"  >
                                                        <div class="row " >
                                                            <!--Prescriptions heading --->
                                                            <div class="col-12 ">
                                                                <div class="encounter-heading-holder">
                                                                    <h4 class="encounter-heading">
                                                                        <i class="fa fa-pills"> </i>
                                                                        Prescriptions
                                                                    </h4>
                                                                </div>
                                                            </div>

                                                            <!-- Prescriptions body -->
                                                            <div class="col-12 ">
                                                                <div class="encounter-body">

                                                                    <div>
                                                                        @foreach( $encounters as $encounter )
                                                                            @if( $encounter->encounter_code == 004 )
                                                                                @foreach( $encounter->encounterDatas as $encounterData )
                                                                                    <p class="prescription-item">
                                                                                        <i class="fa fa-capsules"> </i>
                                                                                        {{ $encounterData->text_1 }}
                                                                                    </p>
                                                                                @endforeach
                                                                            @endif
                                                                        @endforeach
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                <!-- Encounter 3  Investigations / Lab tests -->
                                                <div id="investigation" class="col-12 encounter-item"  >
                                                    <div class="row " >
                                                        <!-- Test/Investigation Heading -->
                                                        <div class="col-12 ">
                                                            <div class="encounter-heading-holder">
                                                                <h4 class="encounter-heading">
                                                                    <i class="fa fa-microscope"> </i>
                                                                    Investigations/Lab tests
                                                                </h4>
                                                            </div>
                                                        </div>

                                                        <!-- Test/Investigations body -->
                                                        <div class="col-12 ">
                                                            <div class="encounter-body">


                                                            <!-- List of Tests/Investigations Datas-->
                                                                <div>
                                                                    @foreach( $encounters as $encounter )
                                                                        @if( $encounter->encounter_code == 003 )
                                                                            @foreach( $encounter->encounterDatas as $i =>  $encounterData )
                                                                                <div class="investigation-item" style="padding-bottom: 0.4em">
                                                                                    <!-- Test/Investigation Description -->
                                                                                    <p class="encounter-data">
                                                                                        <i class="fa investigation-item-caret" > </i>
                                                                                        <i class="encounter-data-number">
                                                                                            Test ID: <b>LB-046-{{ $encounterData->id }}</b>
                                                                                        </i>
                                                                                        <span style="padding-left: 1em"> {{ $encounterData->text_1 }} </span>

                                                                                        <span class="float-left list-indicator ">
                                                                               #@php echo $i+1 @endphp
                                                                            </span>
                                                                                    </p>

                                                                                    <!-- ====PAYMENT-PAYMENT-PAYMENT======= -->
                                                                                    <!-- PAYMENT STATUS-->
                                                                                    @if( $encounterData->is_fee_paid)
                                                                                        <div style="margin-left: 0.8em;padding: 0.4em;">

                                                                                        <p class="status-paragraph">
                                                                                            <strong>
                                                                                              <i class="fa fa-money-bill-alt"></i>
                                                                                              Test Payment Status:
                                                                                            </strong>
                                                                                            <span style="color: #38c172 ">
                                                                                                <i class="fa fa-check-circle"></i>
                                                                                                Paid ,
                                                                                            </span>
                                                                                            <strong>
                                                                                            Tsh {{ $encounterData->fee_amount }}
                                                                                            </strong>
                                                                                        </p>
                                                                                        </div>
                                                                                    @else
                                                                                        <div style="margin-left: 0.8em;padding: 0.4em;">
                                                                                            <p   class="status-paragraph">
                                                                                                <b> <i class="fa fa-money-bill-alt"></i>
                                                                                                    Test Payment Status
                                                                                                </b>
                                                                                                <span style="color: #ee4a2f ">
                                                                                                <i class="fa fa-exclamation-triangle"></i>
                                                                                                Not Paid
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>
                                                                                    @endif


                                                                                    <!-- ====RESULTS RESULTS RESULTS======= -->
                                                                                    <!-- SAVED RESULTS -->
                                                                                    <div style="margin: 0.8em;padding: 0.8em;
                                                                                border: #1d68a7 1px dashed; background: #D7BDE2">
                                                                                        <b> <i class="fa fa-file-alt"> </i>
                                                                                            Saved Results
                                                                                        </b>
                                                                                        @if( count($encounterData->labResults)<1 )
                                                                                            <p style="color: #7D6608 "> No result saved</p>
                                                                                        @endif

                                                                                        @foreach( $encounterData->labResults as $labResult )
                                                                                            <p>
                                                                                                <i class="fa fa-file-alt"> </i>
                                                                                                {{ $labResult->remark }}
                                                                                                <a href="#" class=""> View </a>
                                                                                            </p>
                                                                                        @endforeach
                                                                                    </div>

                                                                                    {{-- TODO: check Permission --}}
                                                                                <!-- ADDING RESULTS FORM -->
                                                                                <!-- ==END==RESULTS RESULTS RESULTS======= -->
                                                                                </div>

                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <!-- Encounter 2  Physical examination-->
                                                <div id="examination" class="col-12 encounter-item"  >
                                                    <div class="row " >
                                                        <!--examination heading --->
                                                        <div class="col-12 ">
                                                            <div class="encounter-heading-holder">
                                                                <h4 class="encounter-heading">
                                                                    <i class="fa fa-stethoscope"> </i>
                                                                    Physical examination findings
                                                                </h4>
                                                            </div>
                                                        </div>

                                                        <!-- examination body -->
                                                        <div class="col-12 ">
                                                            <div class="encounter-body">

                                                                <div>
                                                                    @foreach( $encounters as $encounter )
                                                                        @if( $encounter->encounter_code == 002 )
                                                                            @foreach( $encounter->encounterDatas as $encounterData )
                                                                                <p class="encounter-data">
                                                                                    <i class="fa fa-caret-right"> </i>
                                                                                    {{ $encounterData->text_1 }}
                                                                                </p>
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <!-- Encounter 5 Advice  -->
                                                <div id="advice" class="col-12 encounter-item"  >
                                                    <div class="row" >
                                                        <!--Advice heading --->
                                                        <div class="col-12 ">
                                                            <div class="encounter-heading-holder">
                                                                <h4 class="encounter-heading">
                                                                    <i class="fa fa-clipboard-list"> </i>
                                                                    Advice
                                                                </h4>
                                                            </div>
                                                        </div>

                                                        <!-- Advice body -->
                                                        <div class="col-12 ">
                                                            <div class="encounter-body">
                                                                <div>
                                                                    @foreach( $encounters as $encounter )
                                                                        @if( $encounter->encounter_code == 005 )
                                                                            @foreach( $encounter->encounterDatas as $encounterData )
                                                                                <p class="encounter-data">
                                                                                    <i class="fa fa-check"> </i>
                                                                                    {{ $encounterData->text_1 }}
                                                                                </p>
                                                                            @endforeach
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
