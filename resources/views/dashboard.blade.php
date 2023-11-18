<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="p-6 text-gray-900 uppercase text-center font-bold">
                {{ __('Motivation du jour') }}
            </div>

            <div class="mx-4">
                @if ($motivation !== null)
                    @if ($motivation->image !== null)
                        <img class="shadow-lg rounded block m-auto" src="{{ asset('storage/' . $motivation->image) }}"
                            alt="">
                    @else
                        @if ($motivation->text !== null)
                            {!! $motivation->text !!}
                        @else
                            <img class="shadow-lg rounded block m-auto" src="{{ asset('img/motivation.jpg') }}"
                                alt="">
                        @endif
                    @endif
                @else
                    <img class="shadow-lg rounded block m-auto" src="{{ asset('img/motivation.jpg') }}" alt="">
                @endif
            </div>

            <div class="grid grid-cols-2 border border-blue-700 rounded py-4 m-4">
                <a href="{{ route('prestation.index') }}">
                    <div class="text-center border-r border-blue-700 text-sm font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 block m-auto">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                        </svg>
                        <p class="uppercase">
                            Services
                        </p>
                    </div>
                </a>
                <a href="{{ route('recommendation.index') }}">
                    <div class="text-center border-l border-blue-700 text-sm font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 block m-auto">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <p class="uppercase">
                            Recommandations
                        </p>
                    </div>
                </a>
            </div>

            <div id="carouselExampleControls" class="relative m-4" data-te-carousel-init data-te-ride="carousel">
                <h2 class="pt-6 text-gray-900 uppercase text-center font-bold">{{ __('Publicités') }}</h2>
                <!--Carousel items-->
                <div class="relative rounded w-full overflow-hidden after:clear-both after:block after:content-['']">
                    <!--First item-->
                    <div class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                        data-te-carousel-item data-te-carousel-active>
                        <img src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp" class="block w-full"
                            alt="Wild Landscape" />
                    </div>
                    <!--Second item-->
                    <div class="relative rounded float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                        data-te-carousel-item>
                        <img src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp" class="block w-full"
                            alt="Camera" />
                    </div>
                    <!--Third item-->
                    <div class="relative rounded float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                        data-te-carousel-item>
                        <img src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp" class="block w-full"
                            alt="Exotic Fruits" />
                    </div>
                </div>

                <!--Carousel controls - prev item-->
                <button
                    class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                    type="button" data-te-target="#carouselExampleControls" data-te-slide="prev">
                    <span class="inline-block h-8 w-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </span>
                    <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
                </button>
                <!--Carousel controls - next item-->
                <button
                    class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                    type="button" data-te-target="#carouselExampleControls" data-te-slide="next">
                    <span class="inline-block h-8 w-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </span>
                    <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
