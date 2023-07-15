<div class="flex flex-col gap-2 bg-pink ">
        @foreach ($bottles as $bottle)
        @livewire('single-bottle', ['bottle_id' => $bottle->id])
        @endforeach
</div>
