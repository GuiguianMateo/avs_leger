@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 min-h-screen p-6">
        <div class="w-11/12 max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold mb-4">{{ __("Modifier la Consultation") }}</h1>

            <form action="{{ route('consultation.update', $consultation) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="date_consultation" class="block font-medium text-gray-700">{{ __("Date de Consultation") }}</label>
                    <input type="date" name="date_consultation" id="date_consultation"
                           class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           value="{{ old('date_consultation', $consultation->date_consultation) }}" required>
                </div>

                <div>
                    <label for="retard" class="block font-medium text-gray-700">{{ __("Retard") }}</label>
                    <select name="retard" id="retard"
                            class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        <option value="0" {{ old('retard', $consultation->retard) == '0' ? 'selected' : '' }}>{{ __("Non") }}</option>
                        <option value="1" {{ old('retard', $consultation->retard) == '1' ? 'selected' : '' }}>{{ __("Oui") }}</option>
                    </select>
                </div>

                <div>
                    <label for="statu" class="block font-medium text-gray-700">{{ __("Statut") }}</label>
                    <select name="statu" id="statu"
                            class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        @foreach(['attente', 'valide', 'rejete'] as $status)
                            <option value="{{ $status }}" {{ old('statu', $consultation->statu) == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="type_id" class="block font-medium text-gray-700">{{ __("Type de Consultation") }}</label>
                    <select name="type_id" id="type_id"
                            class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id', $consultation->type_id) == $type->id ? 'selected' : '' }}>
                                {{ $type->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="user_id" class="block font-medium text-gray-700">{{ __("Nom du Client") }}</label>
                    <select name="user_id" id="user_id"
                            class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $consultation->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->nom }} {{ $user->prenom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="praticien_id" class="block font-medium text-gray-700">{{ __("Praticien") }}</label>
                    <select name="praticien_id" id="praticien_id"
                            class="w-full mt-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        @foreach($praticiens as $praticien)
                            <option value="{{ $praticien->id }}" {{ old('praticien_id', $consultation->praticien_id) == $praticien->id ? 'selected' : '' }}>
                                {{ $praticien->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

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
