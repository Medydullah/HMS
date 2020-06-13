<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/widgets.css') }}" rel="stylesheet">

    <style>
        .section-divider{
            height: 2px;
            background: #dddddd;
            margin-top: 4em
        }

        .section-heading {
            background: #dddddd;
            margin-bottom: 1em;
            display: inline-block;
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px;
        }

        .section-heading h5{
            color: #414141;
            padding: 4px 1em;
            margin: 0
        }

        .new-employee-wrapper{
            padding: 1em;
            border: 2px dashed #cccccc;
            background: #f4f4f1;
            margin-top: 2em;
        }

        .content-wrapper{
            padding: 1em;
            border-left: 1px solid #cccccc;
            border-right: 1px solid #cccccc;
            border-bottom: 1px solid #cccccc;
        }

        .list-wrapper{
            padding: 1em;
         }

        .permission-group{
            border-left: 6px Solid #ddd690;
            padding-top: 0.5em;
            padding-bottom: 0.5em;
            background: #fff8b3;
            margin: 0.2em 0.4em 1em 0.2em;
            border-top-right-radius: 1em;
        }

        /*** Left Nav ***/
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

        /***** [[End]] Left Nav ***/




        /*** [Start] Service form Date Nav**/

        .date-picker-div{
           border: 1px dashed #b9bbbe;
           padding:0.8em;
            margin: 1em;
            display: inline-block ;
        }
        .date-button{
            margin-right: 1em ;
        }

        .date-button-active{
            margin-right: 1.5em ;
            border-width: 2px;
        }

        /*** [[end]] Service form Date Nav**/



        /** Service form list **/

        .visit-item {
            padding: 0.8em 1.2em;
            margin-bottom: 3em;
            border-radius: 1em;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background: #f0e68c;
        }

        .visit-item p {
            /*color: #7D6608;*/
            color: #444444;
            margin: 0 !important;
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

        /** [[end]] Service form list **/


        /** [[Start]] Service Form **/
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

        /** [[End]] Service Form **/



    </style>
</head>




<body style="background:  #e6ecf0">

<div id="app">

  <div class="container-fluid">
      <div class="row">

          @include('health_provider.components.left-nav')

          <div class="col-lg-9" style="padding-left:0; padding-right: 0;">

              @include('health_provider.components.top_nav')

              <!-- Content -->
              <main class="py-4">
                  <div class="row justify-content-center">
                      <div class="col-md-12">

                          <div class="card">
                              <!-- HealthCare provider heading -->
                              <div class="card-header">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <h3 style=" ">
                                              <i class="fa fa-file-alt"> </i>
                                              Service Forms
                                          </h3>
                                      </div>
                                  </div>
                              </div>

                              <div class="card-body">

                                  <div class="container-fluid" style="background: #ffffff">
                                      <div class="row justify-content-center">

                                          <div class="col-md-12" >

                                              <div class="visit-holder">
                                                  <div class="row current-visit" >

                                                      <div>
                                                          @if (session('flashMessage'))
                                                              <div class="alert alert-primary shadow" role="alert">
                                                                  {{ session('flashMessage') }}
                                                              </div>
                                                          @endif
                                                      </div>

                                                      <!-- Today's Visit Accounts Summary -->
                                                      <div class="col-12">

                                                          <!-- Download Deactivate -->
                                                          <h5 class="" style="margin-bottom: 0.8em">
                                                              <a class=" " style="height: 1em"
                                                                 href="{{ route('user.visits') }}">
                                                              </a>

                                                              @if( $visit->is_active )
                                                              <a class="btn btn-sm btn-warning float-right"
                                                                 href="{{ route('health_provider.admin.service_form.close') }}/{{ $visit->id }}">
                                                                  <i class="fa fa-times"> </i>
                                                                   Deactivate Form
                                                              </a>
                                                              @endif

                                                              <a class="btn btn-sm btn-success float-right" style="margin-right: 2em"
                                                                 href="{{ route('health_provider.admin.service_forms.download') }}/{{ $visit->id }}">
                                                                  <i class="fa fa-download"> </i>
                                                                  Download Pdf
                                                              </a>
                                                          </h5> <br>

                                                          <h3 style="display: inline-block">
                                                              <i class="fa fa-user"></i> <strong>{{ $visit->name }} </strong>
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

                                                          </h5><br/>

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

                                                                                      </div>

                                                                                  @endforeach
                                                                              @endif
                                                                          @endforeach
                                                                      </div>

                                                                  </div>
                                                              </div>

                                                          </div>
                                                      </div>



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
                                                                          <div class="form-group" style="padding: 0.3em">
                                                                              <a  class="btn btn-link"
                                                                                  href="{{ route('hce.patient.consultation.prescriptions.form')}}/{{ $visit->id }}#prescription">
                                                                                  <i class="fa fa-plus-circle"> </i>
                                                                                  Add Prescriptions
                                                                              </a>
                                                                          </div>
                                                                      @endif

                                                                  </div>
                                                              </div>

                                                          </div>
                                                      </div>


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
                  </div>
              </main>
              <!-- End -->

          </div>

      </div>

  </div>

</div>
</body>
</html>
