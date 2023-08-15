<div class="relative bottom-14 flex flex-col justify-center items-center h-screen  lg:right-6  gap-8 ">
   <h1 class="text-xl font-bold mb-2">Ajouter une bouteille à la cellier</h1>
   <div class="bg-dark-red bg-opacity-20 p-4 rounded-lg shadow-md w-80 lg:w-96  ">
      @if (session()->has('message'))
      <div class="mb-4 text-green-500">{{ session('message') }}</div>
      @endif
      @if (session()->has('message-error'))
      <div class="mb-4 text-red">{{ session('message-error') }}</div>
      @endif
      <form class="flex flex-col mb-3" wire:submit.prevent="store">
         @csrf

         <div class="mb-4">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantité :</label>
            <input type="number" min="1" wire:model="quantity" id="quantity" class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
            @error('quantity') <span class="text-red text-sm">{{ $message }}</span> @enderror
         </div>
         <div class="mb-4">
            <label for="cellar" class="block text-sm font-medium text-gray-700">Sélectionnez Cellier</label>
            <select wire:model="cellar_id"
             id="cellar" class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
               @foreach ($cellars as $cellar)
               <option value="{{ $cellar->id }}">{{ $cellar->name }}</option>
               @endforeach
            </select>
         </div>

         <button type="submit" class="w-full px-4 py-2 mt-4 font-medium text-white bg-red rounded-md hover:bg-dark-red focus:outline-none focus:bg-red">
         Ajouter
         </button>
      </form>
      <a href="{{ route('cellars') }}" class="py-2">
                         @livewire('button', ['label' => 'Retourner au celliers'])
         </a>
   </div>
</div>