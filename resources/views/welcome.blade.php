<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel Livewire App</title>
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
   
    @livewire('button', ['lable' => "click on me"])

    <!-- for testing -->
    @livewire('footer')


    @livewireScripts
</body>
</html>
