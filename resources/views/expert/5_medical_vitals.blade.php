<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DMW | Doctor</title>

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

        .current-tab{
            background: #D1F2EB !important;
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




        .list-indicator{
            margin: 0 0em;
            padding: 0 0.5em;
            background: #000;
            color: white;
            border-radius: 1em;
        }

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

        .previous-visits-holder {
            padding: 1em;
        }

        .item-holder {
            background: #EAFAF1;
            padding: 0.8em 1.2em;
            margin-bottom: 3em;
            border-top-right-radius: 1em;
            border-top-left-radius: 1em;
            border-bottom-right-radius: 1em;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }

        .item-holder p {
            /*color: #7D6608;*/
            color: #000000;
            margin: 0 !important;
            font-size: 1.2em;
        }

        .active-form-nav {
            border-bottom: 3px solid #3498DB;
        }

        .fa-caret-right {
            font-size: 0.8em;
            color: #575757;
        }

        /**MEdical Backgrounf **/
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
            color: #D68910;
        }

        .medical-item{
        }

        .inner-bullet{
            background: #EAEAD9;
            padding: 6px;
            border-radius: 5px;
            color: #D35400;
            /*margin-left: 0.5em;*/
        }

        .dashed-form{
            background: #ffffff;
            padding: 1em;
            border: 1px dashed #555555;
            border-radius: 1em;
            margin: 1em 0;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .form-input-row {
            padding: 0.5em 0.2em 0.5em 0.2em;
        }


        .form-label {
            text-align: right;
            font-size: 1em;
        }

        .tiny-button{
            padding: 2px !important;
            line-height: 1em;
            font-size: 0.9em;
            border: none;
        }

        .tiny-add-button{
            background: #873600 !important;
            padding: 2px 6px !important;
        }


        .padded-button{
            padding: 2px 6px !important;

        }

        .btn-shadowed{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .light-font{
            font-weight: 200;
        }

    </style>

</head>


<body  data-spy="scroll" data-offset="60">

<div id="app">
    <div class="container-fluid">

        <div class="row">

            <!--Left Navigation -->
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
                                    <div class="card-header">
                                        <a href="#" class="btn btn-sm btn-danger float-right">
                                            <i class="fa fa-user-times"> </i> Close
                                        </a>
                                    </div>

                                    <div class="card-body" >
                                    @include('expert.components.wallet_tabs')

                                    <!-- Current VISIT -->
                                        <div class="visit-holder">

                                                <div class="row current-visit" >

                                                    <!-- Today's Visit heading -->
                                                    <div class="col-12">
                                                        <h2 style=" display: inline-block">
                                                            <i class="fa fa-heartbeat "></i>
                                                            Vitals
                                                        </h2>
                                                    </div>

                                                    <div  class="col-12 encounter-item"  >
                                                        <div class="row previous-visits-holder">

                                                            <!--1.0 VITALS -->
                                                            <div class="col-md-11 ">
                                                                <div class="visit-item">
                                                                    <h4> <i class="fa fa-thermometer-half"></i>
                                                                        Vital Signs
                                                                    </h4>

                                                                    <div class="row">
                                                                        <!-- Vital Sign-->
                                                                        @foreach( $user->vitalSigns as $vitalSign)
                                                                            <div class="col-md-4">
                                                                                <ul class="medical-item" style="list-style: none">
                                                                                    <li class="vital-heading">
                                                                                        {{ $vitalSign->name }}
                                                                                    </li>
                                                                                    <li>
                                                                                        <i class="fa {{ $vitalSign->icon }}" style="color: #{{ $vitalSign->color }}"> </i>
                                                                                        67 {{ $vitalSign->si_unit  }}
                                                                                    </li>
                                                                                    <li>Last Recorded <i>  May 2,2019</i> </li>
                                                                                    <li>
                                                                                        <a href="{{ route('expert.user.medical.vital_sign.trend') }}/{{ $vitalSign->id }}/records">
                                                                                            Open
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        @endforeach


                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <!--2.0 Conditions, Diseases & Complications, Issues-->
                                                            <div id="medical-issue" class="col-md-11 ">
                                                                <div class="visit-item">
                                                                    <h4> <i class="fa fa-user-injured"></i>
                                                                        Medical Issues & Diseases

                                                                    </h4>

                                                                    <div class="row">

                                                                        @foreach($user->medicalConditions as $medicalCondition )
                                                                            <div class="col-md-4">
                                                                                <ul style="list-style: none">
                                                                                    <li class="disease-heading">
                                                                                        {{ $medicalCondition->name }}
                                                                                    </li>
                                                                                    <li > Diagnosed: {{ $medicalCondition->diagnosed_at }} </li>



                                                                                </ul>
                                                                            </div>
                                                                        @endforeach

                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <!--3.0 Current Medications -->
                                                            <div id="medications" class="col-md-11 ">
                                                                <div class="visit-item">
                                                                    <h4> <i class="fa fa-pills"></i>
                                                                        Recent Medications
                                                                    </h4>

                                                                    <div class="row">
                                                                        @foreach( $user->medications as $medication)
                                                                            <div class="col-md-4">
                                                                                <ul style="list-style: none">
                                                                                    <li class="immunization-heading">
                                                                                        {{ $medication->name }}
                                                                                    </li>
                                                                                    <li> Prescribed for: {{ $medication->taken_for }}</li>
                                                                                    <li> Taken from: {{ $medication->started_at }}</li>
                                                                                    <li> To : {{ $medication->ended_at }} </li>
                                                                                    <li> Instruction: {{ $medication->instruction }} </li>
                                                                                    <li> Intake_method: {{ $medication->intake_method }} </li>
                                                                                    <li> Results: {{ $medication->results }} </li>
                                                                                    <li> Notes: {{ $medication->notes }} </li>
                                                                                </ul>
                                                                            </div>
                                                                        @endforeach

                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <!--4.0 Allergies -->
                                                            <div id="allergies" class="col-md-11 ">

                                                                <div class="visit-item">
                                                                    <h4> <i class="fa fa-frown-open"></i>
                                                                        Allergies
                                                                    </h4>

                                                                    <div class="row">
                                                                        @foreach($user->allergies as $allergy)
                                                                            <div class="col-md-4">
                                                                                <ul style="list-style: none">
                                                                                    <li class="allergy-heading">
                                                                                        {{ $allergy->name }}
                                                                                    </li>
                                                                                    <li> Reaction: {{ $allergy->reaction }} </li>
                                                                                    <li> Severity: {{ $allergy->severity  }} </li>
                                                                                </ul>
                                                                            </div>
                                                                        @endforeach

                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <!--5.0 Immunizations -->
                                                            <div id="immunizations" class="col-md-11 ">

                                                                <div class="visit-item">
                                                                    <h4> <i class="fa fa-syringe"></i>
                                                                        Immunizations
                                                                    </h4>

                                                                    <div class="row">

                                                                        @foreach($user->immunizations as $immunization)
                                                                            <div class="col-md-6">
                                                                                <ul style="list-style: none">
                                                                                    <li class="immunization-heading">
                                                                                        {{ $immunization->name }}
                                                                                    </li>
                                                                                    <li> Prescribed for: {{ $immunization->prescribed_for }} </li>
                                                                                    <li> Dosage: {{ $immunization->dosage == null ? "Not Available": $immunization->dosage }}</li>
                                                                                </ul>
                                                                            </div>
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
