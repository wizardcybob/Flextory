<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Étudiant') }}
        </h2>
    </x-slot>

    {{-- VIEW --}}
    <div class="w-full mx-auto flex flex-col gap-7 md:gap-8">
        <a class="btn_primary w-fit" href="{{ route('student.index') }}" aria-label="Retour à la page précédente" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
            Retour</a>

        {{-- HEADER VIEW --}}
        <div class="flex flex-col gap-2 md:gap-0 md:flex-row md:items-center md:justify-between">
            {{-- TEXTES --}}
            <div class="flex flex-col gap-1 md:gap-2">
                <h1 class="titre_page">{{ $student->name }}</h1>
                @if ($student->actif === 1)
                    <p>Étudiant<span class="text-tertiary font-semibold"> actif</span></p>
                @else
                    <p>Étudiant<span class="text-tertiary font-semibold"> inactif</span></p>
                @endif
            </div>
            {{-- btns --}}
            <div class="flex gap-2">
                {{-- btn edit --}}
                <a class="bg-edit hover:bg-edit-dark text-white py-1 px-2 rounded w-fit h-fit" href="{{ route('student.edit', ['student' => $student])}}" aria-label="Modifier {{ $student->name }}"><i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></a>
                {{-- btn delete --}}
                <form action="{{ route('student.destroy', ['student' => $student]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-delete hover:bg-delete-dark text-white py-1 px-2 rounded w-fit h-fit"  aria-label="Supprimer {{ $student->name }}" type="submit"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>

        {{-- PROJET ASSIGNE --}}
        <div class="flex flex-col gap-2">
            <h2 class="font-semibold">Projet(s) assigné :</h2>
            @if ($student->projets->isEmpty())
                <p class="text-sm text-tertiary">Aucun projet assigné</p>
            @else
                <div class="flex flex-wrap gap-4">
                    @foreach ($student->projets as $projet)
                    <a class="btn_primary w-fit" aria-label="{{ $projet->title }}" title="{{ $projet->title }}" href="{{ route('projet.show', ['projet' => $projet]) }}">{{ $projet->title }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
