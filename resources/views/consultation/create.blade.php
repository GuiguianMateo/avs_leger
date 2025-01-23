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
                            <option value="">{{ "Veuillez selectionner un type de consultation" }}</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="user_id" class="block font-medium text-gray-700">{{ __("Nom du Client") }}</label>
                    @if(Auth::user()->isA('admin') || Auth::user()->isA('praticien'))
                        <select name="user_id" id="user_id"
                                class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                            <option value="">{{ "Veuillez selectionner un client" }}</option>
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

                <div>
                    <label for="praticien_id" class="block font-medium text-gray-700">{{ __("Praticien") }}</label>
                    <select name="praticien_id" id="praticien_id"
                            class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                            <option value="">{{ "Veuillez selectionner un praticien" }}</option>
                        @foreach($praticiens as $praticien)
                            <option value="{{ $praticien->id }}" {{ old('praticien_id') == $praticien->id ? 'selected' : '' }}>
                                {{ $praticien->nom }}
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
