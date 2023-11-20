<x-app-layout>
    <div class="max-w-7xl mx-auto m-2 sm:px-6 lg:px-8">
        <div class="mx-6 border-b-2" style="border-color: #4f364b">
            <div class="py-4 text-black text-center font-bold">
                {{ __('Recommandations') }}
            </div>
        </div>
        @forelse ($recommendations as $recommendation)
            <div class="overflow-hidden sm:rounded-lg mt-2">
                <div class="p-2 text-black text-center font-bold uppercase">
                    {{ 'Jour ' . $recommendation->day + 1 }}
                </div>

                <div class="p-2 text-black text-justify">
                    <span class="font-semibold">Petit Déjeuner : </span> {{ $recommendation->breakfast }}
                </div>

                <div class="p-2 text-black text-justify">
                    <span class="font-semibold">Déjeuner : </span> {{ $recommendation->lunch }}
                </div>

                <div class="p-2 text-black text-justify">
                    <span class="font-semibold">Dîner : </span> {{ $recommendation->dinner }}
                </div>
            </div>
            <div class="mx-auto w-10 p-4 border-b-2" style="border-color: #4f364b"></div>
        @empty
            <span class="block mx-auto p-4">Aucune recommandation</span>
        @endforelse

        @if ($recommendations->count() !== 0)
            <div class="p-2 text-black text-justify">
                Ces exemples de repas sains utilisent des ingrédients courants dans la cuisine du Moyen-Orient pour une alimentation équilibrée et délicieuse. Comme toujours, n'hésitez pas à adapter les repas en fonction de vos préférences et de vos besoins nutritionnels spécifiques.
            </div>
        @endif
    </div>
</x-app-layout>
