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
                @if (Request::is('/'))
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#details">Starter Pack</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#competitions">Competitions</a>
                    </li>
                @endif
                @if (Request::is('webinars') || Request::is('faqs'))
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                @endif
                @if (Request::is('/') || Request::is('webinars') || Request::is('faqs'))
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('webinars') }}">Webinars</a>
                    </li>
                @endif
                @if (Request::is('webinars') || Request::is('faqs'))
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('faqs.index') }}">FAQ</a>
                    </li>
                @endif
                @if (Request::is('/'))
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#timeline">Timeline</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#footer">Contact</a>
                    </li>
                @endif
                <li class="d-md-block d-lg-none nav-item mx-2">
                    <a class="nav-link fw-semibold" href="{{ route('register') }}">Sign Up</a>
                </li>
                <li class="d-md-block d-lg-none nav-item mx-2">
                    <a class="nav-link fw-semibold" href="{{ route('login') }}">Login</a>
                </li>
            </ul>
            <div>
                @if (auth()->user() || Auth::guard('participant')->check())
                    <a href="{{ auth()->user() ? route('dashboard') : route('participant.dashboard') }}"
                        class="btn btn-primary-neon py-2 px-3 me-2 rounded-3 d-none d-xl-inline">
                        Back to dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}"
                        class="btn btn-primary-neon py-2 px-3 me-2 rounded-3 d-none d-xl-inline">Sign Up</a>
                    <a href="{{ route('login') }}"
                        class="btn btn-pink-neon py-2 px-3 rounded-3 d-none d-xl-inline">Login</a>
                @endif
            </div>
        </div>
    </div>
</nav>
