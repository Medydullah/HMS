
<ul class="nav nav-tabs" role="tablist">


    <li class="nav-item">
        <a class="nav-link {{ $activeWalletTab =="visit"? 'active current-tab':' ' }} "
           href="{{ route('hce.patient.consultation.service_form') }}/{{ $visit->id }}">
            <i class="fa fa-clock"> </i>
            Current Visit
        </a>
    </li>

    @hasanyrole('doctor|lab|receptionist|')
    <li class="nav-item">
        <a class="nav-link {{ $activeWalletTab =="personal"? 'active current-tab':' ' }}"
           href="{{ route('expert.user.details.personal') }}/{{ $visit->id }}">
            <i class="fa fa-user"> </i>
            Personal Details
        </a>
    </li>
    @endhasanyrole()

    @hasanyrole('doctor')
    <li class="nav-item">
        <a class="nav-link {{ $activeWalletTab =="medical"? 'active current-tab':' ' }}"
           href="{{ route('expert.user.medical.background') }}/{{ $visit->id }}">
            <i class="fa fa-heartbeat"> </i>
            Vitals
        </a>
    </li>
    @endhasanyrole()

    @hasanyrole('doctor')
    <li class="nav-item">
        <a class="nav-link {{ $activeWalletTab =="journal"? 'active current-tab':' ' }} "
           href="{{ route('expert.user.medical.journal') }}/{{ $visit->id }}">
            <i class="fa fa-calendar-day"> </i>
            Medical Journal
        </a>
    </li>
    @endhasanyrole()

</ul>