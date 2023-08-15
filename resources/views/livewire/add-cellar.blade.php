<div class="flex justify-center items-center mt-16 lg:right-6 flex flex-col  ">
<h1 class="text-xl font-bold mb-6">Ajouter cellier</h1>
<div class="bg-dark-red bg-opacity-20 p-4 rounded-lg shadow-md w-80 lg:w-96  ">
   
        @if (session()->has('message'))
            <div class="mb-4 text-green-500">{{ session('message') }}</div>
        @endif

        <form class="mb-4" wire:submit.prevent="store">
            @csrf

            <div class="mb-4">
                <label for="nom" class="block text-sm font-medium text-gray-700" ></label>
                <input type="text" wire:model="nom" id="nom" aria-placeholder="Nom du cellier" placeholder="Nom du cellier" class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                @error('nom') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full px-4 py-2 mt-4 font-medium text-white bg-red rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                Ajouter
            </button>
        </form>
        <a href="{{ route('cellars') }}" class="text-sm mt-6 underline">Retourner dans mes celliers</a>
    </div>
</div>


