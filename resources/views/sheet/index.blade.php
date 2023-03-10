<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sheets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <p><a href="{{ route('sheet.create') }}">Créer une fiche</a></p>
                @if ($sheets->isNotEmpty())
                    <ul>
                        @foreach ($sheets as $sheet)
                                <li><a href="{{ route('sheet.show', $sheet) }}">{{ $sheet->title }} </a></li>
                                <p><a aria-labelledby="Modifier" href="{{ route('sheet.edit', ['sheet' => $sheet->id])}}">Modifier</a></p>

                                <form action="{{ route('sheet.destroy', ['sheet' => $sheet->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button aria-labelledby="Supprimer" type="submit">Supprimer</button>
                                </form>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
