<div class=" p-6 h-screen">
    <div class="w-full max-w-4xl">
        <div class="flex justify-center mb-4">
            <a href="{{ route('bottles') }}" class="bg-gold text-white px-3 py-1 rounded hover:bg-gold transition-all ease-in duration-200 ml-6 mx-auto ">
                @livewire('button', ['label' => 'Ajouter bottles'])
            </a>
        </div>
        <h1 class="text-3xl font-bold mb-4 text-center">{{ $cellar->name }}</h1>
        <!-- <h2 class="text-xl font-semibold mb-2 text-center">Bouteilles:</h2> -->

        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 max-h-screen overflow-y-auto pb-12">

            @foreach($cellar->bottles as $bottle)
            <li class="bg-white p-4 shadow-md rounded-md flex flex-col justify-around items-center transition-all ease-in duration-200" wire:key="{{ $bottle->id }}">
                <article class="flex flex-col justify-center items-center border-2 border-gold rounded-lg">
                    <img src="{{ $bottle->image }}" alt="{{ $bottle->name }}" class="w-36 h-53 mt-2">
                    <div class="text-center p-4">
                        <h1 class="text-right font-bold font-roboto">{{ $bottle->name }}</h1>
                        <p class="text-xs mt-2 mb-2">{{ $bottle->description }}</p>
                        <h3 class=" font-bold font-roboto">${{ $bottle->price }}</h3>
                    </div>

                    <div class="flex  p-3 space-x-4 items-center justify-start shadow">
                        <div class="flex flex-col items-center justify-center  ">
                            <p class="text-sm  text-gray-500 mb-2  shadow py-1 px-1 ">QTY: {{ $bottle->pivot->quantity }}</p>
                            <div class="flex items-center space-x-2 mb-4">
                                <button wire:click="$emit('incrementListen',{{ $bottle->id}})" class="bg-gold text-white px-1 py-0 rounded hover:bg-dark-red">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </button>
                                <button wire:click="decrement({{$bottle->id , $cellar->cellar_id}})" class="bg-gold text-white px-1 py-0 rounded hover:bg-dark-red">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div x-data="{ open: false }" class="relative">
                            <div class="inline-flex items-center overflow-hidden rounded-md border bg-white">
                                <a href="#" class="border-e px-4 py-2 text-sm/none text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                                    Supprimer
                                </a>
                                <button @click="open = !open" class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                                    <span class="sr-only">Menu</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                            <div x-show="open" @click.away="open = false" class="absolute end-0 z-10 mt-2 w-56 rounded-md border border-gray-100 bg-white shadow-lg" role="menu">
                                <div class="p-2">
                                    <button wire:click="deleteBottle({{ $bottle->id }})" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                        Supprimer Bottle
                                    </button>
                                    <a href="{{ route('bouteille-consumee', ['cellar_id' => $cellar->id,'bottle_id' => $bottle->id]) }}" class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700" role="menuitem">
                                        Bouteille consumee
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('update_bottle', ['cellar_id' => $cellar->id,'bottle_id' => $bottle->id]) }}" class="h-8 w-8 text-dark-red shadow">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                    </div>
                </article>
            </li>
            @endforeach
        </ul>
    </div>
</div>