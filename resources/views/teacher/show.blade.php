<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enseignant') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p><a aria-labelledby="Retour" href="{{ route('teacher.index') }}">Retour</a></p>
            <h1>{{ $teacher->name }}</h1>
            <p>Permanent : {{ $teacher->permanent }}</p>

            <h2>Département : {{ $teacher->department->name }}</h2>
            <h2>Statut : {{ $teacher->status->name }}</h2>

            <p><a aria-labelledby="Modifier" href="{{ route('teacher.edit', ['teacher' => $teacher])}}">Modifier</a></p>

                <form action="{{ route('teacher.destroy', ['teacher' => $teacher]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button aria-labelledby="Supprimer" type="submit">Supprimer</button>
                </form>
        </div>

    </div>
</x-app-layout>
