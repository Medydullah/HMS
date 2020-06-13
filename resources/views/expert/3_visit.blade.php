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

        .add-result-form{
            margin: 1em 4em !important;
            padding: 1em;
            border: 1px solid #aaa;
            background: #F9E79F;
        }

        .add-encounter-form{
            margin: 1em 4em !important;
            padding: 1em;
            border: 1px solid #aaa;
            background: #ABEBC6;
        }

        .add-payment-form{
            background: #F9E79F;
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

                                                <!-- Today's Visit Accounts Summary -->
                                                <div class="col-12">
                                                    <h3 style="display: inline-block">
                                                        <i class="fa fa-user-clock"></i> <strong>Current Visit </strong>
                                                    </h3>

                                                    <h5 class=" float-right">
                                                         <span style="font-size: 0.8em; padding-right: 0.8em">
                                                           Serial N<u>o</u> {{ $visit->serial_number }}
                                                        </span>
                                                        <br/>
                                                        <span style="font-size: 0.8em; padding-right: 0.8em">
                                                           Created <b> {{ $visit->created_at }} </b>
                                                        </span> <br>

                                                        <span class=" " style="font-size: 0.8em; padding-right: 0.8em">
                                                           Consultation fee <b> {{ $visit->consultation_fee }} </b>
                                                        </span>

                                                    </h5>
                                                    <br/>
                                                </div>

                                                @role('doctor')
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

                                                                @if( $editMode == 'new_symptom')
                                                                <div>
                                                                    <form action="{{ route('hce.patient.consultation.symptom.save') }}"  method="POST">
                                                                        {{ @csrf_field() }}
                                                                        <input type="hidden" name="visit_id" value="{{ $visit->id }}">
                                                                        <input type="hidden" name="encounter_code" value="001">
                                                                        <input type="hidden" name="encounter_description" value="Chief Complaint/Symptoms">

                                                                        <div class="form-group">
                                                                            <label for="comment">Enter Complaint/Symptom</label>
                                                                            <textarea name="text_1" class="form-control" rows="1" id="comment"></textarea>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                                                <i class="fa fa-save"> </i>
                                                                                Save complaint/Symptom
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                                @else
                                                                <div class="form-group" style="padding: 0.3em">
                                                                    <a  class="btn btn-link"
                                                                        href="{{ route('hce.patient.consultation.symptom.form')}}/{{ $visit->id }}#symptom">
                                                                        <i class="fa fa-plus-circle"> </i>
                                                                        Add Complaint/Symptom
                                                                    </a>
                                                                </div>
                                                                @endif

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                @endrole

                                                @role('doctor')
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

                                                                @if( $editMode == 'new_examination')
                                                                <div>
                                                                    <form action="{{ route('hce.patient.consultation.examination.save') }}"  method="POST">
                                                                        {{ @csrf_field() }}
                                                                        <input type="hidden" name="visit_id" value="{{ $visit->id }}">
                                                                        <input type="hidden" name="encounter_code" value="002">
                                                                        <input type="hidden" name="encounter_description" value="Physical examination">

                                                                        <div class="form-group">
                                                                            <label for="comment">Enter physcial examination findings</label>
                                                                            <textarea name="text_1" class="form-control" rows="1" id="comment"></textarea>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                                                <i class="fa fa-save"> </i>
                                                                                Save findings
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                                @else
                                                                <div class="form-group" style="padding: 0.3em">
                                                                    <a  class="btn btn-link"
                                                                        href="{{ route('hce.patient.consultation.examination.form') }}/{{ $visit->id }}#examination">
                                                                        <i class="fa fa-plus-circle"> </i>
                                                                        Add Physical examination findings
                                                                    </a>
                                                                </div>
                                                                @endif

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                @endrole

                                                @hasanyrole('doctor|receptionist|lab')
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


                                                                @if( $editMode == 'new_investigation')
                                                                    <div class="add-encounter-form">
                                                                        <form action="{{ route('hce.patient.consultation.investigation.save') }}"  method="POST">
                                                                            {{ @csrf_field() }}
                                                                            <input type="hidden" name="visit_id" value="{{ $visit->id }}">
                                                                            <input type="hidden" name="encounter_code" value="003">
                                                                            <input type="hidden" name="encounter_description" value="Investigations/Lab tests">

                                                                            <div class="form-group">
                                                                                <label for="comment">Enter investigation / test</label>
                                                                                <textarea name="text_1" class="form-control" rows="1" id="comment"></textarea>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-sm btn-success">
                                                                                    <i class="fa fa-save"> </i>
                                                                                    Save investigation/test
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                @else
                                                                    @role('doctor')
                                                                    <div class="form-group" style="padding: 0.3em">
                                                                        <a  class="btn btn-link"
                                                                            href="{{ route('hce.patient.consultation.investigation.form') }}/{{ $visit->id }}#investigation">
                                                                            <i class="fa fa-plus-circle"> </i>
                                                                            Add/Suggest Investigations or Lab tests
                                                                        </a>
                                                                    </div>
                                                                    @endrole
                                                                @endif

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
                                                                                            <strong> <i class="fa fa-money-bill-alt"></i>
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
                                                                                        @if( !($editMode == 'add_test_payment') )
                                                                                            <div style="margin-left: 0.8em;padding: 0.4em;">
                                                                                                <p   class="status-paragraph">
                                                                                                    <b> <i class="fa fa-money-bill-alt"></i>
                                                                                                        Test Payment Status
                                                                                                    </b>
                                                                                                    <span style="color: #ee4a2f ">
                                                                                                        <i class="fa fa-exclamation-triangle"></i>
                                                                                                        Not Paid
                                                                                                    </span>
                                                                                                    @role('receptionist')
                                                                                                    <a class="btn btn-primary action-button"
                                                                                                       href="{{ route('receptionist.user.fee.test.form') }}/{{ $visit->id }}/{{ $encounterData->id  }}#encounter{{ $encounterData->id }}">
                                                                                                        <i class="fa fa-plus"></i>
                                                                                                        Add Payment
                                                                                                    </a>
                                                                                                    @endrole


                                                                                                </p>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endif

                                                                                    <!--- ADDING PAYMENT FORM-->
                                                                                    @if( $editMode == 'add_test_payment')
                                                                                        @if( $investigationId == $encounterData->id )
                                                                                            <div id="encounter{{ $encounterData->id }}" class="add-payment-form"
                                                                                                 style=" margin: 1em !important; padding: 1em; border: 1px solid #aaa">
                                                                                                <h5>
                                                                                                    <i class="fa fa-pencil-alt"> </i>
                                                                                                    Add Payment for <i> {{ $encounterData->text_1 }}  </i>
                                                                                                </h5>

                                                                                                <form action="{{ route('receptionist.user.fee.test.save') }}" method="POST">
                                                                                                    {{ @csrf_field() }}
                                                                                                    <input type="hidden" name="investigation_id" value="{{ $investigationId }}">
                                                                                                    <input type="hidden" name="visit_id" value="{{ $visit->id }}">

                                                                                                    <div class="input-group" style="margin-bottom: 1em">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text">Amount</span>
                                                                                                        </div>
                                                                                                        <input name="fee_amount" class="form-control"   id="fee_amount" />
                                                                                                    </div>
                                                                                                    <button type="submit" class="btn btn-sm btn-primary">Save Payment</button>
                                                                                                </form>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endif
                                                                                    <!-- ==END==PAYMENT-PAYMENT-PAYMENT======= -->


                                                                                   <!-- ====RESULTS RESULTS RESULTS======= -->
                                                                                    <!-- SAVED RESULTS -->
                                                                                    @hasanyrole('doctor|lab')
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
                                                                                                {{--<a href="#" --}}
                                                                                                   {{--class=""> View </a>--}}

                                                                                                <a href="{{ route('hce.patient.consultation.lab.result.view') }}/{{ $labResult->id }}"
                                                                                                   class=""> View </a>
                                                                                            </p>
                                                                                        @endforeach
                                                                                    </div>
                                                                                    @endhasanyrole


                                                                                    {{-- TODO: check Permission --}}
                                                                                    <!-- ADDING RESULTS FORM -->
                                                                                    @if( $editMode == 'add_result')
                                                                                     @if( $investigationId == $encounterData->id )
                                                                                        <!--  Result form -->
                                                                                            <div id="target{{ $encounterData->id  }}" class="add-result-form">
                                                                                                <h5>  Add Result for test <strong> {{ $encounterData->text_1  }}  </strong>
                                                                                                    <i class="fa fa-pencil-alt"> </i>
                                                                                                </h5>

                                                                                                <form action="{{ route('hce.patient.consultation.lab.result.save') }}" method="POST" enctype="multipart/form-data">
                                                                                                    {{ @csrf_field() }}
                                                                                                    <input type="hidden" name="investigation_id" value="{{ $investigationId }}">
                                                                                                    <input type="hidden" name="visit_id" value="{{ $visit->id }}">

                                                                                                    <div class="form-group">
                                                                                                        <input type="file" class="form-control-file" name="result_file">
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label for="result_remark">Result Remark</label>
                                                                                                        <textarea name="result_remark" rows="1"
                                                                                                                  type="text" class="form-control"></textarea>
                                                                                                    </div>
                                                                                                    <button type="submit" class="btn btn-sm btn-primary">Save Result</button>
                                                                                                </form>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endif

                                                                                    @hasanyrole('doctor|lab')
                                                                                    @if( !($investigationId == $encounterData->id) )
                                                                                        <a class="btn btn-outline-primary action-button"
                                                                                           href="{{ route('hce.patient.consultation.lab.result.form') }}/{{ $visit->id }}/{{ $encounterData->id  }}#target{{ $encounterData->id  }}">
                                                                                            Add result
                                                                                        </a>
                                                                                    @endif
                                                                                    @endhasanyrole
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
                                                @endhasanyrole



                                                @role('doctor')
                                                <!-- Encounter 6.0 Final Diagnosis -->
                                                <div id="finalDiagnosis" class="col-12 encounter-item"  >
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

                                                        <!--   Final Diagnosis body -->
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

                                                                @if( $editMode == 'new_final_diagnosis')
                                                                    <div>
                                                                        <form action="{{ route('hce.patient.consultation.final_diagnosis.save') }}"  method="POST">
                                                                            {{ @csrf_field() }}
                                                                            <input type="hidden" name="visit_id" value="{{ $visit->id }}">
                                                                            <input type="hidden" name="encounter_code" value="006">
                                                                            <input type="hidden" name="encounter_description" value="Advice">

                                                                            <div class="form-group">
                                                                                <label for="comment">Enter Diagnosis</label>
                                                                                <textarea name="text_1" class="form-control" rows="1" id="comment"></textarea>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-sm btn-outline-success">
                                                                                    <i class="fa fa-save"> </i>
                                                                                    Save Diagnosis
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                @else
                                                                    <div class="form-group" style="padding: 0.3em">
                                                                        <a  class="btn btn-link"
                                                                            href="{{ route('hce.patient.consultation.final_diagnosis.form') }}/{{ $visit->id }}#finalDiagnosis">
                                                                            <i class="fa fa-plus-circle"> </i>
                                                                            Add Diagnosis
                                                                        </a>
                                                                    </div>
                                                                @endif

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                @endrole


                                                @hasanyrole('doctor|receptionist|pharmacist')
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

                                                                                <!-- ====PRESCRIPTION-PAYMENT-PRESCRIPTION-PAYMENT-PAYMENT======= -->
                                                                                <!-- PRESCRIPTION-PAYMENT STATUS-->
                                                                                @if( $encounterData->is_fee_paid)
                                                                                    <div style="margin-left: 0.8em;padding: 0.4em;">

                                                                                        <p class="status-paragraph">
                                                                                            <strong> <i class="fa fa-money-bill-alt"></i>
                                                                                                Test Payment Status:
                                                                                            </strong>
                                                                                            <span style="color: #38c172 ">
                                                                                                <i class="fa fa-check-circle"></i>
                                                                                                Paid ,
                                                                                            </span>
                                                                                            <strong>
                                                                                                Tsh {{ $encounterData->fee_amount }}
                                                                                            </strong>
                                                                                            @role('receptionist|pharmacist')
                                                                                            <a class="btn btn-outline-primary action-button"
                                                                                               href="{{ route('hce.patient.consultation.prescription.payment.form') }}/{{ $visit->id }}/{{ $encounterData->id  }}#encounter{{ $encounterData->id }}">
                                                                                                 Update Payment
                                                                                            </a>
                                                                                            @endrole
                                                                                        </p>
                                                                                    </div>
                                                                                @else
                                                                                    @if( !($editMode == 'add_prescription_payment') )
                                                                                        <div style="margin-left: 0.8em;padding: 0.4em;">
                                                                                            <p   class="status-paragraph">
                                                                                                @role('receptionist|pharmacist')
                                                                                                <a class="btn btn-primary action-button"
                                                                                                   href="{{ route('hce.patient.consultation.prescription.payment.form') }}/{{ $visit->id }}/{{ $encounterData->id  }}#encounter{{ $encounterData->id }}">
                                                                                                    <i class="fa fa-plus"></i>
                                                                                                    Record payment
                                                                                                </a>
                                                                                                @endrole
                                                                                            </p>
                                                                                        </div>
                                                                                    @endif
                                                                                @endif

                                                                                 <!--- ADDING PAYMENT FORM-->
                                                                                @if( $editMode == 'add_prescription_payment')
                                                                                    @if( $investigationId == $encounterData->id )
                                                                                        <div id="encounter{{ $encounterData->id }}" class="add-payment-form"
                                                                                             style=" margin: 1em !important; padding: 1em; border: 1px solid #aaa">
                                                                                            <h5>
                                                                                                <i class="fa fa-pencil-alt"> </i>
                                                                                                Add Payment for <i> {{ $encounterData->text_1 }}  </i>
                                                                                            </h5>
                                                                                            <form action="{{ route('receptionist.user.fee.test.save') }}" method="POST">
                                                                                                {{ @csrf_field() }}
                                                                                                <input type="hidden" name="investigation_id" value="{{ $investigationId }}">
                                                                                                <input type="hidden" name="visit_id" value="{{ $visit->id }}">

                                                                                                <div class="input-group" style="margin-bottom: 1em">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text">Amount</span>
                                                                                                    </div>
                                                                                                    <input name="fee_amount" class="form-control"   id="fee_amount" required/>
                                                                                                </div>
                                                                                                <button type="submit" class="btn btn-sm btn-primary">Save Payment</button>
                                                                                            </form>
                                                                                        </div>
                                                                                    @endif
                                                                                @endif
                                                                                 <!-- ==END==PAYMENT-PAYMENT-PAYMENT======= -->
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                </div>

                                                                @if( $editMode == 'new_prescription')
                                                                <div>
                                                                    <form action="{{ route('hce.patient.consultation.prescriptions.save') }}"  method="POST">
                                                                        {{ @csrf_field() }}
                                                                        <input type="hidden" name="visit_id" value="{{ $visit->id }}">
                                                                        <input type="hidden" name="encounter_code" value="004">
                                                                        <input type="hidden" name="encounter_description" value="Prescriptions">

                                                                        <div class="form-group">
                                                                            <label for="comment">Enter Prescription</label>
                                                                            <textarea name="text_1" class="form-control" rows="1" id="comment"></textarea>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                                                <i class="fa fa-save"> </i>
                                                                                Save prescription
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                                @else
                                                                 @hasanyrole('doctor|pharmacist')
                                                                 <div class="form-group" style="padding: 0.3em">
                                                                    <a  class="btn btn-link"
                                                                        href="{{ route('hce.patient.consultation.prescriptions.form')}}/{{ $visit->id }}#prescription">
                                                                        <i class="fa fa-plus-circle"> </i>
                                                                        Add Prescriptions
                                                                    </a>
                                                                </div>
                                                                @endhasanyrole
                                                                @endif

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                @endhasanyrole


                                                @role('doctor')
                                                <!-- Encounter 7 Advice  -->
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

                                                                @if( $editMode == 'new_advice')
                                                                <div>
                                                                    <form action="{{ route('hce.patient.consultation.advice.save') }}"  method="POST">
                                                                        {{ @csrf_field() }}
                                                                        <input type="hidden" name="visit_id" value="{{ $visit->id }}">
                                                                        <input type="hidden" name="encounter_code" value="005">
                                                                        <input type="hidden" name="encounter_description" value="Advice">

                                                                        <div class="form-group">
                                                                            <label for="comment">Enter Advice</label>
                                                                            <textarea name="text_1" class="form-control" rows="1" id="comment"></textarea>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                                                <i class="fa fa-save"> </i>
                                                                                Save advice
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                                @else
                                                                <div class="form-group" style="padding: 0.3em">
                                                                    <a  class="btn btn-link"
                                                                        href="{{ route('hce.patient.consultation.advice.form') }}/{{ $visit->id }}#advice">
                                                                        <i class="fa fa-plus-circle"> </i>
                                                                        Add Advice
                                                                    </a>
                                                                </div>
                                                                @endif

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                @endrole

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
