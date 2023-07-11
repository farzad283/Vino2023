<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App Title</title>


    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header>

    </header>

    <nav>

    </nav>

    <main>
        @yield('content')
    </main>

    @livewire('footer')


    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
</body>

</html>