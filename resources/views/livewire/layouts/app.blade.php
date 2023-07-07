<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سایت شما</title>

    <!-- اضافه کردن فایل‌های CSS  -->
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <!-- عناصر سربرگ شما -->
    </header>

    <nav>
        <!-- منوی ناوبری شما -->
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- عناصر پاورقی شما -->
    </footer>

    <!-- اضافه کردن فایل‌های JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
</body>
</html>
