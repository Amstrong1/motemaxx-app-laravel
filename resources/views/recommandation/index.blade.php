<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @forelse ($recommendations as $recommendation)
        <div class="overflow-hidden sm:rounded-lg">
            <div class="p-6 text-black text-center font-bold uppercase">
                {{ $recommendation->title }}
            </div>

            <div class="p-4 text-black text-justify">
                {{ $recommendation->description }}
            </div>
        </div>
        @empty
            <span class="block mx-auto p-4">Aucune recommandation</span>
        @endforelse
    </div>
</x-app-layout>
