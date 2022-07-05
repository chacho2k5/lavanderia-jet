<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title>O3 Lavanderia</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        @isset($css)
            {{ $css }}
        @endisset

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-light">
        {{-- No se para que es este componente, pero se produce un flasheo cada vez que se ejecuta una opcion del nav --}}
        {{-- <x-jet-banner /> --}}
         @livewire('navigation-menu')

        <!-- Page Heading -->
        @isset($header)
            <header class="py-3 bg-white shadow-sm d-flex border-bottom">
                <div class="container">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        {{-- <main class="container my-5"> --}}
        <main class="container my-2">
            {{ $slot }}
        </main>

        @stack('modals')
        @livewireScripts
        @stack('scripts')

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>

        @isset($js)
            {{ $js }}
        @endisset
    </body>
</html>
