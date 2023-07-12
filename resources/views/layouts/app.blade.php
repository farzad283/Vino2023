<!DOCTYPE html>



<html lang="fr">

<head>


<!-- version de Maryline 11 juillet 14h55 FONCTIONNE BIEN-->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Titre</title>
    
    <!-- Metadonnées -->
    <meta name="description" content="Description de votre site">
    <meta name="keywords" content="Vos, Mots, Clés">
    <meta name="author" content="Votre nom">
    
    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="bg-gray-200 ">
    <!-- Header -->
    <header class="flex bg-red justify-between item-center">
    @livewire('header')
    </header>

    <!-- Espace pour les composantes dynamiques -->
    <main class="px-2">
        <section>
            <!-- section pour les FILTRES pas encore développé -->
         
        </section>

        <!-- section dynamique -->
        <section>

        @yield('content')


        </section>
    </main>

    <!-- Footer -->
    <footer class="">
    
        @livewire('footer')

    </footer>
    
    <!-- Livewire Scripts -->



    @livewireScripts
</body>
</html>
