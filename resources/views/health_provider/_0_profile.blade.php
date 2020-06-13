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
        /*** [[End]] Left Nav ***/


        /*** Profile Details **/
        .detail-item{
            font-size: 1.3em;
        }

        .item-value{
            font-weight: bold;
            margin-right: 8px;
        }
        /*** [End] Profile Details **/

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
                      <div class="col-md-9">


                          <div class="card">

                              <div class="card-header">
                                  <h3>
                                      <a class="  active"
                                         href="#">
                                          <i class="fa fa-hospital"> </i>
                                          Health care provider profile
                                      </a>
                                  </h3>
                              </div>

                              <div class="card-body">


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

                                  <!--Items-->
                                  <div class="form-group row justify-content-center">
                                      <div class="col-md-10 offset-2">
                                          <p class="detail-item">
                                              Name
                                             <span class="item-value"> {{ $healthCareProvider->facility_name }} </span>
                                          </p>
                                          <p class="detail-item">
                                              Type
                                              <span class="item-value"> {{ $healthCareProvider->facility_type }} </span>
                                          </p>
                                          <p class="detail-item">
                                              Registration N<u>o</u>
                                              @if( empty( $healthCareProvider->facility_registration_number  ))
                                              <span class="item-value"> N/A </span>
                                              @endif

                                              <span class="item-value"> {{ $healthCareProvider->facility_registration_number }} </span>
                                          </p>
                                          <p class="detail-item">
                                              Phone 1
                                              <span class="item-value"> {{ $healthCareProvider->phone_1 }} </span>
                                          </p>
                                          <p class="detail-item">
                                              Phone 2
                                              <span class="item-value"> {{ $healthCareProvider->phone_2 }} </span>

                                          </p>
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

                                  <!--Items-->
                                  <div class="form-group row justify-content-center">
                                      <div class="col-md-10 offset-2">
                                          <p class="detail-item">
                                              Region
                                              <span class="item-value"> {{ $healthCareProvider->region }} </span>
                                          </p>
                                          <p class="detail-item">
                                              District
                                              <span class="item-value"> {{ $healthCareProvider->district }} </span>
                                          </p>
                                          <p class="detail-item">
                                              Ward
                                              <span class="item-value"> {{ $healthCareProvider->ward }} </span>
                                          </p>
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


                                  <!--Items-->
                                  <div class="form-group row justify-content-center">
                                      <div class="col-md-10 offset-2">
                                          <p class="detail-item">
                                              Full name
                                              <span class="item-value"> {{ $healthCareProvider->full_name }} </span>
                                          </p>
                                          <p class="detail-item">
                                              Job Position
                                              <span class="item-value"> {{ $healthCareProvider->job_position }} </span>
                                          </p>
                                          <p class="detail-item">
                                              Employee ID
                                              <span class="item-value"> {{ $healthCareProvider->employee_id_number }} </span>
                                          </p>
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

                                  <div class="col-md-10 offset-2">
                                      <p class="detail-item">
                                          Login E-Mail
                                          <span class="item-value"> {{ $healthCareProvider->email }} </span>
                                      </p>


                                  </div>

                              </div>




                              {{--<div class="card-footer">--}}
                                  {{--<div class="form-group row mb-0">--}}
                                      {{--<div class="col-md-6 offset-md-4">--}}
                                          {{--<button type="submit" class="btn btn-primary">--}}
                                              {{--Register--}}
                                          {{--</button>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                              {{--</div>--}}
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
