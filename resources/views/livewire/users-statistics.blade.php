<section>
    <div class="text-3xl font-bold">Usageres</div>
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">id de Usager</th>
                    <th class="px-4 py-2">Nome de Usager</th>
                    <th class="px-4 py-2">nombre de cellier</th>
                    <th class="px-4 py-2">prix totall de cellieres</th>
                    <th class="px-4 py-2">Le plus grand nombre de bouteilles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="px-4 py-2">{{ $user->id }}</td>
                    <td class="px-4 py-2">{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td class="px-4 py-2">{{ $user->cellarCount }}</td>
                    <td class="px-4 py-2">{{ $user->totalPrice }}</td>
                    <td class="px-4 py-2">{{ $user->maxBottles }}</td>
                </tr>
                @endforeach
                <tr>
                    <td class="px-4 py-2">Total</td>
                    <td class="px-4 py-2">{{ $totalUsers }}</td>
                    <td class="px-4 py-2">{{ $totalCellars }}</td>
                    <td class="px-4 py-2">{{ $totalPrice }}</td>
                    <td class="px-4 py-2"></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

