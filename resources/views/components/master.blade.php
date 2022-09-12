<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="{{ mix('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <div id="app">
<<<<<<< HEAD
        {{-- <x-alert></x-alert> --}}
=======
        {{-- <x-alert></x-alert> --}}
>>>>>>> 96f1ae12ed2d33104147524e878f6f1613558f21

        @if (isset($navbarGuest))
            <x-navbar-guest></x-navbar-guest>
        @endif
        @if (isset($navbarUser))
            <x-navbar-user></x-navbar-user>
        @endif
        @if (isset($navbarAdmin))
            <x-sidebar-admin></x-sidebar-admin>
        @endif

        <main>
            @if (isset($adminSidebar))
                <x-admin-sidebar></x-admin-sidebar>
            @endif
            {{ $slot }}
        </main>
    </div>
</body>

</html>
