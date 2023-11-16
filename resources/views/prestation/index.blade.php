<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="p-4 text-black text-center font-bold">
                {{ __('Motemaxx vous souhaite la bienvenue') }}
            </div>

            <div class="p-4 text-gray-900 uppercase text-center text-xs">
                {{ __('Contacter le service client au +33 0 000 000') }}
            </div>

            <div class="grid grid-cols-3 py-4 m-4 gap-4">
                @foreach ($prestations as $prestation)
                    <a href="{{ route('prestation.show', ['prestation' => $prestation->id]) }}">
                        <div class="text-center text-xs font-bold">
                            <img class="w-16 rounded-full block mx-auto" src="{{ asset('storage/' . $prestation->logo) }}" alt="{{ $prestation->name }}">
                            <p class="my-2">
                                {{ $prestation->name }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
