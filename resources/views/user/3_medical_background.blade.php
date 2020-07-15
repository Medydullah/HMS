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
                                                            <i class="fa fa-heartbeat "></i>
                                                            Medical Background
                                                        </h2>
                                                    </div>

                                                    <div  class="col-12 encounter-item"  >
                                                        <div class="row previous-visits-holder">

                                                            <!--1.0 VITALS -->
                                                            <div class="col-md-12 ">
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
                                                                                        <a href="{{ route('user.info.medical.vital_sign.trend') }}/{{ $vitalSign->id }}/records">
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
                                                            <div id="medical-issue" class="col-md-12 ">
                                                                <div class="visit-item">
                                                                        <h4> <i class="fa fa-user-injured"></i>
                                                                            Medical Issues & Diseases
                                                                            <a class="nav-link btn btn-sm btn-primary float-right btn-shadowed"
                                                                               href="{{ route('user.info.medical.condition.new') }}#medical-issue">
                                                                                <i class="fa fa-plus-square"> </i>
                                                                                Add Medical Issues
                                                                            </a>
                                                                        </h4>

                                                                        <div class="row">

                                                                            @if( $editMode == "medical_condition")
                                                                            <!-- Add Medical Condition-->
                                                                            <div class="col-12">
                                                                                <form action="{{ route('user.info.medical.condition.save') }}" method="POST">
                                                                                    {{ @csrf_field() }}
                                                                                    <div class="dashed-form">
                                                                                        <!-- form heading -->
                                                                                        <h4>
                                                                                           <span class="section-heading">
                                                                                               <i class="fa fa-pen"></i>
                                                                                              Medical Condition
                                                                                           </span>
                                                                                            <a href="{{ route('user.info.medical') }}#medical-issue"
                                                                                               class="btn btn-sm btn-danger float-right">
                                                                                                <i class="fa fa-times"></i>
                                                                                                Cancel
                                                                                            </a>
                                                                                        </h4>

                                                                                        <!--2.1 Condition/Issue/Disease name -->
                                                                                        <div class="row form-input-row">
                                                                                            <label for="name" class="col-md-4 form-label">
                                                                                                Condition/Issue/Disease</label>
                                                                                            <div class=" col-md-8">
                                                                                                <input type="text" class="form-control " id="name"
                                                                                                       value=" "
                                                                                                       name="name"  required>
                                                                                            </div>
                                                                                        </div>

                                                                                        <!--2.2 Since (Diagnosed at) -->
                                                                                        <div class="row form-input-row">
                                                                                            <label for="diagnosed_at" class="col-md-4 form-label">
                                                                                                Since</label>
                                                                                            <div class=" col-md-8">
                                                                                                <input type="date" class="form-control " id="diagnosed_at"
                                                                                                       value=" "
                                                                                                       name="diagnosed_at">
                                                                                            </div>
                                                                                        </div>


                                                                                        <!-- Save button -->
                                                                                        <div class="row form-input-row justify-content-center">
                                                                                            <button type="submit" class="btn btn-sm btn-primary col-md-8">
                                                                                                SAVE
                                                                                            </button>
                                                                                        </div>

                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                            <!-- [end] Add Medical Condition-->
                                                                            @endif

                                                                            @foreach($user->medicalConditions as $medicalCondition )
                                                                            <div class="col-md-4">
                                                                                <ul style="list-style: none">
                                                                                    <li class="disease-heading">
                                                                                        {{ $medicalCondition->name }}
                                                                                        <a class="fa fa-pencil-alt padded-button" href="#">
                                                                                            <span class="light-font">Edit</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li > Diagnosed: {{ $medicalCondition->diagnosed_at }} </li>

                                                                                    {{--<!--Lab results -->--}}
                                                                                    {{--<li style="padding-bottom: 6px"> <strong>Lab results</strong>--}}
                                                                                        {{--<a class="btn tiny-button tiny-add-button btn-primary" href="">--}}
                                                                                            {{--Add--}}
                                                                                        {{--</a>--}}
                                                                                        {{--<ol>--}}
                                                                                            {{--<li>--}}
                                                                                                {{--<a class="btn tiny-button btn-outline-success" href="">--}}
                                                                                                   {{--<i class="fa fa-file-medical-alt"></i> HGC--}}
                                                                                                {{--</a>--}}
                                                                                            {{--</li>--}}
                                                                                            {{--<li>--}}
                                                                                                {{--<a class="btn tiny-button btn-outline-success" href="">--}}
                                                                                                    {{--<i class="fa fa-file-medical-alt"></i> Blood profile--}}
                                                                                                {{--</a>--}}
                                                                                            {{--</li>--}}
                                                                                        {{--</ol>--}}
                                                                                    {{--</li>--}}

                                                                                    {{--<!--Lab Medications -->--}}
                                                                                    {{--<li style="padding-bottom: 6px"> <strong>Medications</strong>--}}
                                                                                        {{--<a class="btn tiny-button tiny-add-button btn-primary" href="">--}}
                                                                                            {{--Add--}}
                                                                                        {{--</a>--}}
                                                                                        {{--<ol>--}}
                                                                                            {{--<li>--}}
                                                                                                {{--<a class="btn tiny-button btn-outline-success" href="">--}}
                                                                                                    {{--<i class="fa fa-pills"></i>   Indomethacin--}}
                                                                                                {{--</a>--}}
                                                                                            {{--</li>--}}
                                                                                            {{--<li>--}}
                                                                                                {{--<a class="btn tiny-button btn-outline-success" href="">--}}
                                                                                                    {{--<i class="fa fa-pills"></i> Ibuprofen--}}
                                                                                                {{--</a>--}}
                                                                                            {{--</li>--}}
                                                                                        {{--</ol>--}}
                                                                                    {{--</li>--}}

                                                                                </ul>
                                                                            </div>
                                                                            @endforeach

                                                                        </div>

                                                                    </div>
                                                            </div>

                                                            <!--3.0 Current Medications -->
                                                            <div id="medications" class="col-md-12 ">
                                                                    <div class="visit-item">
                                                                        <h4> <i class="fa fa-pills"></i>
                                                                              Medications
                                                                            <a class=" nav-link  btn btn-sm  btn-primary float-right btn-shadowed"
                                                                               href="{{ route('user.info.medical.medication.new') }}#add-medication">
                                                                                <i class="fa fa-plus-square"> </i>
                                                                                Add Medication
                                                                            </a>
                                                                        </h4>

                                                                        <div class="row">
                                                                            @if( $editMode == "medication")
                                                                               <!-- Add Medical Condition-->
                                                                                <div id="add-medication" class="col-12">
                                                                                    <form action="{{ route('user.info.medical.medication.save') }}" method="POST">
                                                                                        {{ @csrf_field() }}
                                                                                        <div class="dashed-form">
                                                                                            <!-- form heading -->
                                                                                            <h4>
                                                                                           <span class="section-heading">
                                                                                               <i class="fa fa-pen"></i>
                                                                                              Add Medication
                                                                                           </span>
                                                                                                <a href="{{ route('user.info.medical') }}#medications"
                                                                                                   class="btn btn-sm btn-danger float-right">
                                                                                                    <i class="fa fa-times"></i>
                                                                                                    Cancel
                                                                                                </a>
                                                                                            </h4>

                                                                                            <!--2.1 Name -->
                                                                                            <div class="row form-input-row">
                                                                                                <label for="name" class="col-md-4 form-label">
                                                                                                    Name</label>
                                                                                                <div class=" col-md-8">
                                                                                                    <input type="text" class="form-control " id="name"
                                                                                                           value=""
                                                                                                           name="name"  required>
                                                                                                </div>
                                                                                            </div>

                                                                                            <!--2.2 Reason -->
                                                                                            <div class="row form-input-row">
                                                                                                <label for="diagnosed_at" class="col-md-4 form-label">
                                                                                                    Taken for (Reason)</label>
                                                                                                <div class=" col-md-8">
                                                                                                    <input type="text" class="form-control " id="diagnosed_at"
                                                                                                           value=""
                                                                                                           name="taken_for" required>
                                                                                                </div>
                                                                                            </div>

                                                                                            <!--2.2 Started -->
                                                                                            <div class="row form-input-row">
                                                                                                <label for="diagnosed_at" class="col-md-4 form-label">
                                                                                                    Started</label>
                                                                                                <div class=" col-md-8">
                                                                                                    <input type="date" class="form-control " id="diagnosed_at"
                                                                                                           value=""
                                                                                                           name="started_at">
                                                                                                </div>
                                                                                            </div>

                                                                                            <!--2.3 Ended  -->
                                                                                            <div class="row form-input-row">
                                                                                                <label for="diagnosed_at" class="col-md-4 form-label">
                                                                                                    Ended</label>
                                                                                                <div class=" col-md-8">
                                                                                                    <input type="date" class="form-control " id="diagnosed_at"
                                                                                                           value=""
                                                                                                           name="ended_at">
                                                                                                </div>
                                                                                            </div>

                                                                                            <!--2.4  Instructions-->
                                                                                            <div class="row form-input-row">
                                                                                                <label for="diagnosed_at" class="col-md-4 form-label">
                                                                                                    Instructions</label>
                                                                                                <div class=" col-md-8">
                                                                                                    <input type="text" class="form-control " id="diagnosed_at"
                                                                                                           value="" placeholder="E.g 2 after lunch, daily "
                                                                                                           name="instruction">
                                                                                                </div>
                                                                                            </div>

                                                                                            <!--2.5  Intake method-->
                                                                                            <div class="row form-input-row">
                                                                                                <label for="diagnosed_at" class="col-md-4 form-label">
                                                                                                    Intake method</label>
                                                                                                <div class=" col-md-8">
                                                                                                    <input type="text" class="form-control " id="diagnosed_at"
                                                                                                           value="" placeholder="E.g Via Mouth"
                                                                                                           name="intake_method">
                                                                                                </div>
                                                                                            </div>

                                                                                            <!--2.5  Results-->
                                                                                            <div class="row form-input-row">
                                                                                                <label for="results" class="col-md-4 form-label">
                                                                                                    Results</label>
                                                                                                <div class=" col-md-8">
                                                                                                    <input type="text" class="form-control " id="results"
                                                                                                           value="" placeholder="E.g Cured, Improved"
                                                                                                           name="results">
                                                                                                </div>
                                                                                            </div>



                                                                                            <!-- Save button -->
                                                                                            <div class="row form-input-row justify-content-center">
                                                                                                <button type="submit" class="btn btn-sm btn-primary col-md-8">
                                                                                                    SAVE
                                                                                                </button>
                                                                                            </div>

                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                <!-- [end] Add  Medication-->
                                                                            @endif

                                                                            @foreach( $user->medications as $medication)
                                                                            <div class="col-md-4">
                                                                                <ul style="list-style: none">
                                                                                    <li class="immunization-heading">
                                                                                        {{ $medication->name }}
                                                                                        <a class="fa fa-pencil-alt padded-button"
                                                                                                  href="#"  >
                                                                                            Edit
                                                                                        </a>
                                                                                    </li>
                                                                                    <li> Taken for: <strong> {{ $medication->taken_for }} </strong> </li>
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
                                                            <div id="allergies" class="col-md-12 ">

                                                                <div class="visit-item">
                                                                    <h4> <i class="fa fa-frown-open"></i>
                                                                        Allergies
                                                                        <a class=" nav-link  btn btn-sm  btn-primary float-right  btn-shadowed"
                                                                           href="{{ route('user.info.medical.allergy.new') }}#allergies">
                                                                            <i class="fa fa-plus-square"> </i>
                                                                            Add Allergy
                                                                        </a>
                                                                    </h4>

                                                                    <div class="row">
                                                                        @if( $editMode == "add_allergy")
                                                                        <!-- Add Medical Condition-->
                                                                        <div id="add-allergies" class="col-12">
                                                                                <form action="{{ route('user.info.medical.allergy.save') }}" method="POST">
                                                                                    {{ @csrf_field() }}
                                                                                    <div class="dashed-form">
                                                                                        <!-- form heading -->
                                                                                        <h4>
                                                                                           <span class="section-heading">
                                                                                               <i class="fa fa-pen"></i>
                                                                                              Add Allergy
                                                                                           </span>
                                                                                            <a href="{{ route('user.info.medical') }}#allergies"
                                                                                               class="btn btn-sm btn-danger float-right">
                                                                                                <i class="fa fa-times"></i>
                                                                                                Cancel
                                                                                            </a>
                                                                                        </h4>

                                                                                        <!--2.1 Name -->
                                                                                        <div class="row form-input-row">
                                                                                            <label for="name" class="col-md-4 form-label">
                                                                                                Name</label>
                                                                                            <div class=" col-md-8">
                                                                                                <input type="text" class="form-control " id="name"
                                                                                                       value=""
                                                                                                       name="name"  required>
                                                                                            </div>
                                                                                        </div>

                                                                                        <!--2.2 Reaction -->
                                                                                        <div class="row form-input-row">
                                                                                            <label for="reaction" class="col-md-4 form-label">
                                                                                                Reaction</label>
                                                                                            <div class=" col-md-8">
                                                                                                <input type="text" class="form-control " id="reaction"
                                                                                                       value=""
                                                                                                       name="reaction" required>
                                                                                            </div>
                                                                                        </div>

                                                                                        <!--2.2 Severity -->
                                                                                        <div class="row form-input-row">
                                                                                            <label for="severity" class="col-md-4 form-label">
                                                                                                Severity</label>
                                                                                            <div class=" col-md-8">
                                                                                                <input type="text" class="form-control " id="severity"
                                                                                                       value=""
                                                                                                       name="severity">
                                                                                            </div>
                                                                                        </div>

                                                                                        <!--2.3 Notes  -->
                                                                                        <div class="row form-input-row">
                                                                                            <label for="notes" class="col-md-4 form-label">
                                                                                                Notes</label>
                                                                                            <div class=" col-md-8">
                                                                                                <input type="text" class="form-control " id="notes"
                                                                                                       value=""
                                                                                                       name="notes">
                                                                                            </div>
                                                                                        </div>


                                                                                        <!-- Save button -->
                                                                                        <div class="row form-input-row justify-content-center">
                                                                                            <button type="submit" class="btn btn-sm btn-primary col-md-8">
                                                                                                SAVE
                                                                                            </button>
                                                                                        </div>

                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        <!-- [end] Add  Medication-->
                                                                        @endif

                                                                        @foreach($user->allergies as $allergy)
                                                                        <div class="col-md-4">
                                                                            <ul style="list-style: none">
                                                                                <li class="allergy-heading">
                                                                                    {{ $allergy->name }}
                                                                                    <a class="fa fa-pencil-alt padded-button" href="#">
                                                                                        <span class="light-font">Edit</span>
                                                                                    </a>
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
                                                            <div id="immunizations" class="col-md-12 ">

                                                                <div class="visit-item">
                                                                    <h4> <i class="fa fa-syringe"></i>
                                                                        Immunizations
                                                                        <a class="nav-link btn btn-sm btn-primary float-right btn-shadowed"
                                                                           href="{{ route('user.info.medical.immunizations.new') }}#immunizations">
                                                                            <i class="fa fa-plus-square"> </i>
                                                                            Add Immunizations
                                                                        </a>
                                                                    </h4>

                                                                    <div class="row">

                                                                        @if( $editMode == "add_immunization")
                                                                        <!-- Add Medical Condition-->
                                                                            <div id="add-medication" class="col-12">
                                                                                <form action="{{ route('user.info.medical.immunizations.save') }}" method="POST">
                                                                                    {{ @csrf_field() }}
                                                                                    <div class="dashed-form">
                                                                                        <!-- form heading -->
                                                                                        <h4>
                                                                                           <span class="section-heading">
                                                                                               <i class="fa fa-pen"></i>
                                                                                              Add Immunizations
                                                                                           </span>
                                                                                            <a href="{{ route('user.info.medical') }}#immunizations"
                                                                                               class="btn btn-sm btn-danger float-right">
                                                                                                <i class="fa fa-times"></i>
                                                                                                Cancel
                                                                                            </a>
                                                                                        </h4>

                                                                                        <!--2.1 Name -->
                                                                                        <div class="row form-input-row">
                                                                                            <label for="name" class="col-md-4 form-label">
                                                                                                Name</label>
                                                                                            <div class=" col-md-8">
                                                                                                <input type="text" class="form-control " id="name"
                                                                                                       value=""
                                                                                                       name="name"  required>
                                                                                            </div>
                                                                                        </div>

                                                                                        <!--2.2 Dosage -->
                                                                                        <div class="row form-input-row">
                                                                                            <label for="dosage" class="col-md-4 form-label">
                                                                                                Dosage</label>
                                                                                            <div class=" col-md-8">
                                                                                                <input type="text" class="form-control " id="dosage"
                                                                                                       value=""
                                                                                                       name="dosage" >
                                                                                            </div>
                                                                                        </div>

                                                                                        <!--2.2 Prescribed For -->
                                                                                        <div class="row form-input-row">
                                                                                            <label for="prescribed_for" class="col-md-4 form-label">
                                                                                                Prescribed For</label>
                                                                                            <div class=" col-md-8">
                                                                                                <input type="text" class="form-control " id="prescribed_for"
                                                                                                       value=""
                                                                                                       name="prescribed_for">
                                                                                            </div>
                                                                                        </div>

                                                                                        <!--2.3 Completed at  -->
                                                                                        <div class="row form-input-row">
                                                                                            <label for="completed_at" class="col-md-4 form-label">
                                                                                                Completed at</label>
                                                                                            <div class=" col-md-8">
                                                                                                <input type="date" class="form-control " id="completed_at"
                                                                                                       value="" name="completed_at">
                                                                                            </div>
                                                                                        </div>


                                                                                        <!-- Save button -->
                                                                                        <div class="row form-input-row justify-content-center">
                                                                                            <button type="submit" class="btn btn-sm btn-primary col-md-8">
                                                                                                SAVE
                                                                                            </button>
                                                                                        </div>

                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                            <!-- [end] Add  Medication-->
                                                                        @endif

                                                                        @foreach($user->immunizations as $immunization)
                                                                        <div class="col-md-6">
                                                                            <ul style="list-style: none">
                                                                                <li class="immunization-heading">
                                                                                    {{ $immunization->name }}
                                                                                    <a class="fa fa-pencil-alt padded-button" href="#">
                                                                                        <span class="light-font">Edit</span>
                                                                                    </a>
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
