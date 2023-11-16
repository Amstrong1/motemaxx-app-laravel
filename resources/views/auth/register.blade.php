<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mt-8">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input style="background-color: rgba(63, 38, 57, 1)" id="name" class="block mt-1 w-full"
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input style="background-color: rgba(63, 38, 57, 1)" id="email" class="block mt-1 w-full"
                type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input style="background-color: rgba(63, 38, 57, 1)" id="password" class="block mt-1 w-full"
                type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 mb-8">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input style="background-color: rgba(63, 38, 57, 1)" id="password_confirmation"
                class="block mt-1 w-full" type="password" name="password_confirmation" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center my-8">
            <x-primary-button class="ms-4" style="background-color: rgba(235, 184, 67, 1)">
                {{ __('Inscription') }}
            </x-primary-button>
        </div>

        <div class="flex items-center justify-end my-8">
            <a class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Connexion') }}
            </a>
        </div>
    </form>
</x-guest-layout>
