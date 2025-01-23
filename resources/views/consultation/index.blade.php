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
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-extrabold text-gray-800">{{ __("Liste des Consultations") }}</h1>
                <a class="p-3 px-6 rounded-full bg-gradient-to-r from-green-400 to-green-600 text-white font-semibold shadow hover:from-green-500 hover:to-green-700 transition-all duration-200"
                   href="{{ route('consultation.create') }}">{{ __("Créer une Consultation") }}</a>
            </div>

            <div class="overflow-hidden rounded-lg border border-gray-300 shadow-sm">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gradient-to-r from-gray-200 to-gray-300">
                        <tr class="text-gray-800">
                            <th class="py-3 px-4 border-b">Nom Client</th>
                            <th class="py-3 px-4 border-b">Prenom Client</th>
                            <th class="py-3 px-4 border-b">Date de Consultation</th>
                            <th class="py-3 px-4 border-b">Statu</th>
                            <th class="py-3 px-4 border-b text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($consultations as $consultation)
                            @if(Auth::user()->isA('admin') || Auth::user()->isA('praticien') || Auth::user()->id === $consultation->user_id)
                                @if($consultation->statu != 'attente')
                                    <tr class="hover:bg-gray-50 transition-all duration-150">
                                        <td class="py-3 px-4">{{ $consultation->user->nom }}</td>
                                        <td class="py-3 px-4">{{ $consultation->user->prenom }}</td>
                                        <td class="py-3 px-4">{{ $consultation->date_consultation }}</td>
                                        <td class="py-3 px-4">{{ $consultation->statu }}</td>
                                        <td class="py-3 px-4 text-center">
                                            <div class="inline-flex gap-2">
                                                @if ($consultation->deleted_at === null)
                                                    <a class="px-3 py-2 rounded bg-blue-500 text-white shadow hover:bg-blue-600 transition-all duration-200"
                                                    href="{{ route('consultation.show', $consultation) }}">{{ __("Détails") }}</a>
                                                @endif
                                                @if(Auth::user()->isA('admin') || Auth::user()->isA('praticien'))
                                                    @if ($consultation->deleted_at === null)
                                                        <a class="px-3 py-2 rounded bg-orange-500 text-white shadow hover:bg-orange-600 transition-all duration-200"
                                                           href="{{ route('consultation.edit', $consultation) }}">{{ __("Modifier") }}</a>
                                                        <form action="{{ route('consultation.destroy', $consultation) }}" method="post" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="px-3 py-2 rounded bg-red-500 text-white shadow hover:bg-red-600 transition-all duration-200">
                                                                {{ __("Supprimer") }}
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('consultation.restore', $consultation) }}" method="post" class="inline">
                                                            @csrf
                                                            @method('GET')
                                                            <button type="submit"
                                                                    class="px-3 py-2 rounded bg-purple-500 text-white shadow hover:bg-purple-600 transition-all duration-200">
                                                                {{ __("Restaurer") }}
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @empty
                            <tr>
                                <td colspan="5" class="py-6 px-4 text-center text-gray-500">{{ __('Aucune consultation trouvée.') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
