@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 min-h-screen p-6">
        <div class="w-11/12 max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold mb-4">{{ __("Créer une Consultation") }}</h1>

            <form action="{{ route('consultation.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="date_consultation" class="block font-medium text-gray-700">{{ __("Date de Consultation") }}</label>
                    <input type="datetime-local" name="date_consultation" id="date_consultation"
                           class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           value="{{ old('date_consultation') }}" required>
                </div>

                <div>
                    <label for="type_id" class="block font-medium text-gray-700">{{ __("Type de Consultation") }}</label>
                    <select name="type_id" id="type_id"
                            class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                            <option value="">{{ __("Veuillez selectionner un type de consultation") }}</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="praticien_id" class="block font-medium text-gray-700">{{ __("Choisir Praticien") }}</label>
                    <select class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" name="praticien_id" id="praticien_id">
                        <option value="">{{ __("Veuillez choisir un praticien") }}</option>
                    </select>
                    @error('praticien_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <script>
                    document.getElementById('type_id').addEventListener('change', function() {
                        var typeId = this.value;
                        var selectPraticien = document.getElementById('praticien_id');
                        selectPraticien.innerHTML = '<option value="">{{ __("Veuillez choisir un praticien") }}</option>'; // Réinitialisation

                        var options = {!! json_encode($praticiens) !!};
                        var praticiensFiltres = options.filter(praticien => praticien.type_id == typeId);

                        if (praticiensFiltres.length === 0) {
                            var option = document.createElement('option');
                            option.value = "";
                            option.textContent = "{{ __("Aucun praticien disponible pour ce type") }}";
                            option.disabled = true;
                            selectPraticien.appendChild(option);
                        } else {
                            praticiensFiltres.forEach(praticien => {
                                var option = document.createElement('option');
                                option.value = praticien.id;
                                option.textContent = praticien.nom;
                                selectPraticien.appendChild(option);
                            });
                        }
                    });
                </script>


                <div>
                    <label for="user_id" class="block font-medium text-gray-700">{{ __("Nom du Patient") }}</label>
                    @if(Auth::user()->isA('admin') || Auth::user()->isA('praticien'))
                        <select name="user_id" id="user_id"
                                class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                            <option value="">{{ __("Veuillez selectionner un patient") }}</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->nom }} {{ $user->prenom }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="text" id="user_name" class="w-full mt-2 px-4 py-2 border rounded-md bg-gray-100 text-gray-700 cursor-not-allowed"
                        value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}" readonly>
                    @endif
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
