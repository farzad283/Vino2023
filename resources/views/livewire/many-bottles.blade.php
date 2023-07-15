<div class="grid grid-cols-2 gap-2 ">
        @foreach ($bottles as $bottle)
            @livewire('single-bottle', ['bottleId' => $bottle->id])
        @endforeach
    <div class="col-span-2">{{ $bottles->links() }}</div>
</div>
