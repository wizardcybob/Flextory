<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fiches') }}
        </h2>
    </x-slot>

    <div class="w-full mx-auto flex flex-col gap-8">
        <a href="javascript:history.go(-1)" class="btn_primary w-fit" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>Retour</a>
        <h1 class="titre_page">Fiches d'améliorations <span class="font-light">- archivées</span></h1>

        {{-- VIEW --}}
        <div class="flex flex-col gap-4">
            {{-- Barre de recherche + filtres --}}
            <form method="GET" action="{{ route('sheet.search') }}">
                <div class="flex flex-col gap-4">
                    {{-- BARRE DE RECHERCHE --}}
                    <div class="relative w-full">
                        <label for="query" id="query-label" class="absolute label_recherche">Recherche :</label>
                        <input type="text" id="query" name="query"  class="input_textarea_recherche pl-10" placeholder="Faire une recherche..." aria-labelledby="query-label">
                        <div class="absolute left-3 inset-y-0 flex items-center text-secondary pb-1">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                    {{-- FILTRE CATEGORIE --}}
                    <div class="relative w-full">
                        <label for="category" id="category-label" class="label_form">Filtrer par catégorie :</label>
                        <div class="flex flex-wrap gap-x-6 gap-y-1">
                            @foreach($categories as $category)
                                <div class="flex items-center">
                                    <input type="checkbox" class="checkbox_form" id="category{{ $category->id }}" name="categories[]" value="{{ $category->id }}">
                                    <label for="category{{ $category->id }}" class="ml-2">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- FILTRE STATUT FICHE --}}
                    <div class="relative w-full">
                        <label for="state" id="state-label" class="label_form">Filtrer par état d'avancement :</label>
                        <div class="flex flex-wrap gap-x-6 gap-y-1">
                            @foreach($states as $state)
                                <div class="flex items-center">
                                    <input type="checkbox" class="checkbox_form" id="state{{ $state->id }}" name="states[]" value="{{ $state->id }}">
                                    <label for="state{{ $state->id }}" class="ml-2">{{ $state->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button class="btn_tertiary w-fit" type="submit" aria-label="Faire une recherche">Rechercher</button>
                </div>
            </form>
            @if(str_contains(url()->current(), 'search'))
            <a class="text-error w-fit flex items-center gap-2 font-semibold" href="{{ route('sheet.index') }}" aria-label="Supprimer la recherche" title="Supprimer la recherche">
                <i class="fa-solid fa-xmark"></i> Supprimer la recherche</a>
            @endif

            @if ($sheets->isNotEmpty())
            {{-- Tableau des fiches --}}
            <ul class="border-2 border-primary rounded overflow-hidden max-h-[500px] overflow-y-scroll">
                @php
                    $bgClass = 'bg-secondary';
                @endphp
                @foreach ($sheets->sortBy('id') as $index => $sheet)
                    <li class="{{ $bgClass }} flex flex-col gap-2 md:gap-3 items-center justify-center md:flex-row md:justify-between md:items-center min-h-12 px-3 py-[10px]">
                        {{-- textes --}}
                        <div class="flex flex-col md:flex-row items-center flex-wrap gap-1 md:gap-2">
                            <p class="font-semibold text-center md:text-left">N°{{ $sheet->id }} - {{ $sheet->title }}</p>
                            <p>&#40;{{ $sheet->area->name }} / {{ $sheet->category->name }}&#41;</p>
                        </div>
                        {{-- all btns --}}
                        <div class="flex flex-col md:flex-row items-center gap-2">
                            {{-- état de la fiche --}}
                            @if ($sheet->state->id == 1)
                                <div class="bg-status-to_do text-white px-2 py-1 rounded flex items-center text-center gap-3 justify-center capitalize border-none whitespace-nowrap" aria-label="Fiche à traiter">à traiter</div>
                            @elseif ($sheet->state->id == 2)
                                <div class="bg-status-in_progress text-white px-2 py-1 rounded flex items-center text-center gap-3 justify-center capitalize border-none whitespace-nowrap" aria-label="Fiche en cours">en cours</div>
                            @elseif ($sheet->state->id == 3)
                                <div class="bg-status-done text-white px-2 py-1 rounded flex items-center text-center gap-3 justify-center capitalize border-none whitespace-nowrap" aria-label="Fiche terminée">terminée</div>
                            @elseif ($sheet->state->id == 4)
                                <div class="bg-status-archive text-white px-2 py-1 rounded flex items-center text-center gap-3 justify-center capitalize border-none whitespace-nowrap" aria-label="Fiche archivée">archivée</div>
                            @endif
                            {{-- btns --}}
                            <div class="flex gap-2">
                                {{-- <a class="bg-view hover:bg-view-dark text-white py-1 px-4 rounded" href="{{ route('sheet.show', $sheet) }}" aria-label="Voir la fiche d'amélioration"><i class="fa-solid fa-eye" aria-hidden="true"></i></a> --}}
                                <a class="bg-restore hover:bg-restore-dark text-white py-1 px-2 rounded" href="{{ route('sheet.restore', ['sheet' => $sheet->id])}}" aria-label="Restaurer la fiche d'amélioration"><i class="fa-solid fa-arrow-rotate-left" aria-hidden="true"></i></a>
                                <form action="{{ route('sheet.forcedelete', ['sheet' => $sheet->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-delete hover:bg-delete-dark text-white py-1 px-2 rounded"  aria-label="Supprimer la fiche d'amélioration" type="submit"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                                </form>
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
        </div>
    </div>
</x-app-layout>
