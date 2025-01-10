@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 p-6 min-h-screen">
        <div class="w-11/12 max-w-6xl mx-auto bg-white rounded-lg shadow-md p-6 mt-6">
            <!-- En-tête -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-extrabold text-gray-800">{{ __("Détails de la Consultation") }}</h1>
                <a class="p-3 px-6 rounded-full bg-gradient-to-r from-gray-400 to-gray-600 text-white font-semibold shadow hover:from-gray-500 hover:to-gray-700 transition-all duration-200"
                   href="{{ route('consultation.index') }}">{{ __("Retour") }}</a>
            </div>

            <!-- Informations de la Consultation -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Informations du Client') }}</h2>
                    <p class="text-gray-600"><strong>{{ __('Nom :') }}</strong> {{ $consultation->user->nom }}</p>
                    <p class="text-gray-600"><strong>{{ __('Prénom :') }}</strong> {{ $consultation->user->prenom }}</p>
                </div>

                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Informations de la Consultation') }}</h2>
                    <p class="text-gray-600"><strong>{{ __('Date :') }}</strong> {{ $consultation->date_consultation }}</p>
                    <p class="text-gray-600"><strong>{{ __('Type :') }}</strong> {{ $consultation->type->nom }}</p>
                    <p class="text-gray-600"><strong>{{ __('Praticien :') }}</strong> {{ $consultation->praticien->nom }}</p>
                </div>
            </div>

            <div class="mt-6">
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Autres Informations') }}</h2>
                    <p class="text-gray-600">
                        <strong>{{ __('Statut :') }}</strong>
                        <span class="{{ $consultation->statu === 'valide' ? 'text-green-500' : ($consultation->statu === 'rejete' ? 'text-red-500' : 'text-yellow-500') }}">
                            {{ ucfirst($consultation->statu) }}
                        </span>
                    </p>
                    <p class="text-gray-600"><strong>{{ __('En retard :') }}</strong> {{ $consultation->retard ? __('Oui') : __('Non') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
