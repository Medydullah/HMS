<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- title {{ config('app.name', 'Laravel') }} -->
    <title>Admin</title>

    <!-- Scripts {{ config('app.name', 'Laravel') }} -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/widgets.css') }}" rel="stylesheet">

    <style>
     
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

  <div class="container-fluid">
      <div class="row">

          @include('expert.components.left-nav')

          <div class="col-lg-9" style="padding-left:0; padding-right: 0;">

              @include('expert.components.top_nav')

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
                                              <i class="fa fa-users"> </i>
                                              Staff
                                          </h3>
                                      </div>
                                  </div>
                              </div>
                              

                              <div class="card-body">

                                  <div class="container-fluid" style="background: #ffffff">
                                      <div class="row justify-content-center">

                                          <div class="col-md-12" >

                                              <!-- STAFF TABS -->
                                              <div class="tabs-wrapper"  >
                                                  <ul class="nav nav-tabs nav-justified">


                                                      <li class="nav-item">
                                                          <!-- <a class="nav-link {{ $activeTab=='receptionists'? 'active' : ' ' }} "
                                                             href="{{ route('health_provider.employees') }}/receptionists"> -->
                                                              <i class="fa fa-money-bill"> </i>
                                                              Receptionist
                                                          </a>
                                                      </li>

                                                      <li class="nav-item">
                                                          <!-- <a class="nav-link {{ $activeTab=='doctors'? 'active' : ' ' }}"
                                                             href="{{ route('health_provider.employees') }}/doctors"> -->
                                                              <i class="fa fa-user-md"> </i>
                                                              Doctors
                                                          </a>
                                                      </li>


                                                      <li class="nav-item">
                                                          <!-- <a class="nav-link {{ $activeTab=='labs'? 'active' : ' ' }} "
                                                             href="{{ route('health_provider.employees') }}/labs"> -->
                                                              <i class="fa fa-microscope"> </i>
                                                              Lab Technicians
                                                          </a>
                                                      </li>

                                                      <li class="nav-item">
                                                          <!-- <a class="nav-link {{ $activeTab=='pharmacists'? 'active' : ' ' }} "
                                                             href="{{ route('health_provider.employees') }}/pharmacists"> -->
                                                              <i class="fa fa-pills"> </i>
                                                              Pharmacists
                                                          </a>
                                                      </li>

                                                  </ul>
                                              </div>

