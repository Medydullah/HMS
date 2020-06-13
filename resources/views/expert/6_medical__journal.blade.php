<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HIMS | Doctor</title>

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

        .current-tab {
            background: #D1F2EB !important;
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

        .visit-holder {
            padding: 2em 2em;
            background: #D1F2EB;
        }

        .current-visit {
            /*border-left: 5px solid #D4AC0D;*/
            margin: 0.5em;
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
            padding: 0.4em 1em 0.1em 1.5em;
            display: inline-block;
            margin: 0;
            border-top-left-radius: 0.5em;
            border-top-right-radius: 0.5em;
        }

        .selected-visit_record {
            margin: 0.5em;
            padding: 1em;
            border-top-left-radius: 1.4em;
            border-top-right-radius: 1.4em;
            background: #ffffff;
        }

        .encounter-heading-holder {
            border-bottom: 3px solid #707B7C;
        }

        .encounter-body {
            border: 2px solid #707B7C;
            padding: 0.5em 2em;
        }

        .encounter-data {
            margin: 0.2em 0 0.5em 0.5em !important;
        }

        .btn-sm {
            border-radius: 1em;
            padding: 0.1em 1em;
        }


        .action-button {
            margin: 0.2em 0 0.5em 0.5em;
            padding: 2px 0.8em !important;
            border-radius: 0.8em;
            line-height: 1 !important;
        }

        .encounter-data {
            margin: 0;
            font-size: 1.2em;
        }


        .list-indicator {
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
        .previous-visits-holder {
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

        .visit-item p {
            /*color: #7D6608;*/
            color: #000000;
            margin: 0 !important;
            font-size: 1.2em;
        }

        .active-form-nav {
            border-bottom: 3px solid #3498DB;
        }

        .fa-adjust {
            font-size: 0.8em;
        }

        .vital-heading {
            font-size: 1.4em;
            color: #28B463;
        }

        .allergy-heading {
            font-size: 1.4em;
            color: #E74C3C;
        }

        .disease-heading {
            font-size: 1.4em;
            color: #E74C3C;
        }

        .immunization-heading {
            font-size: 1.4em;
            color: #D68910;
        }

        .medical-item {
        }

        .inner-bullet {
            background: #EAEAD9;
            padding: 6px;
            border-radius: 5px;
            color: #D35400;
            /*margin-left: 0.5em;*/
        }

        .dashed-form {
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

        .tiny-button {
            padding: 2px !important;
            line-height: 1em;
            font-size: 0.9em;
            border: none;
        }

        .tiny-add-button {
            background: #873600 !important;
            padding: 2px 6px !important;
        }


        .padded-button {
            padding: 2px 6px !important;

        }

        .btn-shadowed {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .light-font {
            font-weight: 200;
        }

        .visit-item {
            padding: 0.8em 1.2em;
            margin-bottom: 3em;
            border-radius: 1em;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

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

        .visit-item p {
            /*color: #7D6608;*/
            color: #444444;
            margin: 0 !important;
        }


    </style>

</head>


<body data-spy="scroll" data-offset="60">

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

                                    <div class="card-body">
                                    @include('expert.components.wallet_tabs')

                                    <!-- Current VISIT -->
                                        <div class="visit-holder">

                                            <div class="row current-visit">

                                                <!-- Today's Visit heading -->
                                                <div class="col-12">
                                                    <h2 style=" display: inline-block">
                                                        <i class="fa fa-scroll "></i>
                                                        Medical Journal
                                                    </h2>
                                                </div>

                                                <div class="row previous-visits-holder">

                                                    @if($viewMode == 'journal_records')
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
                                                                               href="{{ route('expert.user.medical.journal.record') }}/{{ $visit->id }}/{{ $journalRecord->data->id }}">
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
                                                                        <p>
                                                                            <i class="fa fa-money-bill-alt"></i>
                                                                            Doctor
                                                                            <strong>{{  Auth::user()->name  }} </strong>
                                                                        </p>
                              

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
                                                                            From
                                                                            <strong> {{ $journalRecord->data->started_at }}  </strong>
                                                                            To
                                                                            <strong> {{ $journalRecord->data->ended_at }}  </strong>
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
                                                    @endif

                                                    @if( $viewMode == 'record_details')

                                                        <div class=" ">
                                                            <div class="row selected-visit_record">
                                                                <div style="padding: 1em">

                                                                    <!-- Today's Visit Accounts Summary -->
                                                                    <div class="col-12">
                                                                        <h5>
                                                                            <a class="btn btn-sm btn-primary"
                                                                               href="{{ route('expert.user.medical.journal') }}/{{ $visit->id }}">
                                                                                <i class="fa fa-arrow-left"> </i>
                                                                                Back
                                                                            </a>
                                                                        </h5>
                                                                        <h5 style="font-size: 1.1em;">
                                                                <span style="font-size: 1.4em">
                                                                Hospital visit service form
                                                                </span> <br/> <br/>

                                                                            <span style=" padding-right: 0.8em">
                                                                Serial N<u>o</u>
                                                                </span>

                                                                            <span style=""
                                                                                  class="code-font">
                                                                <strong>{{ $selectedVisitRecord->serial_number }}  </strong>
                                                                </span><br/>

                                                                            <span style=" padding-right: 0.8em">
                                                                Created <b> {{ $selectedVisitRecord->created_at }} </b>
                                                                </span><br>

                                                                            <span class=" "
                                                                                  style=" padding-right: 0.8em">
                                                                Consultation fee <b> {{ $selectedVisitRecord->consultation_fee }} </b>
                                                                </span>
                                                                        </h5>
                                                                        <br/>
                                                                    </div>

                                                                    <!-- Encounter 1  Chief Complaint / Symptoms-->
                                                                    <div id="symptom"
                                                                         class="col-12 encounter-item">
                                                                        <div class="row ">
                                                                            <!-- Chief Complaint heading --->
                                                                            <div class="col-12 ">
                                                                                <div class="encounter-heading-holder">
                                                                                    <h4 class="encounter-heading">
                                                                                        <i class="fa fa-frown"> </i>
                                                                                        Chief
                                                                                        Complaint /
                                                                                        Symptoms
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
                                                                                                        <i class="fa fa-frown-open"
                                                                                                           style="color: #E74C3C; font-size: 0.9em"> </i>
                                                                                                        {{ $encounterData->text_1 }}
                                                                                                    </p>
                                                                                                @endforeach
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </div>

                                                                                    @if( $editMode == 'new_symptom')
                                                                                        <div>
                                                                                            <form action="{{ route('hce.patient.consultation.symptom.save') }}"
                                                                                                  method="POST">
                                                                                                {{ @csrf_field() }}
                                                                                                <input type="hidden"
                                                                                                       name="encounter_code"
                                                                                                       value="001">
                                                                                                <input type="hidden"
                                                                                                       name="encounter_description"
                                                                                                       value="Chief Complaint/Symptoms">

                                                                                                <div class="form-group">
                                                                                                    <label for="comment">Enter
                                                                                                        Complaint/Symptom</label>
                                                                                                    <textarea
                                                                                                            name="text_1"
                                                                                                            class="form-control"
                                                                                                            rows="1"
                                                                                                            id="comment"></textarea>
                                                                                                </div>

                                                                                                <div class="form-group">
                                                                                                    <button type="submit"
                                                                                                            class="btn btn-sm btn-outline-success">
                                                                                                        <i class="fa fa-save"> </i>
                                                                                                        Save
                                                                                                        complaint/Symptom
                                                                                                    </button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    @endif

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>


                                                                    <!-- Encounter 6 Final Diagnoses -->
                                                                    <div id="prescription"
                                                                         class="col-12 encounter-item">
                                                                        <div class="row ">
                                                                            <!--Prescriptions heading --->
                                                                            <div class="col-12 ">
                                                                                <div class="encounter-heading-holder">
                                                                                    <h4 class="encounter-heading">
                                                                                        <i class="fa fa-clipboard"> </i>
                                                                                        Final Diagnoses
                                                                                    </h4>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Prescriptions body -->
                                                                            <div class="col-12 ">
                                                                                <div class="encounter-body">

                                                                                    <div>
                                                                                        @foreach( $encounters as $encounter )
                                                                                            @if( $encounter->encounter_code == 006 )
                                                                                                @foreach( $encounter->encounterDatas as $encounterData )
                                                                                                    <p class="prescription-item">
                                                                                                        <i class="fa fa-clipboard"> </i>
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
                                                                    <div id="prescription"
                                                                         class="col-12 encounter-item">
                                                                        <div class="row ">
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
                                                                    <div id="investigation"
                                                                         class="col-12 encounter-item">
                                                                        <div class="row ">
                                                                            <!-- Test/Investigation Heading -->
                                                                            <div class="col-12 ">
                                                                                <div class="encounter-heading-holder">
                                                                                    <h4 class="encounter-heading">
                                                                                        <i class="fa fa-microscope"> </i>
                                                                                        Investigations/Lab
                                                                                        tests
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
                                                                                                    <div class="investigation-item"
                                                                                                         style="padding-bottom: 0.4em">
                                                                                                        <!-- Test/Investigation Description -->
                                                                                                        <p class="encounter-data">
                                                                                                            <i class="fa investigation-item-caret"> </i>
                                                                                                            <i class="encounter-data-number">
                                                                                                                Test
                                                                                                                ID:
                                                                                                                <b>LB-046-{{ $encounterData->id }}</b>
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
                                                                                                                        Test
                                                                                                                        Payment
                                                                                                                        Status:
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
                                                                                                                <p class="status-paragraph">
                                                                                                                    <b>
                                                                                                                        <i class="fa fa-money-bill-alt"></i>
                                                                                                                        Test
                                                                                                                        Payment
                                                                                                                        Status
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
                                                                                                            <b>
                                                                                                                <i class="fa fa-file-alt"> </i>
                                                                                                                Saved
                                                                                                                Results
                                                                                                            </b>
                                                                                                            @if( count($encounterData->labResults)<1 )
                                                                                                                <p style="color: #7D6608 ">
                                                                                                                    No
                                                                                                                    result
                                                                                                                    saved</p>
                                                                                                            @endif

                                                                                                            @foreach( $encounterData->labResults as $labResult )
                                                                                                                <p>
                                                                                                                    <i class="fa fa-file-alt"> </i>
                                                                                                                    {{ $labResult->remark }}
                                                                                                                    <a href="#"
                                                                                                                       class="">
                                                                                                                        View </a>
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
                                                                    <div id="examination"
                                                                         class="col-12 encounter-item">
                                                                        <div class="row ">
                                                                            <!--examination heading --->
                                                                            <div class="col-12 ">
                                                                                <div class="encounter-heading-holder">
                                                                                    <h4 class="encounter-heading">
                                                                                        <i class="fa fa-stethoscope"> </i>
                                                                                        Physical
                                                                                        examination
                                                                                        findings
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
                                                                    <div id="advice"
                                                                         class="col-12 encounter-item">
                                                                        <div class="row">
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


</body>
</html>
