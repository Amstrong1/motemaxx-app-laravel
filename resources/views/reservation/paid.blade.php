<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <form class="mt-4" action="{{ route('reservation.paid', $id) }}" method="post">
                @csrf
                <div class="p-6">
                    <div class="font-semibold">
                        <p class="py-2">Modification et annulation possibles jusquà 48h avant la séance.</p>
                        <p class="py-2">Passé ce délai la séance n'est plus modifiable ni remboursable, SANS EXCEPTION.</p>
                        <p class="py-2">Les séances non réalisées sont dues.</p>
                    </div>

                    <div class="py-4">
                        <x-primary-button type="submit" class="w-full">
                            <span class="p-2 block mx-auto">Confirmer le paiement</span>
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
