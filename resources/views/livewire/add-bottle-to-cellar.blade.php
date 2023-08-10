<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Bottles in Cellar ID: {{ $cellarId }}</h2>

    @foreach ($bottles as $bottle)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $bottle->name }}</h5>
                <p class="card-text">Type: {{ $bottle->type->name }}</p>
                <p class="card-text">Country: {{ $bottle->country->name }}</p>
                <p class="card-text">Price: {{ $bottle->price }}</p>
                <p class="card-text">Quantity in Cellar:</p>
                @foreach ($bottle->cellars as $cellar)
                    <p>{{ $cellar->name }} - {{ $cellar->pivot->quantity }}</p>
                @endforeach

                <form wire:submit.prevent="addBottleToCellar" class="mt-3">
                    <input type="hidden" wire:model="bottleId" value="{{ $bottle->id }}">
                    <div class="form-group">
                        <label for="new_quantity">New Quantity:</label>
                        <input wire:model="newQuantity" type="number" class="form-control" id="new_quantity">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Quantity</button>
                </form>
            </div>
        </div>
    @endforeach

    {{ $bottles->links() }}
</div>
