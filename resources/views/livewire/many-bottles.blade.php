@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-2 gap-2 justify-center items-center ">
        @foreach ($bottles as $bottle)
            <div class="bg-white p-8 rounded-lg shadow-lg card flex flex-col relative">
                <h1 class="font-bold mb-4">{{ $bottle->name }}</h1>
                
                <p class="">Type: {{ $bottle->type->name }}</p>
                <p class="">Pays: {{ $bottle->country->name }}</p>
                <p class="">Prix: {{ $bottle->price }}</p>
                <p class="">Format: {{ $bottle->format }}</p>
                <!-- <p class="text-lg mb-2">Millésime: {{ $bottle->vintage }}</p> -->
                <!-- Add other details you want to display -->
                
                <div class="absolute left-40 bottom-0 max-w-100">
                    <img src="{{ $bottle->image }}" alt="{{ $bottle->name }}" class="">
                </div>
                @livewire('button', ['label' => "Ajouter au cellier"])
            </div>
        @endforeach
        <div class="col-span-2">{{ $bottles->links() }}</div>
    </div>
@endsection
