<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fiche d'amélioration') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p><a aria-labelledby="Retour" href="{{ route('sheet.index') }}">Retour</a></p>
            <h1>{{ $sheet->title }}</h1>
            <p>Description : {{ $sheet->description }}</p>
            <h2>Zone : {{ $sheet->area->name }}</h2>
            <p>Idée : {{ $sheet->idea }}</p>
            <p>État : {{ $sheet->state->name }}</p>

            <h2>enseignant(s) assigné :</h2>
            @foreach ($sheet->teachers as $teacher)
            <ul>
                <li><a href="{{route('teacher.show', ['teacher' => $teacher])}}">{{$teacher->name}}</a></li>
            </ul>
            @endforeach

            <p><a aria-labelledby="Modifier" href="{{ route('sheet.edit', ['sheet' => $sheet])}}">Modifier</a></p>

            <form action="{{ route('sheet.destroy', ['sheet' => $sheet]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button aria-labelledby="Supprimer" type="submit">Supprimer</button>
            </form>

        </div>
    </div>
</x-app-layout>
