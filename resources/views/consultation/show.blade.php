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
                    <p class="text-gray-600"><strong>{{ __('Nom') }} :</strong> {{ $consultation->user->nom }}</p>
                    <p class="text-gray-600"><strong>{{ __('Prénom') }} :</strong> {{ $consultation->user->prenom }}</p>
                </div>

                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Informations de la Consultation') }}</h2>
                    <p class="text-gray-600"><strong>{{ __('Date') }} :</strong> {{ $consultation->date_consultation }}</p>
                    <p class="text-gray-600"><strong>{{ __('Type') }} :</strong> {{ $consultation->type->nom }}</p>
                    <p class="text-gray-600"><strong>{{ __('Praticien') }} :</strong> {{ $consultation->praticien->nom }}</p>
                </div>
            </div>

            <!-- Autres Informations -->
            <div class="flex-1 bg-gray-50 border border-gray-200 rounded-lg p-6 mt-6 shadow-sm">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Autres Informations') }}</h2>
                <p class="text-gray-600">
                    <strong>{{ __('Statut') }} :</strong>
                    <span class="{{ $consultation->statu === 'valide' ? 'text-green-500' : ($consultation->statu === 'rejete' ? 'text-red-500' : 'text-yellow-500') }}">
                        {{ ucfirst($consultation->statu) }}
                    </span>
                </p>
                <p class="text-gray-600">
                    <strong>{{ __('En retard') }} :</strong>
                    <span>{{ $consultation->retard ? __('Oui') : __('Non') }}</span>
                </p>
            </div>

            @if($consultation->statu == 'valide')
                <!-- Prescriptions -->
                <div class="flex justify-between items-center my-6">

                    <h1 class="text-xl font-extrabold text-gray-800">{{ __("Prescriptions") }}</h1>

                    @if(Auth::user()->isA('admin') || Auth::user()->isA('praticien'))
                        <div class="flex-none ml-4">
                            <a class="p-3 px-6 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 text-white font-semibold shadow hover:from-blue-500 hover:to-blue-700 transition-all duration-200"
                                href="{{ route('prescription.create', ['consultation' => $consultation->id]) }}">
                                {{ __("Ajouter une Prescription") }}
                            </a>
                        </div>
                    @endif

                </div>

                <div class="overflow-hidden rounded-lg border border-gray-300 shadow-sm mt-6">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gradient-to-r from-gray-200 to-gray-300">
                            <tr class="text-gray-800">
                                <th class="py-3 px-4 border-b">{{ __("Médicament") }}</th>
                                <th class="py-3 px-4 border-b">{{ __("Début traitement") }}</th>
                                <th class="py-3 px-4 border-b text-center">{{ __("Quantité") }}</th>
                                <th class="py-3 px-4 border-b text-center">{{ __("Durée") }}</th>
                                <th class="py-3 px-4 border-b text-center">{{ __("posologie") }}</th>
                                <th class="py-3 px-4 border-b text-center">{{ __("Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($prescriptions as $prescription)
                                @if($prescription->consultation_id === $consultation->id)
                                    <tr class="hover:bg-gray-50 transition-all duration-150">
                                        <td class="py-3 px-4">{{ $prescription->medicament->nom }}</td>
                                        <td class="py-3 px-4">{{ $prescription->created_at ? $prescription->created_at->format('d/m/Y') : __('Aucune info recensée') }}</td>
                                        <td class="py-3 px-4 text-center">{{ $prescription->quantite }}</td>
                                        <td class="py-3 px-4 text-center">{{ $prescription->duree }} {{ __("jours") }}</td>
                                        <td class="py-3 px-4 text-center">{{ $prescription->posologie }}</td>
                                        <td class="py-3 px-4 text-center">
                                            <div class="inline-flex gap-2">
                                                @if ($prescription->deleted_at === null)
                                                    <a class="px-3 py-2 rounded bg-orange-500 text-white shadow hover:bg-orange-600 transition-all duration-200"
                                                    href="{{ route('prescription.edit', $prescription) }}">{{ __("Modifier") }}</a>
                                                    <form action="{{ route('prescription.destroy', $prescription) }}" method="post" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="px-3 py-2 rounded bg-red-500 text-white shadow hover:bg-red-600 transition-all duration-200">
                                                            {{ __("Supprimer") }}
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('prescription.restore', $prescription) }}" method="post" class="inline">
                                                        @csrf
                                                        @method('GET')
                                                        <button type="submit"
                                                                class="px-3 py-2 rounded bg-purple-500 text-white shadow hover:bg-purple-600 transition-all duration-200">
                                                            {{ __("Restaurer") }}
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="6" class="py-6 px-4 text-center text-gray-500">{{ __('Aucune prescription trouvée.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
