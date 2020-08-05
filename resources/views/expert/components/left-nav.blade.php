<div class="col-lg-3" style="background: #2874A6 !important; min-height: 100vh;  padding-left:0; padding-right: 0; ">

    <div style="padding: 1em; margin-top: 2em">
        <h3 class="left-menu-logo" >
            <i class="fa fa-stethoscope dmw-logo"> </i>
            <b>HIMS HC-Provider</b>
        </h3>
    </div>

    <div style="padding: 1em; " >

        <h3 class="nav-item-heading">DATALAB</h3>

        <li class="nav-item  list-unstyled ">
            <a class="nav-link left-menu-link {{ $activeLeftNav == 'wallets'? 'active-left-menu' : ' ' }}"
               href="{{ route('hce.patient.wallet.search') }}">
                <i class="fa fa-wallet"></i>
                Service Forms
            </a>
        </li>

        @role('receptionist')
        <li class="nav-item   list-unstyled ">
            <a class="nav-link left-menu-link {{ $activeLeftNav == 'accounts'? 'active-left-menu' : ' ' }}"
               href="{{ route('hce.opd') }}/insurance">
                <i class="fa fa-money-bill-alt"></i>
                Accounts
            </a>
        </li>
        @endrole

        @role('pharmacist')
        
        <li class="nav-item   list-unstyled ">
            <a class="nav-link left-menu-link {{ $activeLeftNav == 'drugs'? 'active-left-menu' : ' ' }}"
               href="{{ route('hce.pharmacy') }}">
                <i class="fa fa-money-bill-alt"></i>
                Drugs
            </a>
        </li>
      
         <li class="nav-item   list-unstyled ">
            <a class="nav-link left-menu-link {{ $activeLeftNav == 'incomes'? 'active-left-menu' : ' ' }}"
               href="{{ route('hce.income') }}/income">
                <i class="fa fa-money-bill-alt"></i>
                Stock Income
            </a>
        </li>
          <!--
        <li class="nav-item   list-unstyled ">
            <a class="nav-link left-menu-link {{ $activeLeftNav == 'accounts'? 'active-left-menu' : ' ' }}"
               href="{{ route('hce.opd') }}">
                <i class="fa fa-money-bill-alt"></i>
                Request Drugs
            </a>
        </li>
        <li class="nav-item   list-unstyled ">
            <a class="nav-link left-menu-link {{ $activeLeftNav == 'accounts'? 'active-left-menu' : ' ' }}"
               href="{{ route('hce.opd') }}">
                <i class="fa fa-money-bill-alt"></i>
                View Stock
            </a>
        </li> -->
       
        @endrole

        <h3 class="nav-item-heading">Preferences </h3>

        <li class="nav-item  list-unstyled">
            <a class="nav-link left-menu-link" href="#">
                <i class="fa fa-user-circle"> </i>
                My Profile
            </a>
        </li>

        <li class="nav-item  list-unstyled">
            <a class="nav-link left-menu-link " href="#">
                <i class="fa fa-cog"> </i>
                Change password
            </a>
        </li>
    </div>
</div>

