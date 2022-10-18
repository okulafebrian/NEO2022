<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
    <div class="container-fluid px-5">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="/storage/images/assets/logo_neo.png" alt="NEO" width="90">
        </a>

        <div class="d-flex align-items-center">
            <i class="bi bi-bell fa-lg"></i>
            <div class="mx-4 border-end" style="height: 1.5rem"></div>
            <div class="dropdown">
                <button class="btn btn-light rounded-pill" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-person-circle fa-lg me-2"></i>
                    {{ auth()->user()->name }}
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('logout') }}" type="button" class="dropdown-item"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <h6 class="m-0">{{ __('Logout') }}</h6>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
