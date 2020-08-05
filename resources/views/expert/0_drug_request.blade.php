<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- title {{ config('app.name', 'Laravel') }} -->
    <title>Pharmacist</title>

    <!-- Scripts {{ config('app.name', 'Laravel') }} -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
        /*** [[End]] Left Nav ***/

    </style>
</head>




<body style="background:  #e6ecf0">

<div id="app">

              @include('expert.components.drug_top_nav')

              <div class="dashed-form">
                                                                 <!-- form heading -->
                                                                <h4>
                                                                   <span class="section-heading">
                                                                       <i class="fa fa-user"></i>
                                                                       Request Drug Form
                                                                   </span>
                                                                </h4>

                                                                <!--1.1 Full name -->
                                                                <div class="row form-input-row">
                                                                    <label for="name" class="col-md-4 form-label">Staff name</label>
                                                                    <div class=" col-md-8">
                                                                    <input type="text" class="form-control " id="name"
                                                                           value=""
                                                                           name="name">
                                                                    </div>
                                                                </div>


                                                                <!--1.5 Ethnicity -->
                                                                <div class="row form-input-row">
                                                                    <label for="ethnicity"
                                                                           class="col-md-4 form-label">Staff ID</label>
                                                                    <div class=" col-md-8">
                                                                    <input type="text"
                                                                           class="form-control"
                                                                           id="ethnicity"
                                                                           value=""
                                                                           name="ethnicity">
                                                                    </div>
                                                                </div>
                                                                <div class="row form-input-row">
                                                                    <label for="occupation" class="col-md-4 form-label">Drug ID</label>
                                                                    <div class=" col-md-8">
                                                                    <input type="text" class="form-control" id="occupation"
                                                                           value=""
                                                                           name="occupation">
                                                                    </div>
                                                                </div>
                                                                <div class="row form-input-row">
                                                                    <label for="occupation" class="col-md-4 form-label">Drug Name</label>
                                                                    <div class=" col-md-8">
                                                                    <input type="text" class="form-control" id="occupation"
                                                                           value=""
                                                                           name="occupation">
                                                                    </div>
                                                                </div>

 <!--1.2 Birth date -->
 <div class="row form-input-row">
                                                                    <label for="dob" class="col-md-4 form-label">Request Date</label>
                                                                    <div class=" col-md-8">
                                                                    <input type="date" class="form-control " id="dob"
                                                                           value=""
                                                                           name="date">
                                                                    </div>
                                                                </div
                                                                      <!--1.6 Tribe -->
                                                                      <div class="row form-input-row">
                                                                    <label for="tribe" class="col-md-4 form-label">Drug Category</label>
                                                                    <div class=" col-md-8">
                                                                    <input type="text" class="form-control " id="tribe"
                                                                           value=""
                                                                           name="tribe">
                                                                    </div>
                                                                </div>

                                                                <!--1.7 Occupation -->
                                                                <div class="row form-input-row">
                                                                    <label for="occupation" class="col-md-4 form-label">Quantity</label>
                                                                    <div class=" col-md-8">
                                                                    <input type="text" class="form-control" id="occupation"
                                                                           value=""
                                                                           name="occupation">
                                                                    </div>
                                                                </div>

                                                                <!-- Save button -->
                                                                <div class="row form-input-row justify-content-center">
                                                                   <button type="submit" class="btn btn-sm btn-primary col-md-8">
                                                                       REQUEST
                                                                   </button>
                                                                </div>
                                                            </div>
                                                            </form>
                                                            <!-- [END] edit personal Details -->

