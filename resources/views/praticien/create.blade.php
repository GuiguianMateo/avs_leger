@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 min-h-screen p-6">
        <div class="w-11/12 max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold mb-4">{{ __("Ajouter un praticien") }}</h1>

            <form action="{{ route('praticien.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="nom" class="block font-medium text-gray-700">{{ __("Nom du Praticien") }}</label>

                    <input type="text" class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" name="nom">
                    @error("nom")
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="job" class="block font-medium text-gray-700">{{ __("Profession du Praticien") }}</label>

                    <input type="text" class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" name="job">
                    @error("job")
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="type_id" class="block font-medium text-gray-700">{{ __("Type de praticien") }}</label>
                    <select name="type_id" id="type_id"
                            class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                            <option value="">{{ "Veuillez selectionner un type de praticien" }}</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

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
