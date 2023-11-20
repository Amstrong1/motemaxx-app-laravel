<nav x-data="{ open: false }" class="border-b border-gray-100" style="background-color: rgba(63, 38, 57, 1)">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                @if (!request()->routeIs('home'))
                    <a href="{{ url()->previous() }}" class="text-white px-2 font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                        </svg>
                    </a>
                @endif
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('appiphone') }}">
                        <x-application-logo class="block sm:h-12 h-9 fill-current text-gray-800" />
                    </a>
                </div>
            </div>

            <div class="-me-2 flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center justify-center mx-2 p-2 rounded-md text-white">
                            <div>
                                <a class="hidden-arrow mr-4 flex items-center text-white transition duration-200 hover:text-white hover:ease-in-out focus:text-white disabled:text-black/30 motion-reduce:transition-none dark:text-white dark:hover:text-white dark:focus:text-white [&.active]:text-black/90 dark:[&.active]:text-white"
                                    href="#" id="dropdownMenuButton1" role="button" data-te-dropdown-toggle-ref
                                    aria-expanded="false">
                                    <!-- Dropdown trigger icon -->
                                    <span class="[&>svg]:w-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                        </svg>
                                    </span>
                                    <!-- Notification counter -->
                                    <span
                                        class="absolute -mt-6 ml-4 rounded-full bg-danger px-1 py-[0.15rem] text-xs font-bold leading-none text-white">
                                        {{ Auth::user()->unreadNotifications->count() }}
                                    </span>
                                </a>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @forelse (Auth::user()->unreadNotifications as $notification)
                            <x-dropdown-link href="{{ route($notification->data['link']) }}">
                                <p class="text-sm">
                                    {{ $notification->data['message'] }}
                                </p>

                                <p class="text-xs">{{ getFormattedDate($notification->created_at) }}</p>
                            </x-dropdown-link>
                        @empty
                            <p class="text-sm p-4">
                                Aucune notification
                            </p>
                        @endforelse
                    </x-slot>
                </x-dropdown>

                <!-- Admin dashboard -->
                @auth
                    @if (auth()->user()->admin == true)
                        <!-- Portefeuille -->
                        <a href="#">
                            <button class="inline-flex items-center justify-center p-2 rounded-md text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                </svg>
                            </button>
                        </a>

                        <a href="{{ route('admin.dashboard') }}">
                            <button class="inline-flex items-center justify-center p-2 rounded-md text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</nav>
