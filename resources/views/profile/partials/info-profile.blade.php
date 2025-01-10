<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Information utilisateur') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Détails de l’utilisateur enregistré dans le système.') }}
        </p>
    </header>

    <div class="mt-6 space-y-4">
        <div class="flex items-center">
            <span class="font-semibold text-gray-800 dark:text-gray-200 w-32">{{ __('Nom :') }}</span>
            <span class="text-gray-600 dark:text-gray-400">
                {{ $user->nom ?? __('Aucune info recensée') }}
            </span>
        </div>
        <div class="flex items-center">
            <span class="font-semibold text-gray-800 dark:text-gray-200 w-32">{{ __('Prénom :') }}</span>
            <span class="text-gray-600 dark:text-gray-400">
                {{ $user->prenom ?? __('Aucune info recensée') }}
            </span>
        </div>
        <div class="flex items-center">
            <span class="font-semibold text-gray-800 dark:text-gray-200 w-32">{{ __('Date de naissance :') }}</span>
            <span class="text-gray-600 dark:text-gray-400">
                {{ $user->naissance ?? __('Aucune info recensée') }}
            </span>
        </div>
        <div class="flex items-center">
            <span class="font-semibold text-gray-800 dark:text-gray-200 w-32">{{ __('Genre :') }}</span>
            <span class="text-gray-600 dark:text-gray-400">
                {{ $user->genre ? ucfirst($user->genre) : __('Aucune info recensée') }}
            </span>
        </div>
        <div class="flex items-center">
            <span class="font-semibold text-gray-800 dark:text-gray-200 w-32">{{ __('Email :') }}</span>
            <span class="text-gray-600 dark:text-gray-400">
                {{ $user->email ?? __('Aucune info recensée') }}
            </span>
        </div>
        <div class="flex items-center">
            <span class="font-semibold text-gray-800 dark:text-gray-200 w-32">{{ __('Inscrit le :') }}</span>
            <span class="text-gray-600 dark:text-gray-400">
                {{ $user->created_at ? $user->created_at->format('d/m/Y') : __('Aucune info recensée') }}
            </span>
        </div>
    </div>
</section>
