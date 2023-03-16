<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enseignant') }}
        </h2>
    </x-slot>

    {{-- VIEW --}}
    <div class="w-full mx-auto flex flex-col gap-7 md:gap-8">
        <a class="btn_primary w-fit" href="{{ route('teacher.index') }}" aria-label="Retour à la page précédente" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
            Retour</a>

        {{-- HEADER VIEW --}}
        <div class="flex flex-col gap-2 md:gap-0 md:flex-row md:items-center md:justify-between">
            {{-- TEXTES --}}
            <div class="flex flex-col gap-1 md:gap-2">
                <h1 class="titre_page">{{ $teacher->name }}</h1>
                @if ($teacher->permanent === 1)
                    <p>Enseignant<span class="text-tertiary font-semibold"> permanent</span></p>
                    @else
                    <p>Enseignant<span class="text-tertiary font-semibold"> non permanent</span></p>
                @endif
            </div>
            {{-- btns --}}
            <div class="flex gap-2 items-center">
                {{-- btn edit --}}
                <a class="bg-edit hover:bg-edit-dark text-white py-1 px-2 rounded w-fit h-fit" href="{{ route('teacher.edit', ['teacher' => $teacher])}}" aria-label="Modifier {{ $teacher->name }}"><i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></a>
                {{-- btn delete --}}
                <form action="{{ route('teacher.destroy', ['teacher' => $teacher]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-delete hover:bg-delete-dark text-white py-1 px-2 rounded w-fit h-fit"  aria-label="Supprimer {{ $teacher->name }}" type="submit"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>

        {{-- DEPARTEMENTS --}}
        <p><span class="font-semibold">Département : </span>{{ $teacher->department->name }}</p>

        {{-- STATUT --}}
        <p><span class="font-semibold">Statut : </span>{{ $teacher->status->name }}</p>
    </div>
</x-app-layout>
