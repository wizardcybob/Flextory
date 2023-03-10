<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enseignant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <p><a aria-labelledby="Créer un nouvel enseignant" href="{{ route('teacher.create') }}">Créer un nouvel enseignant</a></p>

                @if ($teachers->isNotEmpty())
                    <ul>
                        @foreach ($teachers as $teacher)
                                <li><a href="{{ route('teacher.show', $teacher) }}">{{ $teacher->name }}</a></li>
                                <p><a aria-labelledby="Modifier" href="{{ route('teacher.edit', ['teacher' => $teacher->id])}}">Modifier</a></p>

                                <form action="{{ route('teacher.destroy', ['teacher' => $teacher->id]) }}" method="POST">
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
