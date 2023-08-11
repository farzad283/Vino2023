<div>
    <h1 class="text-3xl font-bold mb-4">Test Component</h1>

    <p>{{ $message }}</p>

    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="changeMessage">Change Message</button>
</div>



<div >
    <h2 class="text-2xl text-center mt-4 font-bold mb-4">Celliers</h2>

    @error('cellars')
    <div class="text-red-500">{{ $message }}</div>
    @enderror

    <div class="flex items-center justify-between  mb-8  ml-0">
        <div class="flex items-center space-x-2 ">
            <a href="{{ route('add-cellar') }}" class="bg-gold  text-white px-3 py-1 rounded hover:bg-dark-red  block w-28 ml-6 mx-auto">@livewire('button', ['label' => 'Créer cellier'])
            </a>
        </div>
        <div>
            <button class='w-full flex justify-center items-center mr-14 ' wire:click="$emit('toggleSearch')">
                <svg class="h-6 w-6 text-red" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </button>
        </div>
    </div>
  
    <div>
    @if ($showSearch)
        <livewire:cellar-search wire:loading.attr="disabled" />
        @endif
    </div>



    <div class="max-h-[400px] overflow-y-auto pb-12">
    <div class="flex flex-col gap-4 ">
        @if ($cellars->isEmpty())
        <p class="text-center">Aucune cellier trouvée.</p>
        @else
            @foreach ($cellars as $cellar)
            <div class="border border-red rounded-lg p-2 text-red hover:bg-white hover:text-red shadow mx-auto flex justify-between items-center w-5/6">
                <a href="{{ route('singleCellar', ['cellar_id' => $cellar->id]) }}" class="col">
                    <div class="col">
                        <div class="card-body text-center border-10 border-gray-300 rounded-lg" style="margin-right: 1rem;">
                            <p class="">{{ $cellar->name }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        @endif

        @if ($cellars->isEmpty() && !empty($search))
        <p class="text-center">Aucune cellier trouvée pour le terme de recherche "{{ $search }}".</p>
        @endif
    </div>
</div>





<div class=" p-6 h-screen">
    <div class="w-full max-w-4xl">
    <div class="flex justify-center mb-4">
            <a href="{{ route('bottles') }}" class="bg-gold text-white px-3 py-1 rounded hover:bg-gold transition-all ease-in duration-200 ml-6 mx-auto ">
                @livewire('button', ['label' => 'Ajouter bottles'])
            </a>
        </div>
        <h1 class="text-3xl font-bold mb-4 text-center">{{ $cellar->name }}</h1>
        <!-- <h2 class="text-xl font-semibold mb-2 text-center">Bouteilles:</h2> -->
     
        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">

            @foreach($cellar->bottles as $bottle)
            <li class="bg-white p-4 shadow-md rounded-md flex flex-col justify-around items-center transition-all ease-in duration-200" wire:key="{{ $bottle->id }}">
                <article class="flex flex-col justify-center items-center border-2 border-gold rounded-lg">
                    <img src="{{ $bottle->image }}" alt="{{ $bottle->name }}" class="w-36 h-40">
                    <div class="text-center p-4">
                        <h1 class="text-right font-bold font-roboto">{{ $bottle->name }}</h1>
                        <p class="text-xs mt-2 mb-2">{{ $bottle->description }}</p>
                    </div>
                    <div class="flex flex-col p-3 space-y-2.5 items-center">
                        <p class="text-sm text-gray-500 mb-4">Quantité: {{ $bottle->pivot->quantity }}</p>
                        <div class="flex items-center space-x-2 mb-4">
                        <button wire:click="$emit('incrementListen',{{ $bottle->id}})" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </button>

                        <button wire:click="decrement({{$bottle->id , $cellar->cellar_id}})" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                        </button>
                        </div>

                        <!-- Rest of the code (unchanged) -->

                    </div>
                </article>
            </li>
            @endforeach
        </ul>
    </div>
</div>



