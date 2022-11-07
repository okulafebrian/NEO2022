<nav class="navbar navbar-expand-md bg-white shadow-sm fixed-top">
    <div class="container-fluid px-5">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="/storage/images/assets/NEO_1.webp" alt="NEO" width="90">
        </a>

        <div class="dropdown">
            <a class="text-decoration-none btn-dropdown" role="button" data-bs-toggle="dropdown">
                <span class="fa-stack fa-sm">
                    <i class="bi bi-circle-fill fa-stack-2x"></i>
                    <i class="bi bi-person-fill fa-stack-1x fa-inverse"></i>
                </span>
                <span class="fw-medium">
                    {{ auth()->user()->name }}
                </span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end p-1 border-0 shadow-sm rounded-3" style="font-size: 14px">
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
        </div>

    </div>
</nav>
