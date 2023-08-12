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
                <a href="#users-statistics" wire:click="$set('page', 'users-statistics')" class="block px-4 py-2 rounded hover:bg-zinc-400"><svg class="h-5 w-5" fill="currentColor" 
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M528 160V416c0 8.8-7.2 16-16 16H320c0-44.2-35.8-80-80-80H176c-44.2 0-80 35.8-80 80H64c-8.8 0-16-7.2-16-16V160H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM272 256a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zm104-48c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376z"/></svg></a>
            </li>
            <li class="py-2 border-b border-gold">
                <a href="#bottles-statistics" wire:click="$set('page', 'bottles-statistics')" class="block px-4 py-2 rounded hover:bg-zinc-400"><svg class="h-5 w-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M393.4 9.4c12.5-12.5 32.8-12.5 45.3 0l64 64c12.5 12.5 12.5 32.8 0 45.3c-11.8 11.8-30.7 12.5-43.2 1.9l-9.5 9.5-48.8 48.8c-9.2 9.2-11.5 22.9-8.6 35.6c9.4 40.9-1.9 85.6-33.8 117.5L197.3 493.3c-25 25-65.5 25-90.5 0l-88-88c-25-25-25-65.5 0-90.5L180.2 153.3c31.9-31.9 76.6-43.1 117.5-33.8c12.6 2.9 26.4 .5 35.5-8.6l48.8-48.8 9.5-9.5c-10.6-12.6-10-31.4 1.9-43.2zM99.3 347.3l65.4 65.4c6.2 6.2 16.4 6.2 22.6 0l97.4-97.4c6.2-6.2 6.2-16.4 0-22.6l-65.4-65.4c-6.2-6.2-16.4-6.2-22.6 0L99.3 324.7c-6.2 6.2-6.2 16.4 0 22.6z"/></svg></a>
            </li>
            <li class="py-2">
                <a href="{{ route('update') }}"  class="block px-4 py-2 rounded hover:bg-zinc-400"><svg class="h-5 w-5 text-gray-500 " fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z"/></svg></a>
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
            @case('home-admin-panel')
                @livewire('home-admin-panel')
                @break
            @default
                @livewire('home-admin-panel')
        @endswitch
    </div>
    <!-- End of Main Content Area -->
</section>
