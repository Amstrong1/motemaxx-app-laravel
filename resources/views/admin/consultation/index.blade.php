<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-lg my-2">Liste des consultations</h1>
                        <a href="{{ route('consultation.create') }}">
                            <x-primary-button>
                                Nouveau
                            </x-primary-button>
                        </a>
                    </div>
                    <div class="mt-4">
                        <x-tables.default :resources="$consultations" :mattributes="$my_attributes" type="consultation" :mactions="$my_actions" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
