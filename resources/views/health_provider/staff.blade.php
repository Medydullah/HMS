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
                                                          <a class="nav-link {{ $activeTab=='receptionists'? 'active' : ' ' }} "
                                                             href="{{ route('health_provider.employees') }}/receptionists">
                                                              <i class="fa fa-money-bill"> </i>
                                                              Receptionist
                                                          </a>
                                                      </li>

                                                      <li class="nav-item">
                                                          <a class="nav-link {{ $activeTab=='doctors'? 'active' : ' ' }}"
                                                             href="{{ route('health_provider.employees') }}/doctors">
                                                              <i class="fa fa-user-md"> </i>
                                                              Doctors
                                                          </a>
                                                      </li>


                                                      <li class="nav-item">
                                                          <a class="nav-link {{ $activeTab=='labs'? 'active' : ' ' }} "
                                                             href="{{ route('health_provider.employees') }}/labs">
                                                              <i class="fa fa-microscope"> </i>
                                                              Lab Technicians
                                                          </a>
                                                      </li>

                                                      <li class="nav-item">
                                                          <a class="nav-link {{ $activeTab=='pharmacists'? 'active' : ' ' }} "
                                                             href="{{ route('health_provider.employees') }}/pharmacists">
                                                              <i class="fa fa-pills"> </i>
                                                              Pharmacists
                                                          </a>
                                                      </li>

                                                  </ul>
                                              </div>


                                              <div class="content-wrapper" style="background: #f8fafc;">
                                                  <div class="list-wrapper">



                                                      <!-- List of Employees -->
                                                      @if(  $editMode=='none' )
                                                          <div>
                                                              <div>
                                                                  <ul class="nav">
                                                                      <li class="nav-item">
                                                                          <a class="nav-link"
                                                                             href="{{ route('health_provider.employee.add.form') }}/{{ $activeTab }}">
                                                                              <i class="fa fa-user-plus"></i>
                                                                              Add {{ $profession }}
                                                                          </a>
                                                                      </li>

                                                                  </ul>
                                                              </div>
                                                              <table class="table">
                                                                  <thead>
                                                                  <tr>
                                                                      <th>S/N</th>
                                                                      <th>Name</th>
                                                                      <th>email</th>
                                                                      <th>Qualification</th>
                                                                      <th>Specialization</th>
                                                                      <th> </th>
                                                                  </tr>
                                                                  </thead>
                                                                  <tbody>

                                                                  @foreach( $healthCareEmployees as $healthCareEmployee )
                                                                      <tr class="table-success">
                                                                          <td>{{ $healthCareEmployee->id }}</td>
                                                                          <td>{{ $healthCareEmployee->name }}</td>
                                                                          <td>{{ $healthCareEmployee->email }}</td>
                                                                          <td>{{ $healthCareEmployee->qualification }}</td>
                                                                          <td>{{ $healthCareEmployee->specialization }}</td>
                                                                          <td>
                                                                              <a class="btn btn-sm btn-outline-primary"
                                                                                 href="{{ route('health_provider.employee.edit.form') }}/{{ $activeTab }}/{{ $healthCareEmployee->id }}">
                                                                                  Edit
                                                                              </a>
                                                                          </td>
                                                                          <td>
                                                                              <a class="btn btn-sm btn-danger"
                                                                                href="{{ route('health_provider.employee.delete') }}/{{ $healthCareEmployee->id }}">
                                                                                  Remove
                                                                              </a>
                                                                          </td>

                                                                      </tr>
                                                                  @endforeach

                                                                  </tbody>
                                                              </table>
                                                          </div>
                                                      @endif

                                                      @if( $editMode=='new_doctor' )
                                                      <!-- New Employee -->
                                                          <form method="POST" action="{{ $isUpdate ? route('health_provider.employee.update') : route('health_provider.employee.add.save') }}" >

                                                              {{ @csrf_field() }}
                                                              <input name="active_tab" type="hidden" value="{{ $activeTab }}">
                                                              <input name="expert_id" type="hidden" value="{{ $selectedEmployees->id }}">

                                                              <div class="card col-md-10 offset-1 new-employee-wrapper">

                                                                  <div>
                                                                      <h4>
                                                                          @if( $isUpdate)
                                                                              <i class="fa fa-user-edit"> </i>
                                                                              Edit {{ $profession }}
                                                                          @else
                                                                              <i class="fa fa-user-plus"> </i>
                                                                              New {{ $profession }}
                                                                          @endif


                                                                          <a class="btn btn-sm btn-danger float-right"
                                                                             href="{{ route('health_provider.employees') }}/{{ $activeTab }}">
                                                                              <i class="fa fa-times-circle"> </i>  Cancel
                                                                          </a>
                                                                      </h4>
                                                                  </div>

                                                                  <div class="card-body">

                                                                      <!-- New Employee Validation -->
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
                                                                      <!-- Section 1 heading  Employees Particulars -->
                                                                      <div class="section-divider" style="margin-top: 1em" >
                                                                      </div>
                                                                      <div class="section-heading">
                                                                          <h5>
                                                                              <i class="fa fa-user-circle"> </i>
                                                                              @if( $isUpdate)
                                                                                  {{  $selectedEmployees->name }} Particulars
                                                                              @else
                                                                                  {{ $profession }} Particulars
                                                                              @endif
                                                                          </h5>
                                                                      </div>

                                                                      <!--1.1 Full Name -->
                                                                      <div class="form-group row">
                                                                          <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>

                                                                          <div class="col-md-8">
                                                                              <input id="name" type="text" class="form-control"
                                                                                     placeholder=" "
                                                                                     name="name" value="{{  $selectedEmployees->name }}{{ old('name') }}" required autofocus>
                                                                          </div>
                                                                      </div>

                                                                      <!--1.2 Email -->
                                                                      <div class="form-group row">
                                                                          <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                                                          <div class="col-md-8">
                                                                              <input id="email" type="text" class="form-control"
                                                                                     placeholder=""
                                                                                     name="email" value="{{  $selectedEmployees->email }}{{ old('email') }}"  required autofocus>
                                                                          </div>
                                                                      </div>

                                                                      <!--1.2 Phone -->
                                                                      <div class="form-group row">
                                                                          <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                                                                          <div class="col-md-8">
                                                                              <input id="phone" type="text" class="form-control"
                                                                                     placeholder=" "
                                                                                     name="phone" value="{{  $selectedEmployees->phone }}{{ old('phone') }}" required autofocus>
                                                                          </div>
                                                                      </div>

                                                                      <!--1.3 Employment ID -->
                                                                      <div class="form-group row">
                                                                          <label for="employment_id" class="col-md-4 col-form-label text-md-right">
                                                                              Employment ID N<u>o</u>
                                                                          </label>

                                                                          <div class="col-md-8">
                                                                              <input id="employment_id" type="text" class="form-control"
                                                                                     placeholder=" "
                                                                                     name="employment_id" value="{{  $selectedEmployees->employment_id }}{{ old('employment_id') }}" required >
                                                                          </div>
                                                                      </div>

                                                                      <!--1.4 Qualification -->
                                                                      <div class="form-group row">
                                                                          <label for="qualification" class="col-md-4 col-form-label text-md-right">Qualification</label>

                                                                          <div class="col-md-8">
                                                                              <input id="qualification" type="text" class="form-control"
                                                                                     placeholder="Examples: MD, DO, MBBS, MChir, DChir, "
                                                                                     name="qualification" value="{{  $selectedEmployees->qualification }}{{ old('qualification') }}"  >
                                                                          </div>
                                                                      </div>

                                                                      <!--1.5 Specialization -->
                                                                      <div class="form-group row">
                                                                          <label for="specialization" class="col-md-4 col-form-label text-md-right">
                                                                              Specialization
                                                                          </label>

                                                                          <div class="col-md-8">
                                                                              <input id="specialization" type="text" class="form-control"
                                                                                     placeholder="Examples: Paediatrics, Gynaecology"
                                                                                     name="specialization" value="{{  $selectedEmployees->specialization }}{{ old('specialization') }}" >
                                                                          </div>
                                                                      </div>


                                                                      <!-- ######################### -->
                                                                      <!-- Section 2 Permissions -->
                                                                      <div class="section-divider" style="margin-top: 1em" >
                                                                      </div>
                                                                      <div class="section-heading">
                                                                          <h5>
                                                                              <i class="fa fa-lock"> </i>
                                                                              Permissions
                                                                          </h5>
                                                                      </div>

                                                                      <!-- General Permission -->
                                                                      <div class="form-group row permission-group" >
                                                                          <div class="col-12">
                                                                              <h5>
                                                                                  <b>General</b>
                                                                              </h5>
                                                                          </div>

                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox"
                                                                                         name="view_basic_info" id="view_basic_info" {{ old('view_basic_info') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="view_basic_info">
                                                                                      View Basic info
                                                                                  </label>
                                                                              </div>
                                                                          </div>

                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="view_medical_journal"
                                                                                         id="view_medical_journal" {{ old('view_medical_journal') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="view_medical_journal">
                                                                                      View Medical Journal
                                                                                  </label>
                                                                              </div>
                                                                          </div>

                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="view_medical_background"
                                                                                         id="view_medical_background" {{ old('view_medical_background') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="view_medical_background">
                                                                                      View Medical Background
                                                                                  </label>
                                                                              </div>
                                                                          </div>

                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="update_medical_background"
                                                                                         id="update_medical_background" {{ old('update_medical_background') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="update_medical_background">
                                                                                      Update Medical Background
                                                                                  </label>
                                                                              </div>
                                                                          </div>

                                                                      </div>

                                                                      <!-- Visit Permission -->
                                                                      <div class="form-group row permission-group" >
                                                                          <div class="col-12">
                                                                              <h5>
                                                                                  <b>Visit Form</b>
                                                                              </h5>
                                                                          </div>

                                                                          <!-- 1 -->
                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="add_symptoms"
                                                                                         id="add_symptoms" {{ old('add_symptoms') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="add_symptoms">
                                                                                      Add Symptoms/Complaints
                                                                                  </label>
                                                                              </div>
                                                                          </div>
                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="view_symptoms"
                                                                                         id="view_symptoms" {{ old('view_symptoms') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="view_symptoms">
                                                                                      View Complaints/Symptoms
                                                                                  </label>
                                                                              </div>
                                                                          </div>

                                                                          <!-- 2 -->
                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="recommend_test"
                                                                                         id="recommend_test" {{ old('recommend_test') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="recommend_test">
                                                                                      Recommend tests/Examination
                                                                                  </label>
                                                                              </div>
                                                                          </div>
                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="view_recommended_test"
                                                                                         id="view_recommended_test" {{ old('view_recommended_test') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="view_recommended_test">
                                                                                      View Recommended tests
                                                                                  </label>
                                                                              </div>
                                                                          </div>


                                                                          <!-- 3 -->
                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="add_test_result"
                                                                                         id="add_test_result" {{ old('add_test_result') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="add_test_result">
                                                                                      Add test results
                                                                                  </label>
                                                                              </div>
                                                                          </div>
                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="view_test_results"
                                                                                         id="view_test_results" {{ old('view_test_results') ? 'view_test_results' : '' }}>
                                                                                  <label class="form-check-label" for="remember">
                                                                                      View test results
                                                                                  </label>
                                                                              </div>
                                                                          </div>


                                                                          <!-- 4 -->
                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="add_prescription"
                                                                                         id="add_prescription" {{ old('add_prescription') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="add_prescription">
                                                                                      Add prescription
                                                                                  </label>
                                                                              </div>
                                                                          </div>
                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="view_prescription"
                                                                                         id="view_prescription" {{ old('view_prescription') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="view_prescription">
                                                                                      View prescription
                                                                                  </label>
                                                                              </div>
                                                                          </div>


                                                                          <!-- 5 -->
                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="issue_medicine"
                                                                                         id="issue_medicine" {{ old('issue_medicine') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="issue_medicine">
                                                                                      Issue Medicines
                                                                                  </label>
                                                                              </div>
                                                                          </div>
                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="view_issued_medicine"
                                                                                         id="view_issued_medicine" {{ old('view_issued_medicine') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="view_issued_medicine">
                                                                                      View issued Medicines
                                                                                  </label>
                                                                              </div>
                                                                          </div>

                                                                      </div>

                                                                      <!-- Payments Permission -->
                                                                      <div class="form-group row permission-group" >
                                                                          <div class="col-12">
                                                                              <h5>
                                                                                  <b>Fees</b>
                                                                              </h5>
                                                                          </div>

                                                                          <!-- 1 -->
                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="verify_consultation_fee"
                                                                                         id="verify_consultation_fee" {{ old('verify_consultation_fee') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="verify_consultation_fee">
                                                                                      Verify Consultation fee
                                                                                  </label>
                                                                              </div>
                                                                          </div>
                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="check_consultation_fee"
                                                                                         id="check_consultation_fee" {{ old('check_consultation_fee') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="check_consultation_fee">
                                                                                      Check Consultation fee status
                                                                                  </label>
                                                                              </div>
                                                                          </div>

                                                                          <!-- 2 -->
                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="verify_lab_fee"
                                                                                         id="verify_lab_fee" {{ old('verify_lab_fee') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="verify_lab_fee">
                                                                                      Verify Lab-test fee
                                                                                  </label>
                                                                              </div>
                                                                          </div>
                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="check_lab_fee"
                                                                                         id="check_lab_fee" {{ old('check_lab_fee') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="check_lab_fee">
                                                                                      View Lab-tests fee status
                                                                                  </label>
                                                                              </div>
                                                                          </div>


                                                                          <!-- 3 -->
                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="verify_medicine_fee"
                                                                                         id="verify_medicine_fee" {{ old('verify_medicine_fee') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="verify_medicine_fee">
                                                                                      Verify Medicine fee
                                                                                  </label>
                                                                              </div>
                                                                          </div>
                                                                          <div class="col-md-6">
                                                                              <div class="form-check">
                                                                                  <input class="form-check-input" type="checkbox" name="check_medicine_fee"
                                                                                         id="check_medicine_fee" {{ old('check_medicine_fee') ? 'checked' : '' }}>
                                                                                  <label class="form-check-label" for="check_medicine_fee">
                                                                                      View medicine fee status
                                                                                  </label>
                                                                              </div>
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

                                                      @if( $view_mode=='details' )
                                                      <!-- New Employee -->
                                                      @endif

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
