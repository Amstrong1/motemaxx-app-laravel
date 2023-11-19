<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Voir les détails</h1>
                    <x-forms.show :item="$consultation" :fields="$my_fields" type="consultation" />                    
                </div>
                <div class="p-6 text-gray-900">
                    <h1>Voir les réponses</h1>
                    <x-forms.create :hideSubmitButton="true" :fills="$resConsultations" :fields="$my_resFields" type="res_consultation" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
