<div class="p-1 h-screen w-full max-w-4xl">
    <h1 class=" text-center text-xl text-red font-bold mb-3 mt-6 lg:w-screen lg:mb-6" >Liste de souhaits</h1>
    @if ($wishlistItems)
        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:w-screen lg:md:grid-cols-4 max-h-screen overflow-y-auto pb-16 pr-5 pl-3">
            @foreach ($wishlistItems as $item)
                <li class="bg-white p-4 shadow-md rounded-md flex flex-col justify-around items-center transition-all ease-in duration-200">
                    <article class="relative flex flex-col justify-center items-center border-2 border-gold rounded-lg w-64 h-96"> 
                        <span class="absolute top-0 left-0 ml-1 mt-1 font-bold font-roboto"> 
                            @if ($item->bottle->unlisted == 0)
                                SAQ
                            @else
                                Unique
                            @endif
                        </span>
                        <img src="{{ $item->bottle->image }}" alt="{{ $item->bottle->name }}" class="w-36 h-53 mt-2">
                        <div class="text-center p-4">
                            <h1 class="font-bold font-roboto">{{ $item->bottle->name }}</h1>
                            <p class="text-xs mt-2 mb-2">{{ $item->bottle->description }}</p>
                            <h3 class="font-bold font-roboto">${{ $item->bottle->price }}</h3>
                        </div>
                        
                    </article>  
                </li>     
            @endforeach
        </ul>
    @else
        <p>Votre liste de souhaits est vide.</p>
    @endif
</div>
