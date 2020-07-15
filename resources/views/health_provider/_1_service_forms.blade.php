<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HIMS</title>

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

        /*** Service form Date Nav**/
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

                                              <!-- Date picker -->
                                              <div class="date-picker-div">

                                                      <div>
                                                          <a  href="{{ route('health_provider.admin.service_forms') }}"
                                                              class="btn btn-sm  {{ $activeDate == $recentDates->first ? "btn-primary":"btn-outline-primary" }}" date-button>
                                                              {{ Carbon\Carbon::parse($recentDates->first)->toFormattedDateString() }}
                                                          </a>

                                                          <a href="{{ route('health_provider.admin.service_forms.by_date') }}/{{ $recentDates->second }}"
                                                             class="btn btn-sm    {{ $activeDate == $recentDates->second ? "btn-primary":"btn-outline-primary" }}" date-button>
                                                              {{ Carbon\Carbon::parse($recentDates->second)->toFormattedDateString() }}
                                                          </a>

                                                          <a href="{{ route('health_provider.admin.service_forms.by_date') }}/{{ $recentDates->third }}"
                                                             class="btn btn-sm    {{ $activeDate == $recentDates->third ? "btn-primary":"btn-outline-primary" }}" date-button>
                                                              {{ Carbon\Carbon::parse($recentDates->third)->toFormattedDateString() }}
                                                          </a>

                                                          <a href="{{ route('health_provider.admin.service_forms.by_date') }}/{{ $recentDates->forth }}"
                                                             class="btn btn-sm    {{ $activeDate == $recentDates->forth ? "btn-primary":"btn-outline-primary" }}" date-button>
                                                              {{ Carbon\Carbon::parse($recentDates->forth)->toFormattedDateString() }}
                                                          </a>

                                                          <a href="{{ route('health_provider.admin.service_forms.by_date') }}/{{ $recentDates->fifth }}"
                                                             class="btn btn-sm    {{ $activeDate == $recentDates->fifth ? "btn-primary":"btn-outline-primary" }}" date-button>
                                                              {{ Carbon\Carbon::parse($recentDates->fifth)->toFormattedDateString() }}
                                                          </a>

                                                          <a href="{{ route('health_provider.admin.service_forms.by_date') }}/{{ $recentDates->sixth }}"
                                                             class="btn btn-sm    {{ $activeDate == $recentDates->sixth ? "btn-primary":"btn-outline-primary" }}" date-button>
                                                              {{ Carbon\Carbon::parse($recentDates->sixth)->toFormattedDateString() }}
                                                          </a>


                                                      </div>

                                                      <div style="margin-top: 0.8em; border-top: 1px solid #ddd; padding-top: 1em">

                                                          <Form action="{{ route('health_provider.admin.service_forms.by_date') }}" method="POST">
                                                              {{ @csrf_field() }}

                                                          <div class="input-group mb-3">
                                                              <div class="input-group-prepend">
                                                                  <span class="input-group-text">Day</span>
                                                              </div>

                                                              <select class="form-control" name="day">
                                                                  <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option> <option>6</option> <option>7</option> <option>8</option> <option>9</option> <option>10</option>
                                                                  <option>11</option> <option>12</option> <option>13</option> <option selected>14</option> <option>15</option> <option>16</option> <option>17</option> <option>18</option> <option>19</option> <option>20</option>
                                                                  <option>21</option> <option>22</option> <option>23</option> <option>24</option> <option>25</option> <option>26</option> <option>27</option> <option>28</option> <option>29</option> <option>30</option>
                                                                  <option>31</option>
                                                              </select>

                                                              <div class="input-group-prepend">
                                                                  <span class="input-group-text">Month</span>
                                                              </div>
                                                              <select class="form-control" name="month">
                                                                  <option>1</option> <option>2</option> <option>3</option> <option>4</option> <option>5</option> <option >6</option> <option selected>7</option> <option>8</option> <option>9</option> <option>10</option>
                                                                  <option>11</option> <option>12</option>
                                                              </select>

                                                              <div class="input-group-prepend">
                                                                  <span class="input-group-text">Year</span>
                                                              </div>
                                                              <select class="form-control" name="year" style="padding-left: 3px; padding-right: 3px">
                                                                  <option>2019</option> <option>2020</option>
                                                              </select>
                                                              <div class="input-group-append">
                                                                  <button class="btn btn-success" type="submit">Get </button>
                                                              </div>
                                                          </div>
                                                          </Form>
                                                      </div>


                                              </div>

                                              <!-- Form List -->
                                              <div style="margin-top: 2em">

                                                  @foreach( $visits as $visit)

                                                       <div class="col-md-7 ">
                                                              <div class="visit-item bg-visit">
                                                                  <p>
                                                                      <a class="token-label ">
                                                                          <i class="fa fa-walking"></i>
                                                                          {{ $visit->name }}
                                                                      </a>

                                                                      @if(  $visit->patient_confirmation == true )
                                                                          <a class="btn btn-round btn-sm btn-primary float-right"
                                                                             href="{{ route('health_provider.admin.service_forms.details') }}/{{ $visit->id }}">
                                                                              Open
                                                                          </a>
                                                                      @endif


                                                                      <a class="btn btn-sm float-right">
                                                                          <strong>
                                                                              {{
                                                                               Carbon\Carbon::parse($visit->created_at)->toDayDateTimeString()
                                                                              }},
                                                                          </strong>
                                                                      </a>

                                                                  </p>

                                                                  <div class="thin-divider">
                                                                  </div>

                                                                  <p>
                                                                      <i class="fa fa-hashtag"></i>
                                                                      Serial
                                                                      <strong> {{ $visit->serial_number  }}  </strong>
                                                                  </p>


                                                                  <p>
                                                                      <i class="fa fa-money-bill-alt"></i>
                                                                      Payment Mode
                                                                      <strong>{{ $visit->payment_type }} </strong>
                                                                  </p>

                                                                  @if( $visit->patient_confirmation == false )
                                                                      <p style="color: #ee393e; display: inline-block">
                                                                          <i class="fa fa-exclamation-triangle"></i>
                                                                          Form not confirmed
                                                                      </p>

                                                                      <a class="btn btn-sm btn-danger float-right btn-round "
                                                                         href="#">
                                                                          Remove
                                                                      </a>
                                                                  @endif

                                                              </div>
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
              </main>
              <!-- End -->

          </div>

      </div>

  </div>

</div>
</body>
</html>
