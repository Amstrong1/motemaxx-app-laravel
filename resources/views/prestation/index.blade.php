<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="mx-6 border-b-2" style="border-color: #4f364b">
                <div class="py-4 text-black text-center font-bold">
                    {{ __('Motemaxx vous souhaite la bienvenue') }}
                </div>
    
                <div class="py-4 text-gray-900 uppercase text-center text-xs">
                    {{ __('Nos services') }}
                </div>
            </div>


            <div class="grid grid-cols-3 py-4 m-4 gap-4 justify-center">
                @foreach ($prestations as $prestation)
                    <a href="{{ route('prestation.show', ['prestation' => $prestation->id]) }}">
                        <div class="text-center text-sm">
                            <div class="h-16 overflow-hidden block mx-auto">
                                <img class="h-16 rounded-full block mx-auto" src="{{ asset('storage/' . $prestation->logo) }}" alt="{{ $prestation->name }}">
                            </div>
                            <p class="my-2 uppercase">
                                {{ $prestation->name }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
