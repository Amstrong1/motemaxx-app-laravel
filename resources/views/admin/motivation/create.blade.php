<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Ajouter une motivation</h1>
                    <x-forms.create :fields="$my_fields" type="motivation" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

