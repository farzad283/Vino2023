<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel Livewire App</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="container mx-auto bg-white p-8 rounded shadow-lg text-center">
        <img class='object-contain h-24' src="/icons/VinoRedLight.svg" alt="Vino Logo">
        <div>
            <h1 class="text-3xl font-bold mb-4">Mon application de gestion de celliers</h1>

            @livewire('test')
        </div>
    </div>

    @livewireScripts
</body>

</html>