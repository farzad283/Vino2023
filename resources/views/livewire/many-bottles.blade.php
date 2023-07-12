<div class="flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            @foreach ($bottles as $bottle)
                <h1 class="text-3xl font-bold mb-4">{{ $bottle->name }}</h1>
                <div class="flex justify-center mb-4">
                    <img src="{{ $bottle->image }}" alt="{{ $bottle->name }}" class="border border-gray-300 rounded-lg">
                </div>
                <p class="text-lg mb-2">Type: {{ $bottle->type->name }}</p>
                <p class="text-lg mb-2">Pays: {{ $bottle->country->name }}</p>
                <p class="text-lg mb-2">Prix: {{ $bottle->price }}</p>
                <p class="text-lg mb-2">Format: {{ $bottle->format }}</p>
                <p class="text-lg mb-2">Millésime: {{ $bottle->vintage }}</p>


                <!-- Add other details you want to display -->
                
                <div class="absolute left-40 bottom-0 max-w-100">
                    <img src="{{ $bottle->image }}" alt="{{ $bottle->name }}" class="">
                </div>
                @livewire('button', ['label' => "Ajouter au cellier"])
            </div>
        @endforeach
        <div class="col-span-2">{{ $bottles->links() }}</div>
    </div>

