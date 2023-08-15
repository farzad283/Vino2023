<div class="p-6 h-screen">
    <div>
        <div class="flex justify-center mb-4">
            <a href="{{ route('bottles') }}" class="bg-gold text-white px-3 py-1 rounded hover:bg-dark-red transition-all ease-in duration-200 ml-6 mx-auto">
                @livewire('button', ['label' => 'Ajouter bottles'])
            </a>
        </div>
        <h1 class="text-3xl mb-2 font-bold text-center lg:mb-20">{{ $cellar->name }}</h1>

        <ul class=" grid grid-cols-1 gap-4  sm:grid-cols-2 md:grid-cols-3 lg:w-screen   max-h-[800px] overflow-y-auto pb-12  ">

            @foreach($cellar->bottles as $bottle)
            <li class="lg:w-5/6 p-4 shadow-md rounded-md flex flex-col justify-around items-center transition-all ease-in duration-200 " wire:key="{{ $bottle->id }}">
                <article class=" flex flex-col justify-center items-center w-full lg:w-5/6 lg:h-full border-2 border-gold rounded-lg p-4">
                    <img src="{{ $bottle->image }}" alt="{{ $bottle->name }}" class="w-36 h-53 mt-2">
                    <div class="text-center p-4">
                        <h1 class="text-center font-bold font-roboto">{{ $bottle->name }}</h1>
                        <p class="text-xs mt-2 mb-2">{{ $bottle->description }}</p>
                        <h3 class="font-bold font-roboto">${{ $bottle->price }}</h3>
                    </div>

                    <div class="flex flex-col p-1 space-x-4 items-center justify-start ">
                        <div class="flex flex-row items-center justify-center ">
                            <p class="h-6 text-sm text-gray-500  shadow py-0 px-3">QTY: {{ $bottle->pivot->quantity }}</p>
                            <button wire:click="$emit('incrementListen',{{ $bottle->id}})" class="bg-gold text-white px-1 py-0 rounded hover:bg-dark-red">
                                    <div title="Ajouter de la quantité
                                    ">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </div>
                                </button>
                        </div>

                        <div class="flex flex-row item-center justify-center mt-4  ">
                            <div x-data="{ openModal: false }" class="flex items-center space-x-2 mb-4 ">
                                    <button  wire:click="setModal({{ $bottle->id }})" @click="openModal = true" class="  px-1 py-1 rounded  text-red hover:text-dark-red" title="bouteille consumer">
                                        <div title="Consommation">
                                            <svg class="h-7 w-7" fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                                <path d="M155.6 17.3C163 3 179.9-3.6 195 1.9L320 47.5l125-45.6c15.1-5.5 32 1.1 39.4 15.4l78.8 152.9c28.8 55.8 10.3 122.3-38.5 156.6L556.1 413l41-15c16.6-6 35 2.5 41 19.1s-2.5 35-19.1 41l-71.1 25.9L476.8 510c-16.6 6.1-35-2.5-41-19.1s2.5-35 19.1-41l41-15-31.3-86.2c-59.4 5.2-116.2-34-130-95.2L320 188.8l-14.6 64.7c-13.8 61.3-70.6 100.4-130 95.2l-31.3 86.2 41 15c16.6 6 25.2 24.4 19.1 41s-24.4 25.2-41 19.1L92.2 484.1 21.1 458.2c-16.6-6.1-25.2-24.4-19.1-41s24.4-25.2 41-19.1l41 15 31.3-86.2C66.5 292.5 48.1 226 76.9 170.2L155.6 17.3zm44 54.4l-27.2 52.8L261.6 157l13.1-57.9L199.6 71.7zm240.9 0L365.4 99.1 378.5 157l89.2-32.5L440.5 71.7z"/>
                                            </svg>
                                        </div>
                                    </button>
                                    @if($bottle->id== $modalId)
                                    <!-- Modal code -->
                                    <div x-show="openModal" class="fixed inset-0 left-[-0.5em] flex items-center justify-center z-50 bg-black bg-opacity-40">
                                        <div class="bg-gray p-3 w-3/4 rounded-md shadow-md relative lg:w-96">
                                            <button @click="openModal = false" class="bg-red text-white px-2 py-1 rounded-md absolute top-2 right-2">X</button>
                                            <h3 class="text-l font-bold mb-4">Bouteilles consommées</h3>
                                            <form wire:submit.prevent="decrement({{$bottle->id}},  {{$bottle->pivot->quantity}})">
                                                @csrf
                                                <input type="number" min="0" wire:model="qty" id="qty" class="w-full p-2 rounded-md mb-2 " placeholder="quantité..." require>
                                                @error('qty') <span class="text-red text-sm">{{ $message }}</span> @enderror
                                                @if (session()->has('message'))
                                                <div class="mb-4 text-green-500">{{ session('message') }}</div>
                                                @endif
                                                Entrez votre note
                                                <textarea wire:model="note" id="note" class="w-full p-2 rounded-md mb-4" placeholder="votre note..."></textarea>
                            
                                                <div class="text-center">
                                                    <button type="submit" class="bg-gold text-white  px-3 py-2 rounded-md">Soumettre</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    @endif
                            </div>
                            <div class="h-3">
                                <button wire:click="deleteBottle({{ $bottle->id }})" class=" px-3 py-0 rounded  ">
                                    <div title="Supprimer">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-7 w-7 text-red">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </div>
                                </button>
                            </div>
                            <a title="Remplacer les bouteilles entre Cellieres" href="{{ route('update_bottle', ['cellar_id' => $cellar->id,'bottle_id' => $bottle->id]) }}" class= " h-7 w-7 text-red ">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                </article>
            </li>
            @endforeach
        </ul>
    </div>
</div>