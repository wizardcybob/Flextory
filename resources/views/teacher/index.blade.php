<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enseignants') }}
        </h2>
    </x-slot>

    <div class="w-full mx-auto flex flex-col gap-8">
        <a href="{{ route('user.index') }}" class="btn_primary w-fit" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>Retour</a>
        <h1 class="titre_page">Enseignants</h1>

        <div class="flex flex-col gap-4">
            @if ($teachers->isNotEmpty())
            <ul class="border-2 border-primary rounded overflow-hidden max-h-[500px] overflow-y-scroll">
                @php
                    $bgClass = 'bg-secondary';
                @endphp

                @foreach ($teachers as $index => $teacher)
                    <li class="{{ $bgClass }} flex flex-col gap-2 md:gap-3 items-center justify-center md:flex-row md:justify-between md:items-center min-h-12 px-3 py-[10px]">
                        {{-- textes --}}
                        <div class="flex flex-col md:flex-row items-center flex-wrap gap-1 md:gap-2">
                            <p class="font-semibold text-center md:text-left">{{ $teacher->name }}</p>
                        </div>
                        {{-- all btns --}}
                        <div class="flex flex-row items-center gap-2">
                            <div class="flex gap-2">
                                {{-- btn view --}}
                                <a class="bg-view hover:bg-view-dark text-white py-1 px-4 rounded w-fit h-fit" href="{{ route('teacher.show', $teacher) }}" aria-label="Voir les informations de {{ $teacher->name }}"><i class="fa-solid fa-eye" aria-hidden="true"></i></a>
                                {{-- btn edit --}}
                                <a class="bg-edit hover:bg-edit-dark text-white py-1 px-2 rounded w-fit h-fit" href="{{ route('teacher.edit', ['teacher' => $teacher->id])}}" aria-label="Modifier {{ $teacher->name }}"><i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></a>
                                {{-- btn delete --}}
                                @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                                    <form action="{{ route('teacher.destroy', ['teacher' => $teacher->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-delete hover:bg-delete-dark text-white py-1 px-2 rounded w-fit h-fit" aria-label="Supprimer {{ $teacher->name }}" type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                @endif

                            </div>
                        </div>
                    </li>
                    @php
                        $bgClass = ($bgClass == 'bg-secondary') ? 'bg-secondary-light' : 'bg-secondary';
                    @endphp
                @endforeach
            </ul>
            @else
                <div class="border-2 border-primary rounded overflow-hidden min-h-[200px] flex justify-center items-center">
                    <p class="text-xl font-semibold text-tertiary">Aucun résultat :(</p>
                </div>
            @endif



            <a href="{{ route('teacher.create') }}" class="btn_primary w-full" title="Ajouter un enseignant"><i class="fa-solid fa-plus" aria-hidden="true"></i>Ajouter un enseignant</a>
        </div>
    </div>
</x-app-layout>
