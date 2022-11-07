<nav class="sidebar shadow-sm overflow-auto">
    <div class="sidebar-content">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                    class="nav-link fw-medium {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="bi {{ Request::is('dashboard') ? 'bi-grid-1x2-fill' : 'bi-grid-1x2' }} fa-lg me-2"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed fw-medium toggleChevron {{ Request::is('registrations/manage') || Request::is('re-registrations') ? 'active' : '' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#subMenuRegistration">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i
                                class="bi {{ Request::is('registrations/manage') || Request::is('re-registrations') ? 'bi-clipboard-data-fill' : 'bi-clipboard-data' }} fa-lg pe-2">
                            </i>
                            Registrations
                        </span>
                        <i class="fa-solid fa-chevron-up"></i>
                    </div>
                </a>

                <div class="collapse show" id="subMenuRegistration">
                    <ul class="nav btn-toggle-nav">
                        <li class="nav-item" style="margin-left: 2.1em">
                            <a href="{{ route('registrations.manage') }}"
                                class="nav-link {{ Request::is('registrations/manage') ? 'active' : '' }}">
                                Registration List
                            </a>
                        </li>
                        <li class="nav-item" style="margin-left: 2.1em">
                            <a href="{{ route('re-registrations.index') }}"
                                class="nav-link {{ Request::is('re-registrations') ? 'active' : '' }}">
                                Re-registration List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed fw-medium toggleChevron {{ Request::is('participants') || Request::is('debate-teams') ? 'active' : '' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#subMenuParticipant">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i
                                class="bi {{ Request::is('participants') || Request::is('debate-teams') ? 'bi-people-fill' : 'bi-people' }} fa-lg pe-2">
                            </i>
                            Participants
                        </span>
                        <i class="fa-solid fa-chevron-up"></i>
                    </div>
                </a>

                <div class="collapse show" id="subMenuParticipant">
                    <ul class="nav btn-toggle-nav">
                        <li class="nav-item" style="margin-left: 2.1em">
                            <a href="{{ route('participants.index') }}"
                                class="nav-link {{ Request::is('participants') ? 'active' : '' }}">
                                Participant List
                            </a>
                        </li>
                        <li class="nav-item" style="margin-left: 2.1em">
                            <a href="{{ route('debate-teams.index') }}"
                                class="nav-link {{ Request::is('debate-teams') ? 'active' : '' }}">
                                Debate Teams
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="{{ route('qualifications.index') }}"
                    class="nav-link fw-medium {{ Request::is('qualifications') ? 'active' : '' }}">
                    <i class="bi {{ Request::is('qualifications') ? 'bi-award-fill' : 'bi-award' }} fa-lg me-2"></i>
                    Qualifications
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('attendances.index') }}"
                    class="nav-link fw-medium {{ Request::is('attendances') ? 'active' : '' }}">
                    <i
                        class="bi {{ Request::is('attendances') ? 'bi-calendar2-check-fill' : 'bi-calendar2-check' }} fa-lg me-2"></i>
                    Attendances
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('submissions.index') }}"
                    class="nav-link fw-medium {{ Request::is('submissions') ? 'active' : '' }}">
                    <i class="bi {{ Request::is('submissions') ? 'bi-inboxes-fill' : 'bi-inboxes' }} fa-lg me-2"></i>
                    Submissions
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('competitions.index') }}"
                    class="nav-link fw-medium {{ Request::is('competitions') ? 'active' : '' }}">
                    <i class="bi {{ Request::is('competitions') ? 'bi-puzzle-fill' : 'bi-puzzle' }} fa-lg me-2"></i>
                    Competitions
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed fw-medium toggleChevron {{ Request::is('environments') || Request::is('access-control') ? 'active' : '' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#subMenuConfig">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i
                                class="bi {{ Request::is('environments') || Request::is('access-control') ? 'bi-gear-fill' : 'bi-gear' }} fa-lg pe-2">
                            </i>
                            Web Config
                        </span>
                        <i class="fa-solid fa-chevron-up"></i>
                    </div>
                </a>

                <div class="collapse show" id="subMenuConfig">
                    <ul class="nav btn-toggle-nav">
                        <li class="nav-item" style="margin-left: 2.1em">
                            <a href="{{ route('environments.index') }}"
                                class="nav-link {{ Request::is('environments') ? 'active' : '' }}">
                                Environments
                            </a>
                        </li>
                        <li class="nav-item" style="margin-left: 2.1em">
                            <a href="{{ route('access-controls.index') }}"
                                class="nav-link {{ Request::is('access-controls') ? 'active' : '' }}">
                                Access Control
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
