<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sheet') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p><a aria-labelledby="Retour" href="{{ route('sheet.index') }}">Retour</a></p>
            <h1>{{ $sheet->title }}</h1>
            <p>Description : {{ $sheet->description }}</p>
            <h2>Zone : {{ $sheet->area->name }}</h2>
            <p>Idée : {{ $sheet->idea }}</p>
            <p>État : {{ $sheet->state }}</p>

            <p><a aria-labelledby="Modifier" href="{{ route('sheet.edit', ['sheet' => $sheet])}}">Modifier</a></p>

            <form action="{{ route('sheet.destroy', ['sheet' => $sheet]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button aria-labelledby="Supprimer" type="submit">Supprimer</button>
            </form>

        </div>
    </div>
</x-app-layout>
