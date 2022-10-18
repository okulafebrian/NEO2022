<nav class="sidebar border-end">
    <div class="sidebar-content py-5 px-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                    class="nav-link fw-semibold {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="bi {{ Request::is('dashboard') ? 'bi-house-door-fill' : 'bi-house-door' }} fa-lg me-2"></i>
                    Home
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('registrations.manage') }}"
                    class="nav-link fw-semibold {{ Request::is('registrations/manage') ? 'active' : '' }}">
                    <i
                        class="bi {{ Request::is('registrations/manage') ? 'bi-clipboard-data-fill' : 'bi-clipboard-data' }} fa-lg me-2"></i>
                    Registrations
                </a>
            </li>

            <li class="nav-item">
                <a type="button" class="nav-link collapsed d-flex justify-content-between fw-semibold" id="headMenu"
                    data-bs-toggle="collapse" data-bs-target="#subMenu" aria-expanded="true">
                    <span class="{{ Request::is('participants') ? 'active' : '' }}">
                        <i class="bi {{ Request::is('participants') ? 'bi-people-fill' : 'bi-people' }} fa-lg pe-2"></i>
                        Participants
                    </span>
                    <i class="bi bi-chevron-up"></i>
                </a>
                <div class="collapse show" id="subMenu">
                    <ul class="nav btn-toggle-nav">
                        <li class="nav-item" style="margin-left: 2.1em">
                            <a href="{{ route('participants.index') }}" class="nav-link">
                                Participant List
                            </a>
                        </li>
                        <li class="nav-item" style="margin-left: 2.1em">
                            <a href="#" class="nav-link">
                                Debate Teams
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="{{ route('competitions.index') }}"
                    class="nav-link fw-semibold {{ Request::is('competitions') ? 'active' : '' }}">
                    <i class="bi {{ Request::is('competitions') ? 'bi-puzzle-fill' : 'bi-puzzle' }} fa-lg me-2"></i>
                    Competitions
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('promotions.index') }}"
                    class="nav-link fw-semibold {{ Request::is('promotions') ? 'active' : '' }}">
                    <i class="bi {{ Request::is('promotions') ? 'bi-tags-fill' : 'bi-tags' }} fa-lg me-2"></i>
                    Early Bird
                </a>
            </li>
        </ul>
    </div>
</nav>
