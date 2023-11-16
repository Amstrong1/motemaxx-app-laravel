<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />

    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    sans: ["Philosopher", "serif"],
                    body: ["Philosopher", "serif"],
                    mono: ["ui-monospace", "monospace"],
                },
            },
            corePlugins: {
                preflight: true,
            },
        };
    </script>

    <script type="module" crossorigin src="{{ asset('assets/index-503be980.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/index-8a62a5d9.css') }}">
</head>


<body class="font-sans text-gray-900 antialiased">

    <!-- Navigation bar -->
    <nav style="background-color: #4f364b"
        class="flex w-full items-center justify-between py-2 text-neutral-600 hover:text-neutral-700 focus:text-neutral-700 dark:bg-neutral-600 dark:text-neutral-200 md:flex-wrap md:justify-start"
        data-te-navbar-ref>
        <div class="flex w-full flex-wrap items-center justify-between px-1 md:px-3">

            <!-- Navigation links -->
            <div class="grow basis-[100%] items-center !flex lg:basis-auto">

                <div class="w-full container mx-auto px-2 md:px-6 py-2">

                    <div class="w-full flex items-center justify-between">
                        <div>
                            <a class="flex items-center no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                                href="/">
                                <img class="w-20" src="{{ asset('img/logo.jpg') }}" alt="traiteur_local">
                                {{-- <div class="logo-ext tracking-widest text-sm md:text-2xl font-semibold italic rounded text-white">Au pré des saveurs</div> --}}
                            </a>
                        </div>

                        <div class="hidden md:flex md:flex-row justify-end content-center">
                            <a class="flex text-white no-underline hover:text-indigo-200 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4"
                                href="/" data-te-nav-link-ref data-te-ripple-init data-te-ripple-color="light">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg> &nbsp;
                                Accueil
                            </a>

                            <a href="#services"
                                class="flex text-white no-underline hover:text-indigo-200 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4"
                                href="" data-te-nav-link-ref data-te-ripple-init data-te-ripple-color="light">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z" />
                                </svg>
                                &nbsp;
                                Services
                            </a>

                            <a href="#contact"
                                class="flex text-white no-underline hover:text-indigo-200 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4"
                                href="" data-te-nav-link-ref data-te-ripple-init data-te-ripple-color="light">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                                &nbsp;
                                Contact
                            </a>
                        </div>

                        <!-- Sidenav -->
                        <nav id="sidenav-7"
                            class="fixed right-0 z-[1035] h-screen w-60 translate-x-full overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] data-[te-sidenav-hidden='false']:-translate-x-0 dark:bg-zinc-800"
                            style="top: 7rem" data-te-sidenav-init data-te-sidenav-hidden="true"
                            data-te-sidenav-right="true">
                            <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
                                <li class="relative">
                                    <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                        data-te-sidenav-link-ref>
                                        <span
                                            class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                            </svg>
                                        </span>
                                        <span>Accueil</span>
                                    </a>
                                </li>
                                <li class="relative">
                                    <a href="#services"
                                        class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                        data-te-sidenav-link-ref>
                                        <span
                                            class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z" />
                                            </svg>
                                        </span>
                                        <span>Services</span>
                                    </a>
                                </li>
                                <li class="relative">
                                    <a href="#contact"
                                        class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                        data-te-sidenav-link-ref>
                                        <span
                                            class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                            </svg>
                                        </span>
                                        <span>Contact</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- Sidenav -->

                        <!-- Toggler -->
                        <button
                            class="border-0 bg-transparent px-2 text-xl leading-none transition-shadow duration-150 ease-in-out hover:text-white focus:text-white dark:hover:text-white dark:focus:text-white md:hidden"
                            data-te-sidenav-toggle-ref data-te-target="#sidenav-7" aria-controls="#sidenav-7"
                            aria-haspopup="true">
                            <span class="block [&>svg]:h-5 [&>svg]:w-6 [&>svg]:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#fff"
                                    class="h-6 w-6">
                                    <path fill-rule="evenodd"
                                        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <!-- Toggler -->
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <div class="container max-w-screen-xl mx-auto px-4">
        <header class="flex flex-col lg:flex-row justify-between lg:mb-20">
            <div class="flex flex-col justify-around lg:text-left mb-20 lg:mb-0 md:w-1/2">

                <h1 class="font-bold text-gray-800 text-xl md:text-2xl xl:text-4xl mb-10">
                    Indulgez dans la Beauté <br> Allumez la Confiance <br> Libérez votre Éclat chez Motemaxx
                </h1>

                <p class="font-normal text-gray-500 text-sm md:text-md xl:text-lg mb-10">
                    Offrez-vous le luxe de prendre soin de vous chez Motemaxx. Franchissez nos portes et laissez nous
                    vous guider dans un voyage de beauté, de bien-être et de découverte de soi. Votre confiance
                    rayonnante n'est qu'à un rendez-vous.
                </p>

                <div class="space-y-5 lg:space-x-5 mb-10">
                    <a href="#services" style="background-color: #c98c3f"
                        class="block md:inline px-8 py-3 font-medium bg-indigo-800 text-white text-lg rounded-md hover:bg-indigo-600 transiton ease-in-out duration-300">Voir
                        Plus</a>

                    <a href="{{ route('reservation.index') }}" style="border-color: #c98c3f; color: #c98c3f"
                        class="block md:inline px-8 py-3 font-medium text-indigo-800 text-lg border-2 border-indigo-800 rounded-md  transiton ease-linear duration-300">Réserver</a>
                </div>
            </div>

            <div class="mx-auto lg:mx-0 md:w-1/2 hidden md:block">
                <img src="{{ asset('img/soin.jpg') }}" alt="Image" />
            </div>
        </header>
    </div>

    <section id="services" class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <h2 class="font-bold text-center text-2xl my-8">Ce que nous proposons</h2>
            <div class="flex flex-wrap -m-4">
                @foreach ($prestations as $item)
                    <div class="p-4 flex md:w-1/3">
                        <div
                            class="w-full block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                            <div class="overflow-hidden h-64">
                                <img class="w-full rounded-t-lg" src="{{ asset('storage/' . $item->logo) }}"
                                    alt="{{ $item->name }}" />
                            </div>
                            <div class="p-6">
                                <h5
                                    class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                                    {{ $item->name }}
                                </h5>
                                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                    {{ $item->description }}
                                </p>
                                <a href="{{ route('prestation.show', $item->id) }}">
                                    <button type="button" style="background-color: #fddb7e; color: #402639"
                                    class="inline-block rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0  active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                    data-te-ripple-init data-te-ripple-color="light">
                                    Voir plus
                                </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div id="testimonies"
        class="p-4 flex items-center justify-center h-sceen md:h-96 bg-fixed bg-center bg-cover brightness-100"
        style="background-image:url('img/soin.jpg')">
        <!--Carousel-->
        <div class="absolute w-full h-sceen md:h-96" style="background: rgba(17, 22, 24, .5)"></div>
        <div id="carouselExampleCaptions" class="relative" data-te-carousel-init data-te-carousel-slide
            data-te-ride="carousel">
            <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
                <!--First Testimonial / Carousel item-->
                <div class="relative float-left -mr-[100%] hidden w-full text-center transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                    data-te-carousel-active data-te-carousel-item style="backface-visibility: hidden">
                    <p class="mx-auto w-2/3 text-xl italic text-white">
                        "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit,
                        error amet numquam iure provident voluptate esse quasi, voluptas
                        nostrum quisquam!"
                    </p>
                    <div class="mb-6 mt-12 flex justify-center">
                        <img src="https://tecdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
                            class="h-24 w-24 rounded-full shadow-lg dark:shadow-black/30" alt="smaple image" />
                    </div>
                    <p class="text-white">- Anna Morian</p>
                </div>

                <!--Second Testimonial / Carousel item-->
                <div class="relative float-left -mr-[100%] hidden w-full text-center transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                    data-te-carousel-item style="backface-visibility: hidden">
                    <p class="mx-auto w-2/3 text-xl italic text-white">
                        "Neque cupiditate assumenda in maiores repudiandae mollitia
                        adipisci maiores repudiandae mollitia consectetur adipisicing
                        architecto elit sed adipiscing elit."
                    </p>
                    <div class="mb-6 mt-12 flex justify-center">
                        <img src="https://tecdn.b-cdn.net/img/Photos/Avatars/img%20(31).webp"
                            class="h-24 w-24 rounded-full shadow-lg dark:shadow-black/30" alt="smaple image" />
                    </div>
                    <p class="text-white">- Teresa May</p>
                </div>

                <!--Third Testimonial / Carousel item-->
                <div class="relative float-left -mr-[100%] hidden w-full text-center transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                    data-te-carousel-item style="backface-visibility: hidden">
                    <p class="mx-auto w-2/3 text-xl italic text-white">
                        "Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur est laborum neque
                        cupiditate assumenda in maiores."
                    </p>
                    <div class="mb-6 mt-12 flex justify-center">
                        <img src="https://tecdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp"
                            class="h-24 w-24 rounded-full shadow-lg dark:shadow-black/30" alt="smaple image" />
                    </div>
                    <p class="text-white">- Kate Allise</p>
                </div>
            </div>

            <!--Carousel Controls - prev item-->
            <button
                class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none dark:text-white dark:opacity-50 dark:hover:text-white dark:focus:text-white"
                type="button" data-te-target="#carouselExampleCaptions" data-te-slide="prev">
                <span class="inline-block h-8 w-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </span>
                <span
                    class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
            </button>
            <!--Carousel Controls - next item-->
            <button
                class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none dark:text-white dark:opacity-50 dark:hover:text-white dark:focus:text-white"
                type="button" data-te-target="#carouselExampleCaptions" data-te-slide="next">
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

    <div id="contact">
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-12 mx-auto">
                <div class="flex flex-wrap items-center justify-center -m-4">
                    <div class="p-4">

                        @if (Session::has('success'))
                            <div class="mb-4 rounded-lg bg-success-100 px-6 py-5 text-base text-success-700"
                                role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <div class="block rounded-lg bg-white p-6 shadow-xl dark:bg-neutral-700">
                            <h2 class="text-center font-bold mb-2">Contact</h2>
                            <form action="" id="form" method="POST" x-data="validateContactForm()"
                                x-init="$watch('name', value => { validate('name') })
                                $watch('email', value => { validate('email') })
                                $watch('message', value => { validate('message') })">
                                @csrf

                                <!--Name input-->
                                <div class="relative mb-6">
                                    <label for="name" class="">Nom
                                    </label>
                                    <input x-model="name" type="text" id="name" name="name"
                                        class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    <span class="text-sm italic text-red-500 mt-2">
                                        <div x-text="validation.name.message"></div>
                                    </span>
                                </div>

                                <!--Email input-->
                                <div class="relative mb-6">
                                    <label for="email" class="">Email
                                    </label>
                                    <input x-model="email" type="email" name="email"
                                        class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        id="email" placeholder="Email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    <span class="text-sm italic text-red-500 mt-2">
                                        <div x-text="validation.email.message"></div>
                                    </span>
                                </div>

                                <!--object input-->
                                <div class="relative mb-6">
                                    <label for="object" class="">Objet
                                    </label>
                                    <input x-model="object" type="text" name="object"
                                        class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        id="object" placeholder="Email" />
                                    <x-input-error :messages="$errors->get('object')" class="mt-2" />
                                    <span class="text-sm italic text-red-500 mt-2">
                                        <div x-text="validation.object.message"></div>
                                    </span>
                                </div>

                                <!--Message textarea-->
                                <div class="relative mb-6">
                                    <label for="message" class="">Message
                                    </label>
                                    <textarea x-model="message" name="message"
                                        class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        id="message" rows="3" placeholder="Message"></textarea>
                                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                    <span class="text-sm italic text-red-500 mt-2">
                                        <div x-text="validation.message.message"></div>
                                    </span>
                                </div>

                                <!-- Google Recaptcha -->
                                <div class="g-recaptcha my-4" data-sitekey={{ config('services.recaptcha.key') }}>
                                </div>

                                <!--Submit button-->
                                <button type="submit"
                                    class="dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]] inline-block w-full rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                    data-te-ripple-init data-te-ripple-color="light"
                                    style="background-color: #4bad41">
                                    Envoyer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer class="px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center" style="background-color: #bbaf7b">
        <!--Footer-->

        <div class="w-full pt-16 pb-6 text-md text-center fade-in flex flex-col md:flex-row justify-between">
            <div class="my-2">
                <a class="text-white no-underline hover:no-underline" href="#">Mentions Légales</a> <span
                    class="text-white"> | </span>
                <a class="text-white no-underline hover:no-underline" href="#">Conditions Générales
                    d'utilisation</a> <span class="text-white"> | </span>
                <a class="text-white no-underline hover:no-underline" href="#">Conditions Générales de vente</a>
            </div>

            <div class="my-2">
                <a class="text-white no-underline hover:no-underline" href="#">&copy; Motemaxx
                    2023</a>
                {{-- @if (Route::has('login.admin')) --}}
                <a class="text-white no-underline hover:no-underline" href="{{ route('app') }}">&copy;
                    Administration</a>
                {{-- @endif --}}
            </div>
        </div>
    </footer>

    <script async src="//www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("form").submit();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>

</body>

</html>
