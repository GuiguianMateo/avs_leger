@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 min-h-screen p-6">
        <div class="w-11/12 max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold mb-4">{{ __("Modifier une prescription") }}</h1>

            <form action="{{ route('prescription.update', $prescription->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT') <!-- Indiquer qu'il s'agit d'une méthode PUT -->

                <!-- Médicament -->
                <div>
                    <label for="medicament_id" class="block font-medium text-gray-700">{{ __("Médicament") }}</label>
                    <select name="medicament_id" id="medicament_id"
                            class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        <option value="">{{ "Veuillez sélectionner un médicament pour la prescription" }}</option>
                        @foreach($medicaments as $medicament)
                            <option value="{{ $medicament->id }}"
                                {{ old('medicament_id', $prescription->medicament_id) == $medicament->id ? 'selected' : '' }}>
                                {{ $medicament->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Quantité -->
                <div>
                    <label for="quantite" class="block font-medium text-gray-700">{{ __("Quantité de médicament") }}</label>
                    <input type="number" name="quantite" id="quantite"
                           value="{{ old('quantite', $prescription->quantite) }}"
                           class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error("quantite")
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Durée -->
                <div>
                    <label for="duree" class="block font-medium text-gray-700">{{ __("Durée du traitement (jours)") }}</label>
                    <input type="number" name="duree" id="duree"
                           value="{{ old('duree', $prescription->duree) }}"
                           class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error("duree")
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Détail -->
                <div>
                    <label for="detail" class="block font-medium text-gray-700">{{ __("Note supplémentaire") }}</label>
                    <input type="text" name="detail" id="detail"
                           value="{{ old('detail', $prescription->detail) }}"
                           class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error("detail")
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bouton -->
                <div class="text-right">
                    <button type="submit"
                            class="px-6 py-2 rounded-full bg-gradient-to-r from-green-500 to-green-700 text-white font-semibold shadow hover:from-green-600 hover:to-green-800 transition-all duration-200">
                        {{ __("Mettre à jour") }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
