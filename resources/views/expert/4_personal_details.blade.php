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

        .section-heading {
            color: #008080;
        }

        .form-label {
            text-align: right;
            font-size: 1em;
        }

        .form-input-row {
            padding: 0.5em 0.2em 0.5em 0.2em;
        }

        .emergence-contact{
            margin: 1.5em 1em;
            padding: 0 1em;
            border: 1px solid #5D6D7E;
            /*border-top: 8px solid #5D6D7E;*/
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 6px;
        }

        .emergence-contact p{
            font-size: 1em;
        }

        .blood-relative{
            margin: 1.5em 1em;
            padding: 0 1em;
            border: 1px solid #58D68D;
            /*border-top: 6px solid #58D68D;*/
            border-radius: 6px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .blood-relative p{
            font-size: 1em;
        }

        .fa-small{
            color: #5D6D7E;
            font-size: 0.8em;
        }

        .card-form{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .dashed-form{
            background: #ffffff;
            padding: 1em;
            border: 1px dashed #555555;
            border-radius: 1em;
            margin: 1em 0;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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

                                                <!-- Left Column -->
                                                <div class="col-md-6 encounter-item">
                                                    <div class="row previous-visits-holder">

                                                        <!-- 1 Personal Details -->
                                                        <div class="col-md-12 ">
                                                            <div class="item-holder">
                                                            @if( !( $editMode == "personal_details") )
                                                                <!-- VIEWABLE personal Details-->
                                                                    <div>
                                                                        <h4>
                                                                       <span class="section-heading">
                                                                           <i class="fa fa-user"></i>
                                                                           Particulars
                                                                       </span>
                                                                        </h4>
                                                                        <p>
                                                                            <i class="fa fa-caret-right"></i>
                                                                            Full Name
                                                                            <strong> {{ $user->name  }}</strong>
                                                                        </p>


                                                                        <p>
                                                                            <i class="fa fa-caret-right"></i>
                                                                            Birthdate
                                                                            <strong>
                                                                                {{ Carbon\Carbon::parse($user->dob)->toFormattedDateString() }}
                                                                                ( {{ Carbon\Carbon::parse($user->dob)->diffForHumans() }})
                                                                            </strong>
                                                                        </p>


                                                                        <p>
                                                                            <i class="fa fa-caret-right"></i>
                                                                            Gender
                                                                            <strong> {{ $user->gender  }} </strong>
                                                                        </p>

                                                                        <p>
                                                                            <i class="fa fa-caret-right"></i>
                                                                            Marital Status
                                                                            <strong> {{ $user->marital_status }}  </strong>
                                                                        </p>

                                                                        <div style="height: 1px; margin: 0.5em 0; background: #cccccc">
                                                                        </div>

                                                                        <p>
                                                                            <i class="fa fa-caret-right"></i>
                                                                            Ethnicity
                                                                            <strong> {{ $user->ethnicity }} </strong>
                                                                        </p>


                                                                        <p>
                                                                            <i class="fa fa-caret-right"></i>
                                                                            Tribe
                                                                            <strong> {{ $user->tribe }} </strong>
                                                                        </p>

                                                                        <p>
                                                                            <i class="fa fa-caret-right"></i>
                                                                            Occupation
                                                                            <strong> {{ $user->occupation }} </strong>
                                                                        </p>

                                                                        <p>
                                                                            <i class="fa fa-caret-right"></i>
                                                                            Working hours/day
                                                                            <strong> {{ $user->working_hours }} </strong>
                                                                        </p>

                                                                    </div>
                                                                    <!-- [END] VIEWABLE personal Details-->
                                                            @else
                                                                <!-- edit personal Details-->
                                                                    <form action="{{ route('user.profile.personal.update') }}" method="POST">
                                                                        {{ @csrf_field() }}
                                                                        <div class="dashed-form">
                                                                            <!-- form heading -->
                                                                            <h4>
                                                                   <span class="section-heading">
                                                                       <i class="fa fa-user"></i>
                                                                       Personal Details
                                                                   </span>
                                                                                <a href="{{ route('user.profile') }}"
                                                                                   class="btn btn-sm btn-danger float-right">
                                                                                    <i class="fa fa-times"></i>
                                                                                    Cancel
                                                                                </a>
                                                                            </h4>

                                                                            <!--1.1 Full name -->
                                                                            <div class="row form-input-row">
                                                                                <label for="name" class="col-md-4 form-label">Full name</label>
                                                                                <div class=" col-md-8">
                                                                                    <input type="text" class="form-control " id="name"
                                                                                           value="{{ $user->name }}"
                                                                                           name="name">
                                                                                </div>
                                                                            </div>

                                                                            <!--1.2 Birth date -->
                                                                            <div class="row form-input-row">
                                                                                <label for="dob" class="col-md-4 form-label">Birthdate</label>
                                                                                <div class=" col-md-8">
                                                                                    <input type="date" class="form-control " id="dob"
                                                                                           value="{{ $user->dob }}"
                                                                                           name="dob">
                                                                                </div>
                                                                            </div>

                                                                            <!--1.3 Gender -->
                                                                            <div class="row form-input-row">
                                                                                <label for="gender"
                                                                                       class="col-md-4 form-label">Gender</label>
                                                                                <div class=" col-md-8">
                                                                                    <input type="text"
                                                                                           class="form-control "
                                                                                           id="gender"
                                                                                           value="{{ $user->gender }}"
                                                                                           name="gender">
                                                                                </div>
                                                                            </div>

                                                                            <!--1.4 Marital Status -->
                                                                            <div class="row form-input-row">
                                                                                <label for="marital_status"
                                                                                       class="col-md-4 form-label">Marital
                                                                                    Status</label>
                                                                                <div class=" col-md-8">
                                                                                    <select type="text" class="form-control "
                                                                                            id="marital_status"
                                                                                            value="{{ $user->marital_status }}"
                                                                                            name="marital_status" required>
                                                                                        <option value="">--select--</option>
                                                                                        <option>Single</option>
                                                                                        <option>Married</option>
                                                                                        <option>Divorced</option>
                                                                                        <option value="Other">Other</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <!--DIVIDER-->
                                                                            <div style="height: 1px; margin: 0.5em 0; background: #cccccc">
                                                                            </div>

                                                                            <!--1.5 Ethnicity -->
                                                                            <div class="row form-input-row">
                                                                                <label for="ethnicity"
                                                                                       class="col-md-4 form-label">Ethnicity</label>
                                                                                <div class=" col-md-8">
                                                                                    <input type="text"
                                                                                           class="form-control"
                                                                                           id="ethnicity"
                                                                                           value="{{ $user->ethnicity }}"
                                                                                           name="ethnicity">
                                                                                </div>
                                                                            </div>

                                                                            <!--1.6 Tribe -->
                                                                            <div class="row form-input-row">
                                                                                <label for="tribe" class="col-md-4 form-label">Tribe</label>
                                                                                <div class=" col-md-8">
                                                                                    <input type="text" class="form-control " id="tribe"
                                                                                           value="{{ $user->tribe }}"
                                                                                           name="tribe">
                                                                                </div>
                                                                            </div>

                                                                            <!--1.7 Occupation -->
                                                                            <div class="row form-input-row">
                                                                                <label for="occupation" class="col-md-4 form-label">Occupation</label>
                                                                                <div class=" col-md-8">
                                                                                    <input type="text" class="form-control" id="occupation"
                                                                                           value="{{ $user->occupation }}"
                                                                                           name="occupation">
                                                                                </div>
                                                                            </div>

                                                                            <!--1.8 Working hours/day -->
                                                                            <div class="row  form-input-row">
                                                                                <label for="working_hours" class="col-md-4 form-label">
                                                                                    Working hours/day</label>
                                                                                <div class=" col-md-8">
                                                                                    <input type="text" class="form-control"
                                                                                           value="{{ $user->working_hours }}"
                                                                                           name="working_hours">
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
                                                                    <!-- [END] edit personal Details -->
                                                                @endif

                                                            </div>
                                                        </div>

                                                        <!-- 2 Primary Contacts -->
                                                        <div class="col-md-12 ">

                                                            <div class="item-holder">

                                                                <!-- VIEWABLE Primary Contact -->
                                                                <div>
                                                                    <h4>
                                                                <span class="section-heading">
                                                                <i class="fa fa-id-card"></i>
                                                                Primary Contact
                                                                </span>
                                                                    </h4>

                                                                    <p>
                                                                        <i class="fa fa-caret-right"></i>
                                                                        E-mail
                                                                        <strong> {{ $user->email }} </strong>
                                                                    </p>
                                                                    <p>
                                                                        <i class="fa fa-caret-right"></i>
                                                                        Phone 1
                                                                        <strong>
                                                                            {{ $user->primaryContact->phone_1 == null ? "Not Available" : $user->primaryContact->phone_1 }}
                                                                        </strong>
                                                                    </p>

                                                                    <p>
                                                                        <i class="fa fa-caret-right"></i>
                                                                        Phone 2
                                                                        <strong> {{ $user->primaryContact->phone_2 == null ? "Not Available" : $user->primaryContact->phone_2  }} </strong>
                                                                    </p>

                                                                    <p>
                                                                        <i class="fa fa-caret-right"></i>
                                                                        Address
                                                                        <strong>
                                                                            {{ $user->primaryContact->region == null ? "NA" : $user->primaryContact->region }} ,
                                                                            {{ $user->primaryContact->district }} ,
                                                                            {{ $user->primaryContact->ward }} ,
                                                                            {{ $user->primaryContact->street   }}
                                                                        </strong>
                                                                    </p>
                                                                </div>
                                                                <!-- [End] VIEWABLE Primary Contact -->



                                                            </div>
                                                        </div>

                                                        <!---3 Emergence Contacts -->
                                                        <div class="col-md-12 ">
                                                            <div class="item-holder">

                                                                <!-- heading -->
                                                                <h4>
                                                                    <span class="section-heading">
                                                                    <i class="fa fa-address-book"></i>
                                                                    Emergence Contacts
                                                                    </span>

                                                                </h4>

                                                                <!-- List of emergency contacts -->
                                                                @foreach($user->emergenceContacts as $contacts)
                                                                    <div class="emergence-contact">
                                                                        <p>
                                                                            <i class="fa fa-user fa-small"></i>  Name
                                                                            <strong> {{ $contacts->name }}  </strong>
                                                                        </p>

                                                                        <p>
                                                                            <i class="fa fa-user-friends fa-small"></i> Relationship
                                                                            <strong> {{ $contacts->relationship }} </strong>
                                                                        </p>

                                                                        <p>
                                                                            <i class="fa fa-phone fa-small"></i>  Phone
                                                                            <strong> {{ $contacts->relationship }}  </strong>
                                                                        </p>

                                                                        <p >
                                                                            <i class="fa fa-home fa-small"></i>  Address
                                                                            <strong>
                                                                                {{ $contacts->region }} ,
                                                                                {{ $contacts->district }} ,
                                                                                {{ $contacts->ward }} ,
                                                                                {{ $contacts->street }}
                                                                            </strong>
                                                                        </p>
                                                                    </div>
                                                            @endforeach
                                                            <!-- [end] List of emergency contacts  -->
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <!-- Right Column -->
                                                <div class="col-md-6 encounter-item">
                                                    <div class="row previous-visits-holder">

                                                        <!-- Wallet Details-->
                                                        <div class="col-md-12 ">
                                                            <div class="item-holder">
                                                                <h4>
                                                                        <span class="section-heading">
                                                                        <i class="fa fa-wallet"></i>
                                                                        Wallet Information
                                                                        </span>
                                                                </h4>

                                                                <p>
                                                                    <i class="fa fa-caret-right"></i>
                                                                    Wallet ID
                                                                    <span style="font-weight: bold; ">
                                                                            {{ $user->dmw_token }}
                                                                        </span>
                                                                </p>

                                                                <p>
                                                                    <i class="fa fa-caret-right"></i>
                                                                    Status
                                                                    <span style="font-weight: bold; color: #1D8348">
                                                                            Active
                                                                        </span>
                                                                </p>


                                                                <p>
                                                                    <i class="fa fa-caret-right"></i>
                                                                    Last accessed
                                                                    <span style="font-weight: bold;">
                                                                            June 2, 2019 22:00pm
                                                                        </span>
                                                                </p>


                                                            </div>
                                                        </div>

                                                        <!-- Insurance -->
                                                        <div class="col-md-12 ">
                                                            <div class="item-holder">
                                                                <h4>
                                                                    <span class="section-heading">
                                                                        <i class="fa fa-umbrella"></i>
                                                                        Insurance
                                                                    </span>
                                                                </h4>

                                                                <p>
                                                                    <i class="fa fa-caret-right"></i>
                                                                    Provider
                                                                    <span style="font-weight: bold;">
                                                                           Jubilee
                                                                    </span>
                                                                </p>

                                                                <p>
                                                                    <i class="fa fa-caret-right"></i>
                                                                    Status
                                                                    <span style="font-weight: bold; color: #1D8348">
                                                                            Active
                                                                        </span>
                                                                </p>

                                                                <p>
                                                                    <i class="fa fa-caret-right"></i>
                                                                    Valid Until
                                                                    <span style="font-weight: bold;">
                                                                           Oct 4 2019
                                                                        </span>
                                                                </p>


                                                            </div>
                                                        </div>

                                                        <!---  Blood Relatives -->
                                                        <div class="col-md-12 ">
                                                            <div class="item-holder">
                                                                <h4>
                                                                <span class="section-heading">
                                                                <i class="fa fa-users"></i>
                                                                Blood Relatives
                                                                </span>
                                                                </h4>

                                                                <!-- List of Blood-Relatives -->
                                                                @foreach($user->relatives as $relative)
                                                                    <div class="blood-relative">
                                                                        <p>
                                                                            <i class="fa fa-user fa-small"></i>  Name
                                                                            <strong> {{ $relative->name }}  </strong>
                                                                        </p>

                                                                        <p>
                                                                            <i class="fa fa-user-friends fa-small"></i> Relationship
                                                                            <strong> {{ $relative->relationship }} </strong>
                                                                        </p>

                                                                        <p>
                                                                            <i class="fa fa-key fa-small"></i>  Wallet ID
                                                                            <strong>    {{ $relative->dmw_token }} </strong>
                                                                        </p>

                                                                        <p>
                                                                            <i class="fa fa-external-link-alt fa-small"></i>
                                                                            <a href="#">View relative</a>
                                                                        </p>

                                                                    </div>
                                                            @endforeach
                                                            <!-- [end] List of Blood-Relatives -->

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
