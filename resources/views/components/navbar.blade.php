<nav id="guestNavbar" class="navbar navbar-expand-lg py-3 fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/storage/images/assets/NEO_1.webp" alt="NEO" width="90">
        </a>

        <button class="navbar-toggler border-purple-100" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarText">
            <span class="text-purple-100 fa-lg"><i class="bi bi-list"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#details">Starter Pack</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#competitions">Competitions</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ route('webinars') }}">Webinar</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#timeline">Timeline</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#footer">Contact</a>
                </li>
                <li class="d-md-block d-lg-none nav-item mx-2">
                    <a class="nav-link fw-semibold" href="{{ route('dashboard') }}">Register</a>
                </li>
                <li class="d-md-block d-lg-none nav-item mx-2">
                    <a class="nav-link fw-semibold" href="{{ route('login') }}">Login</a>
                </li>
            </ul>
            <div>
                @if (auth()->user())
                    <a href="{{ route('dashboard') }}"
                        class="btn btn-primary-neon py-2 px-3 me-2 rounded-3 d-none d-xl-inline">
                        Back to dashboard
                    </a>
                @else
                    <a href="{{ route('dashboard') }}"
                        class="btn btn-primary-neon py-2 px-3 me-2 rounded-3 d-none d-xl-inline">Register</a>
                    <a href="{{ route('login') }}"
                        class="btn btn-pink-neon py-2 px-3 rounded-3 d-none d-xl-inline">Login</a>
                @endif

            </div>
        </div>
    </div>
</nav>
