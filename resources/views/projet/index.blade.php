<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projets') }}
        </h2>
    </x-slot>

    <div class="w-full mx-auto flex flex-col gap-8">
        <a href="javascript:history.go(-1)" class="btn_primary w-fit" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>Retour</a>
        <div class="flex justify-between items-center">
            <h1 class="titre_page">Sous-zone</h1>
            @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                <a href="{{ route('projet.archive') }}" class="btn_archive w-fit" title="Archives">Archives<i class="fa-solid fa-box-archive" aria-hidden="true" aria-labelledby="Archives"></i></a>
            @endif
        </div>

        {{-- VIEW --}}
        <div class="flex flex-col gap-4">
            @if ($projets->isNotEmpty())
            {{-- Barre de recherche --}}
            <form class="flex flex-col md:flex-row gap-4 md:gap-2" method="GET" action="{{ route('projet.search') }}">
                <div class="relative w-full">
                    <label for="query" id="query-label" class="absolute label_recherche">Recherche :</label>
                    <input type="text" id="query" name="query"  class="input_textarea_recherche pl-8" placeholder="Faire une recherche..." aria-labelledby="query-label">
                    <div class="absolute left-2 inset-y-0 flex items-center text-secondary-dark pb-1">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
                <button class="btn_tertiary" type="submit" aria-label="Faire une recherche">Rechercher</button>
            </form>
            @if(str_contains(url()->current(), 'search'))
            <a class="btn_primary w-fit" href="{{ route('projet.index') }}" aria-label="Supprimer la recherche" title="Supprimer la recherche">
                Supprimer la recherche</a>
            @endif
            {{-- Tableau des fiches --}}
            <ul class="border-2 border-primary rounded overflow-hidden max-h-[500px] overflow-y-scroll">
                @php
                    $bgClass = 'bg-secondary';
                @endphp

                @foreach ($projets as $index => $projet)
                <li class="{{ $bgClass }} flex flex-col gap-2 md:gap-3 items-center justify-center md:flex-row md:justify-between md:items-center min-h-12 px-3 py-[10px]">
                    {{-- textes --}}
                    <div class="flex flex-col md:flex-row items-center flex-wrap gap-1 md:gap-2">
                         <p class="font-semibold text-center md:text-left">{{ $projet->title }}</p>
                    </div>
                    {{-- btns --}}
                    <div class="flex gap-2">
                        <a class="bg-primary hover:bg-primary-dark text-white py-1 px-2 rounded" href="" aria-label="Voir les ressources du projet">Ressources</a>
                        <a class="bg-view hover:bg-view-dark text-white py-1 px-4 rounded" href="{{ route('projet.show', $projet) }}" aria-label="Voir la fiche d'amélioration"><i class="fa-solid fa-eye" aria-hidden="true"></i></a>
                        <a class="bg-edit hover:bg-edit-dark text-white py-1 px-2 rounded" href="{{ route('projet.edit', ['projet' => $projet->id])}}" aria-label="Modifier le projet"><i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></a>
                        <form action="{{ route('projet.destroy', ['projet' => $projet->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-delete hover:bg-delete-dark text-white py-1 px-2 rounded"  aria-label="Supprimer la fiche d'amélioration" type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
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

            <a href="{{ route('projet.create') }}" class="btn_primary w-full" title="Ajouter un projet"><i class="fa-solid fa-plus" aria-hidden="true"></i>Ajouter un projet</a>
        </div>
    </div>
</x-app-layout>
