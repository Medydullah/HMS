<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <style>


        .section-heading h5 {
            color: #414141;
            padding: 4px 1em;
            margin: 0
        }



        /** [[Start]] Service Form **/
        .visit-holder {
            /*padding: 2em 2em ;*/
        }

        .current-visit {
            /*border-left: 5px solid #D4AC0D;*/
            margin: 0.5em;
            padding: 1em;
            background: #ffffff;
        }

        .encounter-item {
            /*border: 1px solid #aaa;*/
            padding: 0.4em;
            margin-bottom: 1.8em;
        }


        .encounter-body {
            padding: 0.5em 2em;
        }

        .encounter-data {
            margin: 0.2em 0 0.5em 0.5em !important;
        }

        .encounter-data {
            margin: 0;
            font-size: 1.2em;
            font-family: Consolas, "Liberation Mono", "Courier New", monospace;
        }

        .encounter-data-number {
             padding: 0 0.4em;
            border-radius: 0.5em;
            font-style: normal;
            font-size: 0.9em;
        }

        .investigation-item-caret {
            color: #F4D03F;
            font-size: 1.3em;
        }

        .prescription-item {
            margin: 0;
            font-size: 1.2em;
        }


        .page-break {
            page-break-after: always;
        }

        .detail-p-heading{
            font-size: 1.2em;
            margin: 0;
            line-height: 1.4em;
            text-decoration: underline;
        }
        .detail-p-item{
            font-size: 1em;
            padding-right: 1em;
            margin: 2px;
        }
        /** [[End]] Service Form **/

        /*** Payment ***/
        .payment-subheading{
            font-size: 1.1em;
            font-weight: bold;
            font-style: italic;
        }
        /**** [[end]] payments ***/
    </style>

</head>


<body>

