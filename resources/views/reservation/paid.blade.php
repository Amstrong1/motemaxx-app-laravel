<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            {{-- <form class="mt-4" action="{{ route('reservation.paid', $reservation->id) }}" method="post"> --}}
                {{-- @csrf --}}
                <div class="p-6">
                    <div class="font-semibold">
                        <p class="py-2">Modification et annulation possibles jusquà 48h avant la séance.</p>
                        <p class="py-2">Passé ce délai la séance n'est plus modifiable ni remboursable, SANS EXCEPTION.
                        </p>
                        <p class="py-2">Les séances non réalisées sont dues.</p>
                    </div>

                    {{-- <div class="py-4">
                        <x-primary-button class="w-full">
                            <span class="p-2 block mx-auto">Confirmer le paiement</span>
                        </x-primary-button>
                    </div> --}}

                    <div id="paypalForm">
                        <div>
                            <div class="mb-4">
                                <form action="{{ route('payment', $reservation->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $reservation->id }}">
                                    <input type="hidden" name="amount" value="{{ $reservation->prix ?? 1 }}">

                                    <button type="submit"
                                        class="font-medium text-sm inline-flex items-center justify-center px-3 py-2 border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out w-full bg-indigo-500 hover:bg-indigo-600 text-white focus:outline-none focus-visible:ring-2">
                                        Payez via PayPal {{ $reservation->prix ?? 1 }}€</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </form> --}}
        </div>
    </div>
</x-app-layout>
