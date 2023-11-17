<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h1 class="text-center text-xl text-white p-4">Connectez vous à l'Institut Motemaxx</h1>

    <form method="POST" action="{{ route('login') }}" class="text-white">
        @csrf

        <!-- Email Address -->
        <div class="mb-4 mt-8">
            <x-input-label class="text-white" for="email" :value="__('Email')" />
            <x-text-input style="background-color: rgba(63, 38, 57, 1)" id="email" class="block mt-1 w-full"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 mb-8">
            <x-input-label class="text-white" for="password" :value="__('Password')" />

            <x-text-input style="background-color: rgba(63, 38, 57, 1)" id="password" class="block mt-1 w-full"
                type="password" name="password" required autocomplete="current-password" />

            <svg id="view1" onclick="showPassword()" xmlns="http://www.w3.org/2000/svg" class="relative h-6 w-6"
                style="bottom: 35px; left: 85%" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>

            <svg id="view2" onclick="showPassword()" xmlns="http://www.w3.org/2000/svg"
                class="relative h-6 w-6 hidden" style="bottom: 35px; left: 85%" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            </svg>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center my-8">
            <x-primary-button class="ms-3" style="background-color: rgba(235, 184, 67, 1)">
                {{ __('Connexion') }}
            </x-primary-button>
        </div>

        <div class="flex items-center justify-end my-8">
            @if (Route::has('password.request'))
                <a class="underline text-sm rounded-md" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié ?') }}
                </a>
            @endif &nbsp;&nbsp;&nbsp;
            <a href="{{ route('register') }}">Inscription</a>
        </div>
    </form>
</x-guest-layout>
