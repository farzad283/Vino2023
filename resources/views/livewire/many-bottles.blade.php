<div class="flex flex-col gap-2 bg-pink ">
        @foreach ($bottles as $bottle)
            @livewire('single-bottle', ['bottleId' => $bottle->id])
        @endforeach
</div>