<div class="visit-holder">

    <h1  style="text-align: center">
        Health care service form
    </h1>

    <div class="row current-visit">

        <!-- Today's Visit Accounts Summary -->
        <div class="col-12">


            <!-- Form Details -->
            <div style="padding: 1em">
                <h3 class="detail-p-heading">
                    Form information
                </h3>

                <p class="detail-p-item">
                    Serial N<u>o</u> <strong> {{ $visit->serial_number }} </strong>
                </p>

                <p class="detail-p-item">
                    Consultation fee  <strong>  {{ $visit->consultation_fee }} </strong>
                </p>
                <p class="detail-p-item">
                    Payment type <strong> {{ $visit->payment_type }} </strong>
                </p>
                @if( !(empty($visit->nhif_card_number)))
                    <p class="detail-p-item">
                        NHIF Card Number <strong> {{ $visit->nhif_card_number }} </strong>
                    </p>
                @endif
                <p class="detail-p-item">

                    Created  <strong>
                        {{ Carbon\Carbon::parse($visit->created_at)->toFormattedDateString()}},
                        {{ Carbon\Carbon::parse($visit->created_at)->format(' h:i A')}}.
                           </strong>
                </p>

            </div>


            <!-- Health Care Provider Contacts -->
            <div style="padding: 1em">
                <h3 class="detail-p-heading">
                    Health Care Provider
                </h3>

                <p class="detail-p-item">
                    Name <strong> {{ $healthCareProvider->facility_name }} </strong>
                </p>
                <p class="detail-p-item">
                    Type<strong> {{ $healthCareProvider->facility_type }} </strong>
                </p>
                <p class="detail-p-item">
                    Location <strong> {{ $healthCareProvider->region }} </strong>
                </p>
                <p class="detail-p-item">
                    Phone <strong> {{ $healthCareProvider->phone_1 }} </strong>
                </p>
                <p class="detail-p-item">
                    Email <strong> {{ $healthCareProvider->email }} </strong>
                </p>
            </div>

            <!--Patient's Contacts -->
            <div style="padding: 1em">
                <h3 class="detail-p-heading">
                    Patient's Contacts
                </h3>

                <p class="detail-p-item">
                       Patient Name <strong> {{ $visit->name }} </strong>
                </p>
                <p class="detail-p-item">
                    Wallet Token <strong> {{ $visit->dmw_token }} </strong>
                </p>
                <p class="detail-p-item">
                    Phone #1 <strong> {{ $visit->phone_1 }} </strong>
                </p>
                <p class="detail-p-item">
                    Phone #2 <strong> {{ $visit->phone_1 }} </strong>
                </p>
                <p class="detail-p-item">
                    Residence  <strong>  {{ $visit->region }},  {{ $visit->district }},
                        {{ $visit->ward }},   {{ $visit->street }} </strong>
                </p>

            </div>

        </div>

        <div class="page-break"></div>



        <!-- Encounter 1  Chief Complaint / Symptoms-->
        <div id="symptom" class="col-12 encounter-item">
            <div class="row ">
                <!-- Chief Complaint heading --->
                <div class="col-12 ">
                    <div class="encounter-heading-holder">
                        <h3 class="detail-p-heading">
                            <i class="fa fa-frown"> </i>
                            Chief Complaint / Symptoms
                        </h3>
                    </div>
                </div>

                <!-- Chief Complaint  body -->
                <div class="col-12 ">
                    <div class="encounter-body">
                        <div>
                            @foreach( $encounters as $encounter )
                                @if( $encounter->encounter_code == 001 )
                                    <ol style="margin: 0">
                                    @foreach( $encounter->encounterDatas as $encounterData )
                                        <li class="encounter-data">
                                            <i class="fa fa-frown-open"
                                               style="color: #E74C3C; font-size: 0.9em"> </i>
                                            {{ $encounterData->text_1 }}
                                        </li>
                                    @endforeach
                                    </ol>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Encounter 3  Investigations / Lab tests -->
        <div id="investigation" class="col-12 encounter-item">
            <div class="row ">
                <!-- Test/Investigation Heading -->
                <div class="col-12 ">
                    <div class="encounter-heading-holder">
                        <h3 class="detail-p-heading">
                            <i class="fa fa-microscope"> </i>
                            Investigations/Lab tests
                        </h3>
                    </div>
                </div>

                <!-- Test/Investigations body -->
                <div class="col-12 ">
                    <div class="encounter-body">

                        <!-- List of Tests/Investigations Datas-->
                        <div>
                            @foreach( $encounters as $encounter )
                                @if( $encounter->encounter_code == 003 )
                                    <ol>
                                    @foreach( $encounter->encounterDatas as $i =>  $encounterData )

                                        <li class=" "
                                             style="padding-bottom: 0.4em">
                                            <!-- Test/Investigation Description -->
                                            <p class="encounter-data">
                                                <i class="fa investigation-item-caret"> </i>
                                                <i class="encounter-data-number">
                                                    Test ID: <b>LB-046-{{ $encounterData->id }}</b>
                                                </i>
                                                <span style="padding-left: 1em"> {{ $encounterData->text_1 }} </span>

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

                                        @endif


                                        </li>

                                    @endforeach
                                    </ol>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Encounter 2  Physical examination-->
        <div id="examination" class="col-12 encounter-item">
            <div class="row ">
                <!--examination heading --->
                <div class="col-12 ">
                    <div class="encounter-heading-holder">
                        <h3 class="detail-p-heading">
                            <i class="fa fa-stethoscope"> </i>
                            Physical examination findings
                        </h3>
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

        <!-- Encounter 7 Advice  -->
        <div id="advice" class="col-12 encounter-item">
            <div class="row">
                <!--Advice heading --->
                <div class="col-12 ">
                    <div class="encounter-heading-holder">
                        <h3 class="detail-p-heading">
                            <i class="fa fa-clipboard-list"> </i>
                            Advice
                        </h3>
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


        <div class="page-break"></div>
        <!-- Encounter 6.0 Final Diagnosis -->
        <div id="finalDiagnosis" class="col-12 encounter-item">
            <div class="row">
                <!--Advice heading --->
                <div class="col-12 ">
                    <div class="encounter-heading-holder">
                        <h3 class="detail-p-heading">
                            <i class="fa fa-clipboard-list"> </i>
                            Final Diagnoses
                        </h3>
                    </div>
                </div>

                <!--   Final Diagnosis body -->
                <div class="col-12 ">
                    <div class="encounter-body">
                        <div>
                            @foreach( $encounters as $encounter )
                                @if( $encounter->encounter_code == 006 )
                                    <ol>
                                        @foreach( $encounter->encounterDatas as $encounterData )
                                            <li class="encounter-data">
                                                <i class="fa fa-check"> </i>
                                                {{ $encounterData->text_1 }}
                                            </li>
                                        @endforeach
                                    </ol>
                                @endif
                            @endforeach
                        </div>


                    </div>
                </div>

            </div>
        </div>

        <!-- Encounter 4 Prescriptions -->
        <div id="prescription" class="col-12 encounter-item">
            <div class="row ">
                <!--Prescriptions heading --->
                <div class="col-12 ">
                    <div class="encounter-heading-holder">
                        <h3 class="detail-p-heading">
                            <i class="fa fa-pills"> </i>
                            Prescriptions
                        </h3>
                    </div>
                </div>

                <!-- Prescriptions body -->
                <div class="col-12 ">
                    <div class="encounter-body">

                        <div>
                            @foreach( $encounters as $encounter )
                                @if( $encounter->encounter_code == 004 )
                                    <ol>
                                        @foreach( $encounter->encounterDatas as $encounterData )
                                            <li class="encounter-data">
                                                <i class="fa fa-capsules"> </i>
                                                {{ $encounterData->text_1 }}
                                            </li>
                                        @endforeach
                                    </ol>
                                @endif
                            @endforeach
                        </div>


                    </div>
                </div>

            </div>
        </div>





        <div class="page-break"></div>
        <!-- Expenses  -->
        <div  class="col-12 encounter-item" style="border: 1px solid #222222">
            <div class="row">
                <!--Advice heading --->
                <div class="col-12 ">
                    <div class="encounter-heading-holder">
                        <h3 class="detail-p-item">
                            <i class="fa fa-clipboard-list"> </i>
                            Expenses
                        </h3>
                    </div>
                </div>

                <!-- Advice body -->
                <div class="col-12 ">
                    <div class="encounter-body">
                        <div>


                            <p class="payment-subheading">Consultation </p>

                            <p class="encounter-data">
                                <i class="fa fa-check"> </i>
                                Consultation fee
                               <strong>{{ $visit->consultation_fee }} </strong>
                            </p>

                            <div style="height: 1px; width: 100%; background: #b9bbbe"> </div>


                            @foreach( $encounters as $encounter )

                                @if( $encounter->encounter_code == 003 )

                                    <p class="payment-subheading">Lab Tests </p>

                                    @foreach( $encounter->encounterDatas as $encounterData )
                                        @if($encounterData->is_fee_paid)
                                        <p class="encounter-data">
                                            <i class="fa fa-check"> </i>
                                            {{ $encounterData->text_1 }}
                                            <strong> {{ $encounterData->fee_amount }}</strong>
                                        </p>
                                        @endif
                                    @endforeach

                                    <div style="height: 1px; width: 100%; background: #b9bbbe"> </div>
                                @endif

                                @if( $encounter->encounter_code == 004 )
                                     <p class="payment-subheading">Prescriptions </p>

                                    @foreach( $encounter->encounterDatas as $encounterData )
                                        @if($encounterData->is_fee_paid)
                                            <p class="encounter-data">
                                                <i class="fa fa-check"> </i>
                                                {{ $encounterData->text_1 }}
                                               <strong> {{ $encounterData->fee_amount }} </strong>
                                            </p>
                                        @endif
                                    @endforeach
                                        <div style="height: 1px; width: 100%; background: #b9bbbe"> </div>
                                    @endif
                            @endforeach

                            <div style="height: 3px; width: 100%; background: #b9bbbe"> </div>

                            <p class="payment-subheading" style="font-size: 1.3em">
                                Total
                            </p>

                            <p class="encounter-data" style="font-size: 1.5em">
                                <strong>{{ $expenses->totalExpenses }} </strong>
                            </p>


                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

</body>
</html>
