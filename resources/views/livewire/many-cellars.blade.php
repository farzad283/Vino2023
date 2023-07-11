<div>
    <h2>Cellars</h2>

    @error('cellars')
        <div class="text-red-500">{{ $message }}</div>
    @enderror

    <livewire:search-bar wire:loading.attr="disabled" />

    <div class="grid grid-cols-3 gap-2" style="max-width: 1200px;">
        @if ($cellars->isEmpty())
            <p>Aucune cellier trouvée.</p>
        @else
            @foreach ($cellars as $cellar)
                <div class="col mb-4" style="width: 80%; border: 10px solid #ccc; border-radius: 5px;">
                    <div class="card-body mb-4" style="text-align: center;">
                        <p class="card-title text-xl font-bold mb-2">ID: {{ $cellar->id }}</p>
                        <p class="mb-4">Name: {{ $cellar->name }}</p>
                        <p class="mb-4">Created At: {{ $cellar->created_at }}</p>
                        <p class="mb-4">Updated At: {{ $cellar->updated_at }}</p>
                    </div>
                </div>
            @endforeach
        @endif

        @if ($cellars->isEmpty() && !empty($search))
            <p>Aucune cellier trouvée pour le terme de recherche "{{ $search }}".</p>
        @endif
    </div>
</div>
