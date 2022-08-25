<nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container ">
        <a class="navbar-brand" href="#">
            <img src="/storage/images/assets/logo_BNEC.png" alt="" width="90">
        </a>
        <div class="dropdown">
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="dropdown" data-bs-display="static"
                aria-expanded="false">
                <i class="bi bi-list"></i>
                <i class="bi bi-person-circle"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-lg-end">
                <li><button class="dropdown-item" type="button">My Registration</button></li>
                <li><button class="dropdown-item" type="button">Profile</button></li>
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
