<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('participant.dashboard') }}">
            <img src="/storage/images/assets/NEO_1.webp" alt="NEO" width="90">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto d-xl-none">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" type="button" class="nav-link"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <ul class="navbar-nav ms-auto d-none d-xl-block">
            <li class="nav-item dropdown">
                <a class="nav-link text-primary d-flex align-items-center me-3" role="button"
                    data-bs-toggle="dropdown">
                    <span class="fa-stack me-1">
                        <i class="bi bi-circle-fill fa-stack-2x"></i>
                        <i class="bi bi-person-fill fa-stack-1x fa-inverse"></i>
                    </span>
                    {{ explode(' ', trim(Auth::guard('participant')->user()->name))[0] }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end p-1 border-0 shadow-sm rounded-3">
                    <li>
                        <a class="dropdown-item p-2 rounded-3" href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" type="button" class="dropdown-item p-2 rounded-3"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
