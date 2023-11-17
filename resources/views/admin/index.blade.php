<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col">
                        <div class="rounded shadow-lg m-4 p-4 flex justify-between items-center">
                            <div>
                                <div class="text-xl font-bold p-4">
                                    Motivations
                                </div>
                                <div>
                                    <a href="{{ route('motivation.index') }}" class="block p-4">
                                        Voir la liste
                                    </a>
                                </div>
                            </div>
                            <div class="text-xl font-bold p-4">
                                {{ $motivations }}
                            </div>
                        </div>
                        <div class="rounded shadow-lg m-4 p-4 flex justify-between items-center">
                            <div>
                                <div class="text-xl font-bold p-4">
                                    Reservations
                                </div>
                                <div>
                                    <a href="{{ route('reservation.index') }}" class="block p-4">
                                        Voir la liste
                                    </a>
                                </div>
                            </div>
                            <div class="text-xl font-bold p-4">
                                {{ $reservations }}
                            </div>
                        </div>
                        <div class="rounded shadow-lg m-4 p-4 flex justify-between items-center">
                            <div>
                                <div class="text-xl font-bold p-4">
                                    Services
                                </div>
                                <div>
                                    <a href="{{ route('prestation.index') }}" class="block p-4">
                                        Voir la liste
                                    </a>
                                </div>
                            </div>
                            <div class="text-xl font-bold p-4">
                                {{ $services }}
                            </div>
                        </div>
                        <div class="rounded shadow-lg m-4 p-4 flex justify-between items-center">
                            <div>
                                <div class="text-xl font-bold p-4">
                                    Recommandations
                                </div>
                                <div>
                                    <a href="{{ route('recommendation.index') }}" class="block p-4">
                                        Voir la liste
                                    </a>
                                </div>
                            </div>
                            <div class="text-xl font-bold p-4">
                                {{ $recommendations }}
                            </div>
                        </div>
                        <div class="rounded shadow-lg m-4 p-4 flex justify-between items-center">
                            <div>
                                <div class="text-xl font-bold p-4">
                                    Consultations
                                </div>
                                <div>
                                    <a href="{{ route('consultation.index') }}" class="block p-4">
                                        Voir la liste
                                    </a>
                                </div>
                            </div>
                            <div class="text-xl font-bold p-4">
                                {{ $consultations }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
