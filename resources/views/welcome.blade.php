<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel Livewire App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="container mx-auto bg-white p-8 rounded shadow-lg text-center">
        <div>
            <h1 class="text-3xl font-bold mb-4">My Laravel Livewire App</h1>
            
            <div class="bg-gray-300 p-4 rounded">
                <p class="text-purple-700">Welcome to my Livewire app! This is a simple example component.</p>
            </div>
            
            @livewire('test')
        </div>
    </div>

    @livewireScripts
</body>
</html>
