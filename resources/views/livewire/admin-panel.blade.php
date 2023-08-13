<section x-data="{ open: false }" class="flex flex-col lg:flex-row">
    <!-- Hamburger Menu for Mobile -->
    <button @click="open = !open" class="fixed top-35 right-4 bg-gold mt-1 text-white p-2 rounded-full lg:hidden">
     
        <svg  class="w-6 h-6"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-3 text-red">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
        </svg>
        
    </button>

    <!-- Sidebar Drawer -->
    <div class="fixed top-25 left-0 w-64 h-full bg-slate-300 text-white   
        transform transition-transform ease-in-out duration-300 lg:translate-x-0" :class="{'-translate-x-full lg:translate-x-0': !open, 'translate-x-0': open}">
        <div class="p-4 text-xl font-bold mb-4  text-gold text-center">Panneau d'administration</div>
        <ul class="space-y-2 text-red ">
            <li class="py-2 border-b border-gold">
                <a href="#cellars-statistics" wire:click="$set('page', 'cellars-statistics')" class="block px-4 py-2 rounded hover:bg-zinc-400"><svg class="h-5 w-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 488V171.3c0-26.2 15.9-49.7 40.2-59.4L308.1 4.8c7.6-3.1 16.1-3.1 23.8 0L599.8 111.9c24.3 9.7 40.2 33.3 40.2 59.4V488c0 13.3-10.7 24-24 24H568c-13.3 0-24-10.7-24-24V224c0-17.7-14.3-32-32-32H128c-17.7 0-32 14.3-32 32V488c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24zm488 24l-336 0c-13.3 0-24-10.7-24-24V432H512l0 56c0 13.3-10.7 24-24 24zM128 400V336H512v64H128zm0-96V224H512l0 80H128z"/></svg></a>
            </li>
            <li class="py-2 border-b border-gold">
                <a href="#users-statistics" wire:click="$set('page', 'users-statistics')" class="block px-4 py-2 rounded hover:bg-zinc-400">
                    <svg class="h-5 w-5" fill="currentColor" 
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M528 160V416c0 8.8-7.2 16-16 16H320c0-44.2-35.8-80-80-80H176c-44.2 0-80 35.8-80 80H64c-8.8 0-16-7.2-16-16V160H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM272 256a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zm104-48c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376z"/></svg></a>
            </li>
            <li class="py-2 border-b border-gold">
                <a href="#bottles-statistics" wire:click="$set('page', 'bottles-statistics')" class="block px-4 py-2 rounded hover:bg-zinc-400">
                    <svg class="h-5 w-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M393.4 9.4c12.5-12.5 32.8-12.5 45.3 0l64 64c12.5 12.5 12.5 32.8 0 45.3c-11.8 11.8-30.7 12.5-43.2 1.9l-9.5 9.5-48.8 48.8c-9.2 9.2-11.5 22.9-8.6 35.6c9.4 40.9-1.9 85.6-33.8 117.5L197.3 493.3c-25 25-65.5 25-90.5 0l-88-88c-25-25-25-65.5 0-90.5L180.2 153.3c31.9-31.9 76.6-43.1 117.5-33.8c12.6 2.9 26.4 .5 35.5-8.6l48.8-48.8 9.5-9.5c-10.6-12.6-10-31.4 1.9-43.2zM99.3 347.3l65.4 65.4c6.2 6.2 16.4 6.2 22.6 0l97.4-97.4c6.2-6.2 6.2-16.4 0-22.6l-65.4-65.4c-6.2-6.2-16.4-6.2-22.6 0L99.3 324.7c-6.2 6.2-6.2 16.4 0 22.6z"/></svg></a>
            </li>
            <li class="py-2">
                <a  href="#update" wire:click="$set('page', 'update-saq')" 
                 class="block px-4 py-2 rounded hover:bg-zinc-400">
                <svg class="h-5 w-5 " fill="currentColor" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><path d="M42 20.25H28.43l5.49-5.64c-5.46-5.41-14.3-5.61-19.76-.2-5.46 5.41-5.46 14.17 0 19.58 5.46 5.41 14.3 5.41 19.76 0 2.72-2.7 4.08-5.83 4.07-9.79H42c0 3.96-1.76 9.1-5.28 12.59-7.02 6.95-18.42 6.95-25.44 0s-7.07-18.22-.05-25.17c7.01-6.95 18.29-6.95 25.3 0L42 6v14.25zM25 16v8.5l7 4.16-1.44 2.42L22 26V16h3z"/><path d="M0 0h48v48H0V0z" fill="none"/></svg>
                </a>
            </li>
            <!-- Add more sidebar items as needed -->
        </ul>
        <button @click="open = false" class="absolute top-4 right-4 text-red lg:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <!-- End of Sidebar Drawer -->

    <!-- Main Content Area -->
    <div class="flex-grow p-4 lg:ml-64">
        <!-- part that should be change with routes without refreshing the page -->
        @switch($page)
            @case('users-statistics')
                @livewire('users-statistics')
                @break
            @case('cellars-statistics')
                @livewire('cellars-statistics')
                @break
            @case('bottles-statistics')
                @livewire('bottles-statistics')
                @break

            @case('update-saq')
                @livewire('update-saq')
                @break

            @default
                @livewire('home-admin-panel')
        @endswitch
    </div>
    <!-- End of Main Content Area -->
</section>
