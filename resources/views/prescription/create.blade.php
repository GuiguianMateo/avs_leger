@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 min-h-screen p-6">
        <div class="w-11/12 max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold mb-4">{{ __("Ajouter une Prescription") }}</h1>

            <form action="{{ route('prescription.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="medicament_id" class="block font-medium text-gray-700">{{ __("Médicament") }}</label>
                    <select name="medicament_id" id="medicament_id"
                            class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                            <option value="">{{ __("Veuillez selectionner un medicament pour la prescription") }}</option>
                        @foreach($medicaments as $medicament)
                            <option value="{{ $medicament->id }}" {{ old('medicament_id') == $medicament->id ? 'selected' : '' }}>
                                {{ $medicament->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="quantite" class="block font-medium text-gray-700">{{ __("Quantité de médicament") }}</label>

                    <input type="number" aria-valuemin="0" aria-valuemax="90" class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" name="quantite">
                    @error("quantite")
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="duree" class="block font-medium text-gray-700">{{ __("Durée du traitement (jours)") }}</label>

                    <input type="number" aria-valuemin="0" aria-valuemax="30" class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" name="duree">
                    @error("duree")
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label for="detail" class="block font-medium text-gray-700">{{ __("Note supplémentaire") }}</label>

                    <input type="text" aria-valuemin="0" aria-valuemax="90" class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" name="detail">
                    @error("detail")
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <input type="hidden" name="consultation_id" value="{{ $consultation->id }}">

                <!-- Bouton -->
                <div class="text-right">
                    <button type="submit"
                            class="px-6 py-2 rounded-full bg-gradient-to-r from-green-500 to-green-700 text-white font-semibold shadow hover:from-green-600 hover:to-green-800 transition-all duration-200">
                        {{ __("Créer") }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
