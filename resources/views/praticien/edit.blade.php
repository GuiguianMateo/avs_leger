@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 min-h-screen p-6">
        <div class="w-11/12 max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold mb-4">{{ __("Modifier un praticien") }}</h1>

            <form action="{{ route('praticien.update', $praticien->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="nom" class="block font-medium text-gray-700">{{ __("Nom du Praticien") }}</label>

                    <input type="text" class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" name="nom" value="{{ $praticien->nom }}">
                    @error("nom")
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="job" class="block font-medium text-gray-700">{{ __("Profession du Praticien") }}</label>

                    <input type="text" class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" name="job" value="{{ $praticien->job }}">
                    @error("job")
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="type_id" class="block font-medium text-gray-700">{{ __("Type de praticien") }}</label>
                    <select name="type_id" id="type_id"
                            class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id', $praticien->type_id) == $type->id ? 'selected' : '' }}>
                                {{ $type->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Bouton -->
                <div class="text-right">
                    <button type="submit"
                            class="px-6 py-2 rounded-full bg-gradient-to-r from-blue-500 to-blue-700 text-white font-semibold shadow hover:from-blue-600 hover:to-blue-800 transition-all duration-200">
                        {{ __("Modifier") }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
