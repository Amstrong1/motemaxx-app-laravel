<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h1 class="text-center text-xl text-white p-4">Connectez vous à l'institut motemaxx</h1>

    <form method="POST" action="{{ route('login') }}" class="text-white">
        @csrf

        <!-- Email Address -->
        <div class="mb-4 mt-8">
            <x-input-label class="text-white" for="email" :value="__('Email')" />
            <x-text-input style="background-color: rgba(63, 38, 57, 1)" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 mb-8">
            <x-input-label class="text-white" for="password" :value="__('Password')" />

            <x-text-input style="background-color: rgba(63, 38, 57, 1)" id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center my-8">
            <x-primary-button class="ms-3" style="background-color: rgba(235, 184, 67, 1)">
                {{ __('Connexion') }}
            </x-primary-button>
        </div>

        <div class="flex items-center justify-end my-8">
            @if (Route::has('password.request'))
                <a class="underline text-sm rounded-md"
                    href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié ?') }}
                </a> 
            @endif &nbsp;&nbsp;&nbsp;
            <a href="{{ route('register') }}">Inscription</a>
        </div>
    </form>
</x-guest-layout>
