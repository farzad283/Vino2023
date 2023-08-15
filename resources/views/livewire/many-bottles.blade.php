
<div class="mb-16">
    <div class="mt-6">
        <div class="max-w-1200px">
            <div class="flex items-center justify-between space-x-2 mb-8 mt-5 ml-5">
                <div class="flex items-center space-x-2">
                    <button wire:click="$emit('Filter', false)" class="bg-white text-black px-3 py-1 rounded border border-red hover:bg-red hover:text-white transition-colors duration-300">
                        SAQ
                    </button>
                    <button wire:click="$emit('Filter', true)" class="bg-white text-black px-3 py-1 rounded border border-red hover:bg-red hover:text-white transition-colors duration-300">
                        Unique
                    </button>
                </div>
                <div>
                    <button class='w-full flex justify-center items-center mr-16' wire:click="$emit('toggleSearch')">
                        <svg class="h-6 w-6 text-red" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Centrer le composant de recherche en mode mobile -->
            <div class="flex items-center justify-center sm:justify-start sm:items-start sm:space-x-2 sm:mb-4 ">
                @if ($showSearch)
                    @livewire('bottle-search')
                @endif
            </div>
            @if ($unlisted)
                <a href="{{ route('add-bottle') }}"  class="bg-gold  text-white px-3 py-1 rounded hover:bg-dark-red  block w-36 mb-8 mx-auto">
                @livewire('button', ['label' => 'Ajouter bouteille'])
                </a>
            @endif
            @foreach($bottles->chunk(2) as $chunk)
            <div class="flex flex-col md:flex-row justify-between">
                @foreach($chunk as $bottle)
                <article class="relative mx-6 my-2 md:w-5/6 lg:w-5/6 flex border-2 border-red bg-white rounded-3xl items-center gap-2 mb-12">
                <a href="{{ route('single-bottle', ['bottle_id' => $bottle->id]) }}" >

                <img src="{{ $bottle->image }}" alt="{{ $bottle->name }}" class="max-w-80 relative bottom-3 -mt-4 transform transition-transform duration-300 hover:scale-125 hover:brightness-80">
                </a>
                 

                    <div class="flex flex-col justify-end items-left p-4 sm:flex-row sm:justify-between sm:gap-4">
                        <h1 class="text-left font-bold font-roboto">{{ $bottle->name }}</h1>
                        <p class="text-xs mt-2 mb-2">{{ $bottle->description }}</p>
                        <h2 class="text-left  font-montserrat">${{ $bottle->price }}</h2>
                    </div>
                     <div class="absolute bottom-3 right-3 flex"> 
                        <a href="{{ route('add-bottles-to-cellar', ['bottle_id' => $bottle->id]) }}" class="rounded-md text-sm font-semibold shadow-sm flex items-center">
                            <svg class="h-6 w-6 text-red mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20"/>
                            </svg>
                        </a>
                        <!-- @dump($wishlistStatus) -->
                        <button wire:click="addToWishlist({{ $bottle->id }})" class="font-bold rounded-md text-sm font-semibold shadow-sm flex items-center">
                            <svg class="{{ $wishlistStatus[$bottle->id] ? 'text-gold' : 'text-red' }} h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="{{ $wishlistStatus[$bottle->id] ? '#9B0739' : 'white' }}" stroke="currentColor">
                                <path d="M14 21.35l-1.45-1.32C7.4 15.36 4 12.28 4 8.5 4 5.42 6.42 3 9.5 3c1.74 0 3.41.81 4.5 2.09C15.09 3.81 16.76 3 18.5 3 21.58 3 24 5.42 24 8.5c0 3.78-3.4 6.86-8.55 11.54L14 21.35z" fill="{{ $wishlistStatus[$bottle->id] ?? false ? '#9B0739' : 'white' }}"/>
                                <path d="M4 6h8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 12h8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 18h8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>                            
                            </svg>
                        </button>
                    </div> 
                </article>
                @endforeach
                </div>
                @endforeach
                
            @if ($bottles->count())
            <div class="col-span-2">
                <div class="flex justify-center flex-col-reverse items-center">
                    <div class="text-sm text-gray-500 mb-2">
                        Affichage de {{ $bottles->firstItem() }} sur {{ $bottles->lastItem() }} of {{ $bottles->total() }} résultats
                    </div>

                    <div class="flex justify-center mb-2">
                        {{ $bottles->links() }}
                    </div>
                </div>
            </div>
            @else
            <p>No bottles found.</p>
            @endif
        </div>
    </div>
</div>




