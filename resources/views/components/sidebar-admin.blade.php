<nav class="sidebar shadow-sm">
    <div class="sidebar-content">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                    class="nav-link fw-medium {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="bi {{ Request::is('dashboard') ? 'bi-grid-1x2-fill' : 'bi-grid-1x2' }} fa-lg me-1">
                    </i>
                    Dashboard
                </a>
            </li>

            @if (auth()->user()->email == 'neo.it' || auth()->user()->email == 'neo.sc')
                <li class="nav-item">
                    <a href="{{ route('registrations.manage') }}"
                        class="nav-link fw-medium {{ Request::is('registrations/manage') ? 'active' : '' }}">
                        <i
                            class="bi {{ Request::is('registrations/manage') ? 'bi-clipboard-data-fill' : 'bi-clipboard-data' }} fa-lg me-1">
                        </i>
                        Registrations
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a href="{{ route('participants.index') }}"
                    class="nav-link fw-medium {{ Request::is('participants') ? 'active' : '' }}">
                    <i class="bi {{ Request::is('participants') ? 'bi-people-fill' : 'bi-people' }} fa-lg me-1">
                    </i>
                    Participants
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('companions.index') }}"
                    class="nav-link fw-medium {{ Request::is('companions') ? 'active' : '' }}">
                    <i
                        class="bi {{ Request::is('companions') ? 'bi-person-badge-fill' : 'bi-person-badge' }} fa-lg me-1">
                    </i>
                    Companions
                </a>
            </li>

            @if (auth()->user()->email == 'neo.it' || auth()->user()->email == 'neo.sc')
                <li class="nav-item">
                    <a href="{{ route('request-invitations.index') }}"
                        class="nav-link fw-medium {{ Request::is('request-invitations') ? 'active' : '' }}">
                        <i
                            class="bi {{ Request::is('request-invitations') ? 'bi-envelope-paper-fill' : 'bi-envelope-paper' }} fa-lg me-1">
                        </i>
                        Request Invitations
                    </a>
                </li>
            @endif

            <hr class="my-2">

            <li class="nav-item">
                <a
                    class="nav-link fw-medium {{ Request::is('qualifications') || Request::is('attendances') || Request::is('submissions') ? 'active' : '' }}">
                    <i
                        class="bi {{ Request::is('qualifications') || Request::is('attendances') || Request::is('submissions') ? 'bi-dice-3-fill' : 'bi-dice-3' }} fa-lg me-1">
                    </i>
                    Rounds
                </a>
                <ul class="nav flex-column" style="margin-left: 1.6rem">
                    <li class="nav-item">
                        <a href="{{ route('qualifications.index') }}"
                            class="nav-link {{ Request::is('qualifications') ? 'active' : '' }}">
                            Qualifications
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('attendances.index') }}"
                            class="nav-link {{ Request::is('attendances') ? 'active' : '' }}">
                            Attendances
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('submissions.index') }}"
                            class="nav-link {{ Request::is('submissions') ? 'active' : '' }}">
                            Submissions
                        </a>
                    </li>
                </ul>
            </li>

            @if (auth()->user()->email == 'neo.it' || auth()->user()->email == 'neo.sc')
                <hr class="my-2">

                <li class="nav-item">
                    <a href="{{ route('competitions.index') }}"
                        class="nav-link fw-medium {{ Request::is('competitions') ? 'active' : '' }}">
                        <i
                            class="bi {{ Request::is('competitions') ? 'bi-puzzle-fill' : 'bi-puzzle' }} fa-lg me-1"></i>
                        Competitions
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('faqs.manage') }}"
                        class="nav-link fw-medium {{ Request::is('faqs/manage') ? 'active' : '' }}">
                        <i
                            class="bi {{ Request::is('faqs/manage') ? 'bi-patch-question-fill' : 'bi-patch-question' }} fa-lg me-1"></i>
                        FAQ
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('testimonies.index') }}"
                        class="nav-link fw-medium {{ Request::is('testimonies') ? 'active' : '' }}">
                        <i
                            class="bi {{ Request::is('testimonies') ? 'bi-chat-left-quote-fill' : 'bi-chat-left-quote' }} fa-lg me-1"></i>
                        Testimonies
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('supports.index') }}"
                        class="nav-link fw-medium {{ Request::is('supports') ? 'active' : '' }}">
                        <i class="{{ Request::is('supports') ? 'fa-solid' : 'fa-regular' }} fa-handshake me-1"></i>
                        Supports
                    </a>
                </li>
            @endif


            @if (auth()->user()->email == 'neo.it')
                <hr class="my-2">

                <li class="nav-item">
                    <a
                        class="nav-link fw-medium {{ Request::is('environments') || Request::is('access-controls') ? 'active' : '' }}">
                        <i
                            class="bi {{ Request::is('environments') || Request::is('access-controls') ? 'bi-gear-fill' : 'bi-gear' }} fa-lg me-1">
                        </i>
                        Web Config
                    </a>
                    <ul class="nav flex-column" style="margin-left: 1.6rem">
                        <li class="nav-item">
                            <a href="{{ route('environments.index') }}"
                                class="nav-link {{ Request::is('environments') ? 'active' : '' }}">
                                Environments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('access-controls.index') }}"
                                class="nav-link {{ Request::is('access-controls') ? 'active' : '' }}">
                                Access Control
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</nav>
