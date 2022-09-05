<nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container ">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="/storage/images/assets/Logo_BNEC.png" alt="BNEC" width="85">
        </a>
        <div class="dropdown">
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown" data-bs-display="static"
                aria-expanded="false">
                <i class="bi bi-list"></i>
                <i class="bi bi-person-circle"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a href="{{ route('registrations.index') }}" class="dropdown-item" type="button">My
                        Registration</a>
                </li>
                <li><a href="" class="dropdown-item" type="button">Profile</a></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
