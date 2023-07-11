<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel Livewire App</title>
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    @livewire('header') 
    @livewire('many-bottles') 
    @livewireScripts
    @livewire('header') 
</body>
</html>
