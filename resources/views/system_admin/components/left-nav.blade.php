<div class="col-lg-3" style="background: #2874A6 !important; min-height: 100vh;  padding-left:0; padding-right: 0; ">

    <div style="padding: 1em; margin-top: 2em">
        <h3 class="left-menu-logo" >
            <i class="fa fa-stethoscope dmw-logo"> </i>
            <b>DMW HC-Provider</b>
        </h3>
    </div>

    <div style="padding: 1em; " >

        <h3 class="nav-item-heading">Navigation</h3>


        <li class="nav-item   list-unstyled ">
            <a class="nav-link left-menu-link {{ $activeLeftNav == 'providers'? 'active-left-menu' : ' ' }}"
               href="{{ route('system.admin') }}">
                <i class="fa fa-hospital"></i>
                Health Care Providers
            </a>
        </li>

        <li class="nav-item  list-unstyled ">
            <a class="nav-link left-menu-link {{ $activeLeftNav == 'patients'? 'active-left-menu' : ' ' }}"
               href="{{ route('system.admin.patients') }}">
                <i class="fa fa-users"></i>
                Patients
            </a>
        </li>



        <h3 class="nav-item-heading">Preferences </h3>

        {{--<li class="nav-item  list-unstyled">--}}
            {{--<a class="nav-link left-menu-link  {{ $activeLeftNav == 'profile'? 'active-left-menu' : ' ' }}"--}}
               {{--href="{{ route('health_provider.profile') }}">--}}
                {{--<i class="fa fa-cog"> </i>--}}
                {{--Profile--}}
            {{--</a>--}}
        {{--</li>--}}

    </div>
</div>

