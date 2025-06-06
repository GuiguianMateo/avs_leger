@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 p-6 min-h-screen">
        @if (session('message'))
            <div class="alert mt-4 p-4 rounded-lg shadow-md
                        @if(session('message')['type'] === 'success')
                            bg-green-50 text-green-800 border border-green-400
                        @elseif(session('message')['type'] === 'error')
                            bg-red-50 text-red-800 border border-red-400
                        @else
                            bg-gray-50 text-gray-800 border border-gray-300
                        @endif">
                {{ session('message')['text'] }}
            </div>
        @endif
        <div class="w-11/12 max-w-6xl mx-auto bg-white rounded-lg shadow-md p-6 mt-6">
            <div class="flex justify-center items-center mb-6">
                <h1 class="text-3xl font-extrabold text-gray-800">{{ __("Liste des Demandes") }}</h1>
            </div>

            <div class="overflow-hidden rounded-lg border border-gray-300 shadow-sm">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gradient-to-r from-gray-200 to-gray-300">
                        <tr class="text-gray-800">
                            <th class="py-3 px-4 border-b">{{ __("Nom Patient") }}</th>
                            <th class="py-3 px-4 border-b">{{ __("Prénom Patient") }}</th>
                            <th class="py-3 px-4 border-b">{{ __("Date de Consultation") }}</th>
                            <th class="py-3 px-4 border-b">{{ __("Statut") }}</th>
                            <th class="py-3 px-4 border-b text-center">{{ __("Actions") }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($consultations as $consultation)
                            @if(Auth::user()->isA('admin') || Auth::user()->isA('praticien') || Auth::user()->id === $consultation->user_id)
                                @if($consultation->statu == 'attente')
                                    <tr class="hover:bg-gray-50 transition-all duration-150">
                                        <td class="py-3 px-4">{{ $consultation->user->nom }}</td>
                                        <td class="py-3 px-4">{{ $consultation->user->prenom }}</td>
                                        <td class="py-3 px-4">{{ $consultation->date_consultation }}</td>
                                        <td class="py-3 px-4">{{ __("$consultation->statu") }}</td>
                                        <td class="py-3 px-4 text-center">
                                            <div class="inline-flex gap-2">
                                                <a class="px-3 py-2 rounded bg-blue-500 text-white shadow hover:bg-blue-600 transition-all duration-200"
                                                href="{{ route('consultation.show', $consultation) }}">{{ __("Détails") }}</a>
                                                @if(Auth::user()->isA('admin') || Auth::user()->isA('praticien'))
                                                    <form action="{{ route('consultation.statu', $consultation) }}" method="post">
                                                        @csrf
                                                        @method('get')
                                                        <input type="hidden" name="statu" value="valide">
                                                        <button type="submit" class="px-3 py-2 rounded bg-green-500 text-white shadow hover:bg-green-600 transition-all duration-200">{{ __("Valider") }}</button>
                                                    </form>
                                                    <form action="{{ route('consultation.statu', $consultation) }}" method="post">
                                                        @csrf
                                                        @method('get')
                                                        <input type="hidden" name="statu" value="rejete">
                                                        <button type="submit" class="px-3 py-2 rounded bg-red-500 text-white shadow hover:bg-red-600 transition-all duration-200">{{ __("Rejeter") }}</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @empty
                            <tr>
                                <td colspan="5" class="py-6 px-4 text-center text-gray-500">{{ __('Aucune demante trouvée.') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
