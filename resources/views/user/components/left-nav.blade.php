<!--Left Navigation -->
<div class="col-lg-3" style="background: #27AE60 !important; min-height: 100vh;  padding-left:0; padding-right: 0; ">

    <div style="padding: 1em; margin-top: 2em">
        <h2 class="logo-text">
            <i class="fa fa-wallet"> </i>
            <b>HIMS USER</b>
        </h2>
    </div>

    <div style="padding: 1em; " >

        <!-- Group 1 Menus-->
        <h3 class="nav-item-heading">MEDICAL LAB</h3>



        <li class="nav-item   list-unstyled">
            <a class="nav-link left-menu-link {{ $activeLeftNav=='basic'? 'active-left-nav' : '' }}"
               href="{{ route('user.profile') }}">
                <i class="fa fa-user"></i>
                Profile
            </a>
        </li>

        <li class="nav-item   list-unstyled">
            <a class="nav-link left-menu-link {{ $activeLeftNav=='medical'? 'active-left-nav' : '' }}"
               href="{{ route('user.info.medical') }}">
                <i class="fa fa-heartbeat"></i>
                Vitals
            </a>
        </li>


        <li class="nav-item   list-unstyled">
            <a class="nav-link left-menu-link {{ $activeLeftNav=='visits'? 'active-left-nav' : '' }}"
               href="{{ route('user') }}">
                <i class="fa fa-file-medical-alt"></i>
                Medical Journal
            </a>
        </li>



        <!-- Group 2 Menus-->
        <h3 class="nav-item-heading">Preferences </h3>

        <li class="nav-item  list-unstyled">
            <a class="nav-link left-menu-link " href="{{ route('user.pwd.form') }}">
                <i class="fa fa-cog"> </i>
                Change password
            </a>
        </li>
    </div>
</div>