<!DOCTYPE html>
<html lang="en">
<head>
    <title>Health Care Provider Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">

    <style>

        .logo{
            color: #fff;
            background: #3498DB;
            padding: 10px;
            border-radius: 1em;
        }

        .tabs-wrapper{
            padding: 0 !important;
            margin: 0 !important;
            /*background: #ee792f;*/
        }

        .tab{
            background: #f5f5f5;
            margin: 0 !important;
            padding: 0.5em 2em;
            font-size: 1em;
            display: inline-block;
            border-top: 1px solid #eeeeee;
            border-left: 1px solid #eeeeee;
            border-right: 1px solid #eeeeee;
            border-top-left-radius: 0.5em;
            border-top-right-radius: 0.5em;

        }

        .active-tab{
            background: #eeeeee;
            border-top: 1px solid #3498DB !important;
            border-left: 1px solid #3498DB !important;
            border-right: 1px solid #3498DB !important;
            border-bottom: 1px solid #eeeeee;
        }

        .active-tab a{
            color: #000 ;
        }


        .registration-wrapper{
            border: 1px solid #3498DB;
            padding: 1em;
            background: #eeeeee;
        }

        .system-text-logo{
            font-family: 'Bree Serif', serif;
        }

        .page-activity-title{
            font-family: 'Noto Sans', sans-serif;
            padding: 1em;
            text-align: center;
            display: inline-block;
        }

        .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-color: #eeeeee #eeeeee #3498DB !important;
        }

        .nav-link.active{
            color: #495057;
            background-color: #eeeeee !important;
            border-color: #3498DB #3498DB #eeeeee !important;
        }

        .nav-link{
            font-size: 1.4em;
            padding-top: 0.2em;
            padding-bottom: 0.2em;
        }

        .provider-image{
            width: 4.5em;
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
            color: #616161;
            padding: 4px 1em;
            margin: 0
        }

    </style>

</head>
<body style="background: #ffffff">

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">
        <h3 class="system-text-logo" style="text-align: center; display: block">
            <i class="fa fa-stethoscope logo"> </i>
            DMW Databank
        </h3>
    </a>
</nav>
<br>

<div class="container" style="background: #ffffff">
    <div class="row justify-content-center">

        <div class="col-md-8" >
            <div style="text-align: center; margin-bottom: 1em" >
                <img class="provider-image" src="{{ asset('images/provider.png') }}" style="display: inline-block">
                <h2 class="page-activity-title"> Health Care Provider </h2>
            </div>

            <div class="registration-wrapper">

                <form method="POST" action="{{ route('health_provider.registration.save') }}" >
                    {{ @csrf_field() }}

                    <div class="card">

                        <div class="card-header">
                           <h3>
                            <a class="  active"
                               href="#">
                                <i class="fa fa-file-alt"> </i>
                                Facility Registration
                            </a>
                           </h3>
                         </div>

                        <div class="card-body">

                                <div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>


                                <!-- ######################### -->
                                <!-- Section 1 heading  Basic Info -->
                                <div class="section-divider" style="margin-top: 1em" >
                                </div>
                                <div class="section-heading">
                                    <h5>
                                       <i class="fa fa-info-circle"> </i>
                                        Basic Info
                                    </h5>
                                </div>

                                <!--1.1 Name -->
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control"
                                               placeholder="example: Regency Medical Center"
                                               name="facility_name" value="{{ old('facility_name') }}" required autofocus>
                                    </div>
                                </div>

                                <!--1.3 Type -->
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Type</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control"
                                               placeholder="examples: Dispensary, Laboratory "
                                               name="facility_type" value="" required autofocus>
                                    </div>
                                </div>

                                <!--1.3 Type -->
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Registration No</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control"
                                               placeholder="examples: Dispensary, Laboratory "
                                               name="facility_registration_number" value="" required autofocus>
                                    </div>
                                </div>

                                <!--1.4 Phone 1 -->
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Phone 1</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control"
                                               placeholder=" "
                                               name="phone_1" value="" required autofocus>
                                    </div>
                                </div>

                                <!--1.4 Phone 2 -->
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Phone 2 (Optional)</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control"
                                               placeholder=" "
                                               name="phone_2" value="" required autofocus>
                                    </div>
                                </div>



                                <!-- ######################### -->
                                <!-- Section 2 Location Heading -->
                                <div class="section-divider" >
                                </div>
                                <div class="section-heading">
                                    <h5>
                                        <i class="fa fa-map-marker"> </i>
                                        Facility Location
                                    </h5>
                                </div>

                                <!--2.1 Region -->
                                <div class="form-group row">
                                    <label for="region" class="col-md-4 col-form-label text-md-right">Region</label>

                                    <div class="col-md-6">
                                        <input id="region" type="text" class="form-control"
                                               name="region" value="" required autofocus>

                                    </div>
                                </div>

                                <!--2.2 District -->
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">District</label>

                                    <div class="col-md-6">
                                        <input id="district" type="text"
                                               class="form-control" name="district" value=""
                                               required autofocus>
                                    </div>
                                </div>

                                <!--2.3 Ward -->
                                <div class="form-group row">
                                    <label for="ward" class="col-md-4 col-form-label text-md-right">Ward</label>

                                    <div class="col-md-6">
                                        <input id="ward" type="text" class="form-control"
                                               name="ward" value="" required autofocus>

                                    </div>
                                </div>


                                <!-- ######################### -->
                                <!-- Section 3 Admin Details -->
                                <div class="section-divider" >
                                </div>
                                <div class="section-heading">
                                    <h5>
                                        <i class="fa fa-user-circle"> </i>
                                        Admin Details
                                    </h5>
                                </div>

                                <!--3.1 Full name -->
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Full Name</label>

                                    <div class="col-md-6">
                                        <input id="full_name" type="text" class="form-control"
                                               name="full_name" value="" required autofocus>

                                    </div>
                                </div>

                                <!--3.2 Position -->
                                <div class="form-group row">
                                    <label for="job_position" class="col-md-4 col-form-label text-md-right">Job Position</label>

                                    <div class="col-md-6">
                                        <input id="job_position" type="text" placeholder="example: IT Technician"
                                               class="form-control" name="job_position" value=""
                                               required autofocus>
                                    </div>
                                </div>

                                <!--2.3 Employee ID Number -->
                                <div class="form-group row">
                                    <label for="employee_id_number" class="col-md-4 col-form-label text-md-right">Employee ID #</label>
                                    <div class="col-md-6">
                                        <input id="employee_id_number" type="text" class="form-control"
                                               name="employee_id_number" value="" required autofocus>
                                    </div>
                                </div>


                                <!-- ######################### -->
                                <!-- Section 4 Authentication -->
                                <div class="section-divider"  >
                                </div>
                                <div class="section-heading"  >
                                    <h5  >
                                        <i class="fa fa-lock"> </i>
                                        Authentication Info
                                    </h5>
                                </div>

                                <!--4.1 -->
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">
                                        Login E-Mail
                                    </label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}" required>

                                    </div>
                                </div>

                                <!--4.2.A -->
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Create Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password" required>
                                    </div>
                                </div>

                                <!--4.2.B -->
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                        Confirm Password
                                    </label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password"
                                               class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                        </div>




                        <div class="card-footer">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>
                     </div>

                </form>

            </div>



        </div>
    </div>
</div>

</body>
</html>


