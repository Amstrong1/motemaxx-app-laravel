<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="p-4 text-black flex items-center text-sm justify-between font-bold">
                <span>{{ __('Mes réservations') }}</span>
                <a href="{{ route('reservation.create') }}">
                    <x-primary-button>
                        Nouveau
                    </x-primary-button>
                </a>
            </div>

            @forelse ($reservations as $reservation)
                @foreach ($reservation->reservationServices()->get() as $reservationService)
                    <div class="m-4 p-4 text-sm text-gray-900 flex justify-between border rounded-lg shadow-lg">
                        <div class="flex flex-col gap-2">
                            <div>{{ $reservationService->prestation->name }}</div>
                            <div>{{ getFormattedDate($reservation->date) }}</div>
                            @foreach ($reservation->hourReservations()->get() as $item)
                                <div>{{ $item->hour }}</div>
                            @endforeach
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <form action="{{ route('reservation.destroy', ['reservation' => $reservation]) }}"
                                method="POST" onsubmit="event.preventDefault(); deleteConfirmation(this)">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600  rounded-lg dark:text-red-600 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete">
                                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </form>
                            <div><span class="text-xs italic">{{ $reservation->status }}</span></div>
                            <div>
                                <span class="text-xs italic">
                                    @if ($reservation->paid == true)
                                        Payé
                                    @else
                                        Non payé
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @empty
                Aucune réservation.
            @endforelse

        </div>
    </div>
</x-app-layout>
