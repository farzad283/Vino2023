

<section class="bg-white p-4 md:p-6 rounded shadow text-center">
    <div class="text-2xl font-bold mb-3">Usageres</div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white table-auto w-full rounded-lg overflow-hidden ">
            <thead class="text-gold text-center bg-slate-200">
                <tr>
                    <th class="px-2 md:px-4 py-2 text-left">
                    <svg class="h-5 w-5" fill="currentColor" 
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M528 160V416c0 8.8-7.2 16-16 16H320c0-44.2-35.8-80-80-80H176c-44.2 0-80 35.8-80 80H64c-8.8 0-16-7.2-16-16V160H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM272 256a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zm104-48c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376z"/></svg>
                    </th>
                    <th class="px-2 md:px-4 py-2 text-left">
                    <svg class="h-5 w-5" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                    </th>
                    <th class="px-2 md:px-4 py-2 text-left">
                        <div class="flex">
                            <div class="mr-1">#</div>
                            <svg class="h-5 w-5" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        </div>
                    </th>
                </th>
                    <th class="px-4 py-2  text-left"><div class="flex"><div class="mr-1">$</div><svg class="h-5 w-5  items-center" fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 488V171.3c0-26.2 15.9-49.7 40.2-59.4L308.1 4.8c7.6-3.1 16.1-3.1 23.8 0L599.8 111.9c24.3 9.7 40.2 33.3 40.2 59.4V488c0 13.3-10.7 24-24 24H568c-13.3 0-24-10.7-24-24V224c0-17.7-14.3-32-32-32H128c-17.7 0-32 14.3-32 32V488c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24zm488 24l-336 0c-13.3 0-24-10.7-24-24V432H512l0 56c0 13.3-10.7 24-24 24zM128 400V336H512v64H128zm0-96V224H512l0 80H128z"/></svg>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="border-t border-gray-200 even:bg-slate-100 odd:bg-slate-200 text-center items-center">
                @foreach($users as $user)
                <tr class="border-t border-gray-200 even:bg-gray-50 odd:bg-white">
                    <td class="px-2 md:px-4 py-2">{{ $user->id }}</td>
                    <td class="px-2 md:px-4 py-2">{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td class="px-2 md:px-4 py-2">{{ $user->cellarCount }}</td>
                    <td class="px-2 md:px-4 py-2">{{ $user->totalPrice }}</td>
                </tr>
                @endforeach
                <tr class="border-t border-gray-200 font-bold">
                    <td class="px-2 md:px-4 py-2">Total</td>
                    <td class="px-2 md:px-4 py-2">{{ $totalUsers }}</td>
                    <td class="px-2 md:px-4 py-2">{{ $totalCellars }}</td>
                    <td class="px-2 md:px-4 py-2">{{ $totalPrice }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

