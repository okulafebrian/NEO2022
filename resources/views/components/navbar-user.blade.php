<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container-lg px-md-5 px-4">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="/storage/images/assets/Logo_BNEC.png" alt="BNEC" width="85">
        </a>
        <div class="dropdown">
            <a href="{{ route('registrations.index') }}" type="button" class="btn btn-custom px-2">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-bars mx-2"></i>
                    <i class="fa-solid fa-circle-user fa-2x"></i>
                </div>
            </a>
        </div>

        <div class="dropdown d-none">
            <button type="button" class="btn btn-custom px-2" data-bs-toggle="dropdown" data-bs-display="static"
                aria-expanded="false">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-bars mx-2"></i>
                    <i class="fa-solid fa-circle-user fa-2x"></i>
                </div>
            </button>
            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm p-1">
                <li><a href="{{ route('registrations.index') }}" class="dropdown-item rounded-2 py-2" type="button">My
                        Registration</a>
                </li>
                <li><a href="" class="dropdown-item rounded-2 py-2" type="button">Profile</a></li>
                <li>
                    <a class="dropdown-item rounded-2 py-2" href="{{ route('logout') }}"
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
