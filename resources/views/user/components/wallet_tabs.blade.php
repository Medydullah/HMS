
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link {{ $activeWalletTab =="visit"? 'active':' ' }} "
           href="{{ route('user.visit.current') }}">
            <i class="fa fa-user-md"> </i>
            Current Visit
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ $activeWalletTab =="basic"? 'active':' ' }} "
           href="{{ route('user.info.basic') }}">
            <i class="fa fa-user"> </i>
            Basic Information
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link"  href="{{ route('user.background') }}">
            <i class="fa fa-heartbeat"> </i>
            Medical Background
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $activeWalletTab =="journal"? 'active':' ' }} "
           href="{{ route('user.journal') }}">
            <i class="fa fa-calendar-day"> </i>
            Medical Journal
        </a>
    </li>
</ul>