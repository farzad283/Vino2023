<div class="p-6 h-screen">
    <div class="w-full max-w-4xl mx-auto">
        <div class="flex justify-center mb-4">
            <a href="{{ route('bottles') }}" class="bg-gold text-white px-3 py-1 rounded hover:bg-dark-red transition-all ease-in duration-200 ml-6 mx-auto">
                @livewire('button', ['label' => 'Ajouter bottles'])
            </a>
        </div>
        <h1 class="text-3xl font-bold mb-4 text-center">{{ $cellar->name }}</h1>

        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 max-h-[400px] overflow-y-auto pb-12">
            @foreach($cellar->bottles as $bottle)
            <li class="bg-white p-4 shadow-md rounded-md flex flex-col justify-around items-center transition-all ease-in duration-200" wire:key="{{ $bottle->id }}">
                <article class="flex flex-col justify-center items-center border-2 border-gold rounded-lg p-4">
                    <img src="{{ $bottle->image }}" alt="{{ $bottle->name }}" class="w-36 h-53 mt-2">
                    <div class="text-center p-4">
                        <h1 class="text-right font-bold font-roboto">{{ $bottle->name }}</h1>
                        <p class="text-xs mt-2 mb-2">{{ $bottle->description }}</p>
                        <h3 class="font-bold font-roboto">${{ $bottle->price }}</h3>
                    </div>

                    <div class="flex p-3 space-x-4 items-center justify-start shadow">
                        <div class="flex flex-col items-center justify-center">
                            <p class="text-sm text-gray-500 mb-2 shadow py-1 px-3">QTY: {{ $bottle->pivot->quantity }}</p>
                            <div x-data="{ openModal: false }" class="flex items-center space-x-2 mb-4">
                                <button wire:click="$emit('incrementListen',{{ $bottle->id}})" class="bg-gold text-white px-1 py-0 rounded hover:bg-dark-red">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </button>
                                <button @click="openModal = true" class="bg-gold text-white px-1 py-0 rounded hover:bg-dark-red" title="bouteille consumer">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                    </svg>
                                </button>

                                <!-- Modal code -->
                                <div x-show="openModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                                    <div class="bg-white p-6 rounded-md shadow-md relative">
                                        <button @click="openModal = false" class="bg-red text-white px-2 py-1 rounded-md absolute top-2 right-2">X</button>
                                        <h3 class="text-xl font-bold mb-4">Entrez votre note</h3>
                                        <form wire:submit.prevent="decrement({{$bottle->id}},  {{$bottle->pivot->quantity}})">
                                            @csrf
                                            <input type="number" min="0" wire:model="qty" id="qty" class="w-full p-2 rounded-md mb-4" placeholder="quantité..." require>
                                            @error('qty') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                            @if (session()->has('message'))
                                            <div class="mb-4 text-green-500">{{ session('message') }}</div>
                                            @endif
                                            
                                            <textarea wire:model="note" id="note" class="w-full p-2 rounded-md mb-4" placeholder="votre note..."></textarea>

                                            <button type="submit" class="bg-gold text-white  px-4 py-2 rounded-md">Envoyer</button>
                                            <!-- @click="openModal = false" -->

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <button wire:click="deleteBottle({{ $bottle->id }})" class=" px-3 py-1 rounded ">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 text-red">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>

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