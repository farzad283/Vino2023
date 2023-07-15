<article class=" m-4 border-2 border-gold m-2 flex rounded-lg ">
    <div class=" top-[-20px]  ">
        <img src="{{ $bottle->image }}" alt="{{ $bottle->name }}" class="max-w-100 mt-2 ">
    </div>
    <div class="flex flex-col justify-end items-end ml-auto p-4">
        <h1 class="font-bold text-right font-roboto">{{ $bottle->name }}</h1>

        <p class="text-sm mt-2 mb-2">{{ $bottle->description }}</p>
        <!-- et ainsi de suite pour les autres attributs de la bouteille -->
        <a href="{{ $bottle->url }}" class="mb-2 underline "><span class="text-sm mt-2">Prix SAQ: {{ $bottle->price }} $</span></a>
        <div class="flex mt-4 ">
            <div class="flex items-center justify-center h-8 w-26 ">
                <button id="decrement" class="w-8 h-8 p-2 text-xl font-bold text-gold flex items-center justify-center">-</button>
                <span id="count" class="mx-4 text-gold">0</span>
                <button id="increment" class="w-8 h-8 text-xl font-bold text-gold  flex items-center justify-center mr-6">+</button>
            </div>

            <div class="flex items-center justify-center ml-4 rounded-lg border-2 border-gold text-sm text-gold px-2 ">
                @livewire('button', ['label'=> "Ajouter"])
            </div>
        </div>
</article>