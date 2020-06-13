<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
        {{--{{ config('app.name', 'Laravel') }}--}}
        {{--</a>--}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <i class="fa fa-user" style="font-size: 1.2em; padding: 0.2em"> </i>
                <h4>
                @role("doctor")
                    Doctor
                @endrole
                @role("lab")
                    Lab Technician
                @endrole
                @role("pharmacist")
                    Pharmacist
                @endrole
                @role("receptionist")
                    Accountant/Receptionist
                @endrole

                </h4>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-user-circle"> </i>
                        {{  Auth::user()->name  }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('health_employee.logout') }}">
                            <i class="fa fa-lock-open"> </i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>