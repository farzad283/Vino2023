<div class=" flex justify-center items-center lg:right-6 flex flex-col mt-8 mb-20">
    <h1 class="text-xl font-bold mb-4">Ajouter une boteille unique</h1>
    <div class="bg-dark-red bg-opacity-20 p-4 rounded-lg shadow-lg w-80 lg:w-96 mb-8" >
        @if (session()->has('message'))
        <div class="mb-4 text-green-500">{{ session('message') }}</div>
        @endif
        <form wire:submit.prevent class='flex flex-col mb-3 lg:pl-4'>
            @csrf

                <div class="pb-2 max-h-[900px] overflow-y-auto">

                        <div class=" grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
                                <div class="mt-1 w-72 lg:w-80">
                                    <input type="text" name="name" id="name" autocomplete="name" wire:model='name' class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ">
                                    @error('name') <span class="text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                <div class="mt-1  w-72 lg:w-80 ">
                                    <textarea rows="2" wire:model='description' class="focus:placeholder-transparent block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Délicieux Bourgogne, gourmand et tout en fruit."></textarea>
                                    @error('description') <span class="text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-4 ">
                                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Prix</label>
                                <div class="mt-1 w-72 lg:w-80">
                                    <input type="number" id="price" name="price" autocomplete="price" wire:model='price' class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('price') <span class="text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-4 ">
                                <label for="format" class="block text-sm font-medium leading-6 text-gray-900">Format</label>
                                <div class="mt-1 w-72 lg:w-80">
                                    <input type="string" id="format" name="format" autocomplete="format" wire:model='format' class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('format') <span class="text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="vintage" class="block text-sm font-medium leading-6 text-gray-900">Vintage</label>
                                <div class="mt-1 w-72 lg:w-80">
                                    <input type="number" id="vintage" name="vintage" autocomplete="vintage" wire:model='vintage' class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('vintage') <span class="text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3 lg:col-span-6">
                                <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Pays</label>
                                <div class="mt-1 w-72 lg:w-80">
                                    <select id="country_id" name="country_id" autocomplete="country_id" wire:model='country_id' class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id') <span class="text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3 lg:col-span-6">
                                <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Type</label>
                                <div class="mt-2 w-72 lg:w-80">
                                    <select id="type_id" name="type_id" autocomplete="type_id" wire:model='type_id' class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                        @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id') <span class="text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-4 ">
                                <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Image URL</label>
                                <div class="mt-1 w-72 lg:w-80">
                                    <input wire:model="image" id="image" type="text" name="image" autocomplete="image" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('image') <span class="text-red">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6 lg:w-80">
                            <button wire:click="saveUnlistedBottle" class="p-3 bg-red text-white font-bold rounded-md w-full cursor-pointer hover:bg-red-600 focus:outline-none focus:bg-red-600">Ajouter</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>