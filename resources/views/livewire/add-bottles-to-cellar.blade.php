<div class="fixed top-10 left-7 flex justify-center items-center h-screen lg:right-6">
    <div class="bg-dark-red bg-opacity-20 p-4 rounded-lg shadow-lg w-80 lg:w-96">
        @if (session()->has('message-error'))
            <div class="bg-gold text-red-500 rounded-md mb-4 text-center">{{ session('message-error') }}</div>
        @endif
        <form wire:submit.prevent="store" class="flex flex-col mb-3">
            @csrf
            <label for="quantity" class="mb-1 text-red-500">Quantité :</label>
          
            <input type="number" min="1" wire:model="quantity" id="quantity" class="p-2 mb-2 w-full rounded-md border border-red-500 text-red-500 focus:outline-none focus:ring focus:ring-blue-500">
            @error('quantity') <span class="text-red">{{ $message }}</span> @enderror


            <label for="cellar" class="mb-1 text-red-500">Sélectionnez Cellier</label>
            <select wire:model="cellar_id" id="cellar" class="p-2 mb-6 w-full rounded-md border border-red-500 text-red-500 focus:outline-none focus:ring focus:ring-blue-500">
                @foreach ($cellars as $cellar)
                    <option value="{{ $cellar->id }}">{{ $cellar->name }}</option>
                @endforeach
            </select>

            <button type="submit" class="p-3 bg-red text-white font-bold rounded-md w-full cursor-pointer hover:bg-red-600 focus:outline-none focus:bg-red-600">
            Soumettre
            </button>
        </form>
        <a href="{{ route('cellars') }}" class="py-2">
            @livewire('button', ['label' => 'Retourner aux celliers'])
        </a>
    </div>
</div>
