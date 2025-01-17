<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nom -->
        <div>
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="nom" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>

        <!-- Prénom -->
        <div class="mt-4">
            <x-input-label for="prenom" :value="__('Prénom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>

        <!-- Date de naissance -->
        <div class="mt-4">
            <x-input-label for="naissance" :value="__('Date de naissance')" />
            <x-text-input id="naissance" class="block mt-1 w-full" type="date" name="naissance" :value="old('naissance')" required autofocus autocomplete="naissance" />
            <x-input-error :messages="$errors->get('naissance')" class="mt-2" />
        </div>

        <!-- Genre -->
        <div class="mt-4">
            <x-input-label :value="__('Genre')" />
            <div class="flex gap-4 mt-1">
                <label class="flex items-center">
                    <x-text-input id="masculin" type="radio" name="genre" value="masculin" required autofocus autocomplete="genre" />
                    <span class="ml-2">{{ __('Masculin') }}</span>
                </label>
                <label class="flex items-center">
                    <x-text-input id="feminin" type="radio" name="genre" value="feminin" required autofocus autocomplete="genre" />
                    <span class="ml-2">{{ __('Féminin') }}</span>
                </label>
                <label class="flex items-center">
                    <x-text-input id="autre" type="radio" name="genre" value="autre" required autofocus autocomplete="genre" />
                    <span class="ml-2">{{ __('Autre') }}</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('genre')" class="mt-2" />
        </div>

        <!-- Adresse e-mail -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Mot de passe -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmation du mot de passe -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
