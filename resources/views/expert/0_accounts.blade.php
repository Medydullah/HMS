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
            margin: 2.2em 0.5em;
            padding-top: 0.8em;
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

        .add-form{
            margin: 1em 4em !important;
            padding: 1em;
            border: 1px solid #aaa;
           {{ $activeTab=='insurance'? ' background: #85C1E9': ' background: #fff8b3' }} ;
        }


        .accounts-active-tab{
            border: 1px solid #dddddd;
        }

        .user-result-item{
             background: #f0e68c;
             display: inline-block;
            padding: 0.6em 2em;
            border-radius: 1em ;
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
                        <div class="row justify-content-center" style="padding: 1em">
                            <div class="col-md-12" >
                                <div class="card" >

                                    <div class="card-body"  >

                                        <!-- OPD forms TABS -->
                                        <div class="tabs-wrapper"  >
                                            <ul class="nav nav-tabs ">
                                                <li class="nav-item {{ $activeTab=='insurance'? 'accounts-active-tab': ' ' }}">
                                                    <a class="nav-link  "
                                                       href="{{ route('hce.opd') }}/insurance">
                                                        <i class="fa fa-user-md"> </i>
                                                        OPD Service Forms
                                                    </a>
                                                </li>

                                                {{--<li class="nav-item {{ $activeTab=='cash'? 'accounts-active-tab': ' ' }}">--}}
                                                    {{--<a class="nav-link  "--}}
                                                       {{--href="{{ route('hce.opd') }}/cash">--}}
                                                        {{--<i class="fa fa-user-md"> </i>--}}
                                                        {{--OPD Cash-Forms--}}
                                                    {{--</a>--}}
                                                {{--</li>--}}
                                            </ul>
                                        </div>



                                        <div class="content-wrapper">
                                            <div class="list-wrapper" style="padding: 1em">

                                                <!-- VERIFY medical VALIDITY Form -->
                                                @if( $editMode=='verify_dmw')
                                                    <form method="POST" action="{{ route('hce.opd.dmw.verify.attempt') }}" >

                                                        {{ @csrf_field() }}
                                                        <input name="active_tab" type="hidden" value="{{ $activeTab }}">

                                                        <div class="card col-md-10 offset-1 add-form">
                                                            <div class="card-body">
                                                                <div>  <!-- Validation Errors -->
                                                                    @if ($errors->any())
                                                                        <div class="alert alert-danger">
                                                                            <ul>
                                                                                @foreach ($errors->all() as $error)
                                                                                    <li style="list-style: none">
                                                                                        <i class="fa fa-user-times"> </i>
                                                                                        {{ $error }}
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @endif
                                                                </div>

                                                                <!--1.0  medical ID FORM-->
                                                                <div class="form-group row">

                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Medical ID</span>
                                                                        </div>
                                                                        <input  name="dmw_token"
                                                                                value="{{ $user->dmw_token or old('dmw_token') }}"
                                                                                type="text" class="form-control" >
                                                                        <div class="input-group-append">
                                                                            <button type="submit" class="input-group-text">
                                                                                <span >GO</span>
                                                                            </button>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                @if( $results ==  true )
                                                               <div class="user-result-item">
                                                                   <h4>
                                                                       <i class="fa fa-user-shield"> </i>
                                                                       Confirm Holder
                                                                   </h4>

                                                                            <li style="list-style: none">
                                                                               <i class="fa fa-user"> </i>
                                                                               {{ $user->name }}
                                                                           </li>
                                                                           <li style="list-style: none">
                                                                               <i class="fa fa-phone"> </i>
                                                                               {{ $user->phone }}
                                                                           </li>
                                                                           <li style="list-style: none">
                                                                               <i class="fa fa-calendar-day"> </i>
                                                                               {{ $user->dob }}
                                                                           </li>

                                                                           <li style="list-style: none">
                                                                               <a class="btn btn-sm btn-success"
                                                                                    href="{{ route('hce.opd.form.generate') }}/{{ $user->dmw_token }}/{{ $activeTab}}">
                                                                                  <i class="fa fa-check-double"> </i>
                                                                                   Confirm
                                                                               </a>
                                                                           </li>
                                                               </div>
                                                                @endif

                                                                <!-- Medical result -->
                                                                <div>

                                                                </div>
                                                            </div>

                                                        </div>

                                                    </form>
                                                @endif
                                              <!-- END VERIFY Medical VALIDITY Form -->



                                                <!-- New VISIT Form -->
                                                @if( $editMode=='new_form')
                                                    <form method="POST" action="{{ route('hce.opd.form.save') }}" >

                                                        {{ @csrf_field() }}
                                                        <input name="active_tab" type="hidden" value="{{ $activeTab }}">

                                                        <div class="card col-md-10 offset-1 add-form">

                                                            <div>
                                                                <h4>
                                                                    <i class="fa fa-file-medical"> </i>
                                                                    New Form
                                                                    <a class="btn btn-sm btn-danger float-right"
                                                                       href="{{ route('hce.opd') }}/{{ $activeTab }}">
                                                                        <i class="fa fa-times-circle"> </i>  Cancel
                                                                    </a>
                                                                </h4>
                                                            </div>

                                                            <div class="card-body">

                                                                <!--Validation Errors-->
                                                                <div>
                                                                    @if ($errors->any())
                                                                        <div class="alert alert-danger">
                                                                            <ul>
                                                                                @foreach ($errors->all() as $error)
                                                                                    <li style="list-style: none">
                                                                                        <i class="fa fa-user-times"> </i>
                                                                                        {{ $error }}
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <!-- [END] Validation Errors-->



                                                                <!--1.0 NHIF Card Number -->
                                                                <div class="form-group row">
                                                                    <label for="nhif_card_number" class="col-md-8 col-form-label text-md-right">
                                                                        <h4> Medical ID <strong>{{ $dmw_token }} </strong>
                                                                            <a class="btn btn-sm btn-warning"
                                                                                href="{{ route('hce.opd.dmw.verify.form') }}/{{ $activeTab }}">
                                                                                Change
                                                                                <i class="fa fa-pencil-alt"></i>
                                                                            </a>
                                                                        </h4>
                                                                    </label>
                                                                    <input name="dmw_token" type="hidden" value="{{ $dmw_token }}">
                                                                </div>

                                                                <!--1.0 NHIF Card Number -->
                                                                <div class="form-group row">
                                                                    <label for="nhif_card_number" class="col-md-3 col-form-label text-md-right">
                                                                        NHIF Card No
                                                                    </label>

                                                                    <div class="col-md-8">
                                                                        <input  type="text" class="form-control"
                                                                               placeholder=" "
                                                                               name="nhif_card_number" value="{{ old('nhif_card_number') }}" required autofocus>
                                                                    </div>
                                                                </div>

                                                                <!--1.1 Consultation Fee -->
                                                                <div class="form-group row">
                                                                    <label for="consultation_fee" class="col-md-3 col-form-label text-md-right">
                                                                        Consultation Fee
                                                                    </label>

                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control"
                                                                               placeholder=" "
                                                                               name="consultation_fee" value="{{ old('consultation_fee') }}" required autofocus>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-footer">
                                                                <div class="form-group row mb-0">
                                                                    <div class="col-md-8 offset-md-2">
                                                                        <button type="submit" class="btn btn-primary" style="width: 100%">
                                                                            Done
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </form>
                                                @endif
                                               <!-- END New VISIT Form -->



                                                <!-- LIST -->
                                                <div>
                                                    <!-- New Form Generate-Button -->
                                                    <div>

                                                    </div>

                                                    <h3>
                                                        <i class="fa fa-file-medical-alt"> </i>
                                                         Service Forms

                                                        <a class="btn float-right {{ $activeTab=='insurance'? 'btn-primary ': 'btn-warning' }}"
                                                           href="{{ route('hce.opd.dmw.verify.form') }}/{{ $activeTab }}"
                                                           style="color: #fff; margin: 0.5em">
                                                            <i class="fa fa-file-medical"></i>
                                                            Generate
                                                            {{ $activeTab=='insurance'? 'NHIF': 'Cash' }}
                                                            Service
                                                            Form
                                                        </a>
                                                    </h3>
                                                    <!-- List of Opd Forms -->
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Holder Name</th>
                                                            <th>Temporal Access Token</th>
                                                            <th>Action</th>
                                                             <th> </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach( $visits as $i => $visit )
                                                            @php $class = $i%2 == 0 ? 'table-success' : 'table-warning'; @endphp
                                                            <tr class="{{ $class }}">
                                                                <td> {{ $visit->created_at }}</td>
                                                                <td> {{ $visit->name }}</td>
                                                                 <td class="code-font"> {{ $visit->access_token }} </td>
                                                                 <td>
                                                                    <a class="btn btn-sm btn-outline-primary"
                                                                        href="{{ route('hce.patient.consultation') }}/{{ $visit->id }}">
                                                                        view
                                                                    </a>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- END LIST -->


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
