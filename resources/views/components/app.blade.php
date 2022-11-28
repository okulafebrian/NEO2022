<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSRF TOKEN --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- ICON --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/storage/images/assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/storage/images/assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/storage/images/assets/favicon-16x16.png">
    <link rel="manifest" href="/storage/images/assets/site.webmanifest">

    <title>{{ $title }}</title>

    {{-- SCRIPTS --}}
    <script src="{{ mix('js/app.js') }}"></script>

    {{-- STYLES --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
</head>

<body>
    <div id="app">
        <x-alert />

        @if (isset($navbar))
            <x-navbar />
        @elseif (isset($navbarAdmin))
            <x-navbar-admin />
        @elseif (isset($navbarUser))
            <x-navbar-user />
        @elseif (isset($navbarParticipant))
            <x-navbar-participant />
        @endif


        @if (isset($sidebarAdmin))
            <main class="d-flex pt-5">
                <x-sidebar-admin />
                <div class="page-content">
                    {{ $slot }}
                </div>
            </main>
        @else
            <main>
                {{ $slot }}
            </main>
        @endif
    </div>

    @livewireScripts
</body>

</html>
