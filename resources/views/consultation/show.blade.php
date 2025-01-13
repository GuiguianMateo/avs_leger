@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 p-6 min-h-screen">
        <div class="w-11/12 max-w-6xl mx-auto bg-white rounded-lg shadow-md p-6 mt-6">
            <!-- En-tête -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-extrabold text-gray-800">{{ __("Détails de la Consultation") }}</h1>
                @if ($consultation->statu != 'attente')
                    <a class="p-3 px-6 rounded-full bg-gradient-to-r from-gray-400 to-gray-600 text-white font-semibold shadow hover:from-gray-500 hover:to-gray-700 transition-all duration-200"
                        href="{{ route('consultation.index') }}">{{ __("Retour") }}</a>
                @else
                    <a class="p-3 px-6 rounded-full bg-gradient-to-r from-gray-400 to-gray-600 text-white font-semibold shadow hover:from-gray-500 hover:to-gray-700 transition-all duration-200"
                        href="{{ route('consultation.demande') }}">{{ __("Retour") }}</a>
                @endif
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

            <div class="mt-6 flex justify-between items-center">
                <!-- Autres Informations -->
                <div class="flex-1 bg-gray-50 border border-gray-200 rounded-lg p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Autres Informations') }}</h2>
                    <p class="text-gray-600">
                        <strong>{{ __('Statut :') }}</strong>
                        <span class="{{ $consultation->statu === 'valide' ? 'text-green-500' : ($consultation->statu === 'rejete' ? 'text-red-500' : 'text-yellow-500') }}">
                            {{ ucfirst($consultation->statu) }}
                        </span>
                    </p>
                    <p class="text-gray-600">
                        <strong>{{ __('En retard :') }}</strong>
                        <span>{{ $consultation->retard ? __('Oui') : __('Non') }}</span>
                    </p>
                </div>

                <!-- Bouton Ajouter une Prescription -->
                <div class="flex-none ml-4">
                    <a class="p-3 px-6 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 text-white font-semibold shadow hover:from-blue-500 hover:to-blue-700 transition-all duration-200"
                        href="{{ route('prescription.index', ['consultation' => $consultation->id]) }}">
                        {{ __("Ajouter une Prescription") }}
                    </a>
                </div>
            </div>

            <!-- Prescriptions -->
            <h1 class="text-xl font-extrabold text-gray-800 mt-6">{{ __("Prescriptions") }}</h1>

            <div class="overflow-hidden rounded-lg border border-gray-300 shadow-sm mt-6">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gradient-to-r from-gray-200 to-gray-300">
                        <tr class="text-gray-800">
                            <th class="py-3 px-4 border-b">Nom medic</th>
                            <th class="py-3 px-4 border-b">Id prescription</th>
                            <th class="py-3 px-4 border-b">consultation id</th>
                            <th class="py-3 px-4 border-b">duree</th>
                            <th class="py-3 px-4 border-b text-center">quantite</th>
                            <th class="py-3 px-4 border-b text-center">ratio</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($prescriptions as $prescription)
                            @if($prescription->consultation_id === $consultation->id)
                                <tr class="hover:bg-gray-50 transition-all duration-150">
                                    <td class="py-3 px-4">{{ $prescription->medicament->nom }}</td>
                                    <td class="py-3 px-4">{{ $prescription->id }}</td>
                                    <td class="py-3 px-4">{{ $prescription->consultation->id }}</td>
                                    <td class="py-3 px-4">{{ $prescription->duree }}</td>
                                    <td class="py-3 px-4">{{ $prescription->quantite }}</td>
                                    <td class="py-3 px-4">{{ $prescription->ratio }}</td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="5" class="py-6 px-4 text-center text-gray-500">{{ __('Aucune prescription trouvée.') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
