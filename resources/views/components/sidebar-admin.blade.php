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

            <li class="nav-item">
                <a href="{{ route('registrations.manage') }}"
                    class="nav-link fw-medium {{ Request::is('registrations/manage') ? 'active' : '' }}">
                    <i
                        class="bi {{ Request::is('registrations/manage') ? 'bi-clipboard-data-fill' : 'bi-clipboard-data' }} fa-lg me-1">
                    </i>
                    Registrations
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('participants.index') }}"
                    class="nav-link fw-medium {{ Request::is('participants') ? 'active' : '' }}">
                    <i class="bi {{ Request::is('participants') ? 'bi-people-fill' : 'bi-people' }} fa-lg me-1">
                    </i>
                    Participants
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('competitions.index') }}"
                    class="nav-link fw-medium {{ Request::is('competitions') ? 'active' : '' }}">
                    <i class="bi {{ Request::is('competitions') ? 'bi-puzzle-fill' : 'bi-puzzle' }} fa-lg me-1"></i>
                    Competitions
                </a>
            </li>

            <hr class="my-2">

            <li class="nav-item">
                <a
                    class="nav-link fw-medium {{ Request::is('qualifications') || Request::is('re-registrations') || Request::is('attendances') || Request::is('submissions') ? 'active' : '' }}">
                    <i
                        class="bi {{ Request::is('qualifications') || Request::is('re-registrations') || Request::is('attendances') || Request::is('submissions') ? 'bi-dice-3-fill' : 'bi-dice-3' }} fa-lg me-1">
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
                        <a href="{{ route('re-registrations.index') }}"
                            class="nav-link {{ Request::is('re-registrations') ? 'active' : '' }}">
                            Re-Registrations
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

            <hr class="my-2">

            <li class="nav-item">
                <a
                    class="nav-link fw-medium {{ Request::is('environments') || Request::is('access-control') ? 'active' : '' }}">
                    <i
                        class="bi {{ Request::is('environments') || Request::is('access-control') ? 'bi-gear-fill' : 'bi-gear' }} fa-lg me-1">
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
        </ul>
    </div>
</nav>
