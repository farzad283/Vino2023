<div class="h-screen">
<article class="mt-10 mx-6 my-2 sm:w-5/6 md:w-full md:mx-0 lg:w-full lg:mx-10 lg:mt-16 flex  bg-white rounded-3xl items-center gap-2 mb-8 " >
    
    <img src="{{ $bottle->image }}" alt="{{ $bottle->name }}" class="max-w-80 relative bottom-3 -mt-4 transform transition-transform duration-300 hover:scale-125 hover:brightness-80">
    
    <div class="flex flex-col justify-end items-left p-4 sm:flex-row sm:justify-between sm:gap-4">
        <h1 class="text-left font-bold font-roboto">{{ $bottle->name }}</h1>
        <p class="text-xs mt-2 mb-2">{{ $bottle->description }}</p>
    </div>
</article> 
@if($bottle->consumedNotes->isNotEmpty())
<h1 class="text-left pl-6 font-bold font-roboto">Commentaires</h1>
    <div class="w-full mt-4 ">
       
        <table class="min-w-full bg-white">
            <thead  class="text-red text-center  bg-slate-200">
                <tr>
                    <th title="Nombre" class="py-2">#</th>
                    <th title="Commentaires" class="py-2"><svg class="h-7 w-7 inline-block" fill="currentColor" id="Review" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><title/><path d="M341.68,181.4805,287.3789,173.59l-24.2812-49.2031a7.9988,7.9988,0,0,0-14.3477,0L224.4609,173.59,170.16,181.4805a7.9971,7.9971,0,0,0-4.4375,13.6406L205.02,233.4258l-9.2773,54.0859a8.001,8.001,0,0,0,11.6094,8.43l48.57-25.5312,48.57,25.5312a8.001,8.001,0,0,0,11.6094-8.43l-9.2774-54.0859,39.293-38.3047a7.9972,7.9972,0,0,0-4.4375-13.6406Zm-49.0391,43.43a8.0114,8.0114,0,0,0-2.3008,7.0781l7.25,42.25L259.6445,254.293a7.9473,7.9473,0,0,0-7.4453,0l-37.9453,19.9453,7.2461-42.25a8.0114,8.0114,0,0,0-2.3008-7.0781L188.5,194.9805l42.4219-6.1641a7.9921,7.9921,0,0,0,6.0234-4.375l18.9766-38.4375,18.9687,38.4375a7.9987,7.9987,0,0,0,6.0274,4.375l42.4218,6.1641Z"/><path d="M413.0938,69.3945H98.9063A50.9633,50.9633,0,0,0,48,120.3008V307.3242a50.9633,50.9633,0,0,0,50.9063,50.9063h89.4921v76.375a7.9991,7.9991,0,0,0,13.6563,5.6562l82.0234-82.0312H413.0938A50.9633,50.9633,0,0,0,464,307.3242V120.3008A50.9633,50.9633,0,0,0,413.0938,69.3945ZM448,307.3242a34.945,34.945,0,0,1-34.9062,34.9063H280.7656a8.0008,8.0008,0,0,0-5.6562,2.3437l-70.711,70.7188V350.2305a7.9979,7.9979,0,0,0-8-8H98.9063A34.945,34.945,0,0,1,64,307.3242V120.3008A34.945,34.945,0,0,1,98.9063,85.3945H413.0938A34.945,34.945,0,0,1,448,120.3008Z"/></svg></th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1; ?> <!-- Initialize a separate counter -->
                @foreach($bottle->consumedNotes as $note)
                    @if(!empty(trim($note->note))) <!-- Check if note is not empty -->
                        <tr class=" border-t border-gray-200 even:bg-slate-200 odd:bg-white text-center  items-cente">
                            <td class="py-2 text-center  items-center">{{ $counter++ }}</td> <!-- Use the counter and increment it for next iteration -->
                            <td>{{ $note->note }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endif

</div>


    


