<div class="fixed top-10 left-7 flex justify-center items-center h-screen  lg:right-6 ">

   <div class="bg-dark-red bg-opacity-20 p-6 rounded-lg shadow-md w-80 lg:w-96">

      @if (session()->has('message'))
      <div class="mb-4 text-green-500">{{ session('message') }}</div>
      @endif

      <form wire:submit.prevent="store">
         @csrf

         <div class="mb-4">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity :</label>
            <input type="number" wire:model="quantity" id="quantity" class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
            @error('quantity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
         </div>
         <div class="mb-4">
            <label for="cellar" class="block text-sm font-medium text-gray-700">Select Cellar</label>
            <select wire:model="cellar_id" id="cellar" class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
               @foreach ($cellars as $cellar)

               <option value="{{ $cellar->id }}">{{ $cellar->name }}</option>
               @endforeach
            </select>
         </div>

         <button type="submit" class="w-full px-4 py-2 mt-4 mb-4 font-medium text-white bg-gold rounded-md hover:bg-dark-red focus:outline-none focus:bg-dark-red">
            Mise à jour
         </button>
         <a href="{{ route('singleCellar', ['cellar_id' => $cellar->id]) }}" class="py-2 text-red">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-60 shadow">
               <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
            </svg>

         </a>
      </form>

   </div>

</div>