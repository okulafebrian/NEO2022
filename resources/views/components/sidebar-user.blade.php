<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body py-4">
        <ul class="list-group">
            <a href="{{ route('dashboard') }}" type="button"
                class="list-group-item list-group-item-action border-0 rounded-3">
                <h6 class="m-0">{{ __('Dashboard') }}</h6>
            </a>
            <a href="{{ route('registrations.index') }}" type="button"
                class="list-group-item list-group-item-action border-0 rounded-3">
                <h6 class="m-0">{{ __('My Registration') }}</h6>
            </a>
            <a href="{{ route('logout') }}" type="button"
                class="list-group-item list-group-item-action border-0 rounded-3"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <h6 class="m-0">{{ __('Logout') }}</h6>
            </a>
        </ul>
    </div>
</div>
