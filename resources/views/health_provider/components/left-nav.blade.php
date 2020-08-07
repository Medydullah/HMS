<div class="col-lg-3" style="background: #2874A6 !important; min-height: 100vh;  padding-left:0; padding-right: 0; ">

    <div style="padding: 1em; margin-top: 2em">
        <h3 class="left-menu-logo">
            <i class="fa fa-stethoscope dmw-logo"> </i>
            <b>HIMS HC-Provider</b>
        </h3>
    </div>

    <div style="padding: 1em; ">

        <h3 class="nav-item-heading">Navigation</h3>


        <li class="nav-item   list-unstyled ">
            <a class="nav-link left-menu-link {{ $activeLeftNav == 'staff'? 'active-left-menu' : ' ' }}"
                href="{{ route('health_provider.employees') }}/doctors">
                <i class="fa fa-users"></i>
                Staff
            </a>
        </li>

        <li class="nav-item  list-unstyled ">
            <a class="nav-link left-menu-link {{ $activeLeftNav == 'service-forms'? 'active-left-menu' : ' ' }}"
                href="{{ route('health_provider.admin.service_forms') }}">
                <i class="fa fa-wallet"></i>
                Service Forms
            </a>
        </li>

        <li class="nav-item  list-unstyled ">
            <a class="nav-link left-menu-link {{ $activeLeftNav == 'price'? 'active-left-menu' : ' ' }}" href="#">
                <i class="fa fa-wallet"></i>
                Medical & Drug Price
            </a>
        </li>
        <li class="nav-item   list-unstyled ">
            <a class="nav-link left-menu-link {{ $activeLeftNav == 'report'? 'active-left-menu' : ' ' }}" href="{{ route('health_provider.staff.generate') }}">
                <i class="fa fa-users"></i>
                Generate Report
            </a>
        </li>
        <li class="nav-item   list-unstyled ">
            <a class="nav-link left-menu-link {{ $activeLeftNav == 'uploaded'? 'active-left-menu' : ' ' }}" href="#">
                <i class="fa fa-users"></i>
                Uploaded Report</a>
        </li>
        <li class="nav-item   list-unstyled ">
            <a class="nav-link left-menu-link {{ $activeLeftNav == 'notification'? 'active-left-menu' : ' ' }}"
                href="#">
                <i class="fa fa-users"></i>
                Notification
            </a>
        </li>



        <h3 class="nav-item-heading">Preferences </h3>

        <li class="nav-item  list-unstyled">
            <a class="nav-link left-menu-link  {{ $activeLeftNav == 'profile'? 'active-left-menu' : ' ' }}"
                href="{{ route('health_provider.profile') }}">
                <i class="fa fa-cog"> </i>
                Profile
            </a>
        </li>

    </div>
</div>