<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h1>Voir les détails</h1>
                        <a href="{{ 'tel:' . $user->tel }}">
                            <x-primary-button class="bg-green-600">
                                Appeler
                            </x-primary-button>
                        </a>
                    </div>
                    <x-forms.show :item="$user" :fields="$my_fields" type="user" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
