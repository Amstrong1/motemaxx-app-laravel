<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="p-6 text-black text-center font-bold uppercase">
                {{ $prestation->name }}
            </div>

            <div class="flex py-4">
                <div class="container mx-auto px-2 py-2 lg:px-32 lg:pt-24">
                    <div class="-m-1 flex flex-wrap md:-m-2">
                        @foreach ($images as $image)
                            <div class="w-1/2 p-1 md:p-2">
                                <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                                    src="{{ asset('storage/' . $image->image) }}" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="p-4 text-black text-justify">
                {{ $prestation->description }}
            </div>

            <div class="p-4 uppercase text-center">
                <a href="{{ route('reservation.create') }}">
                    <x-primary-button>
                        <span class="px-4 py-3">Prenez un rendez-vous</span>
                    </x-primary-button>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
