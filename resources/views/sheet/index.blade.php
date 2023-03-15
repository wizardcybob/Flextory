<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fiches') }}
        </h2>
    </x-slot>

    {{-- VIEW --}}
    <div class="w-full mx-auto flex flex-col gap-8">
        <div class="flex flex-col md:flex-row gap-8 md:gap-0 w-full justify-between items-start md:items-center">
            <h1 class="titre_page">Fiches d'amélioration</h1>
            @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                <a href="{{ route('sheet.archive') }}" class="btn_archive w-fit" title="Archives">Archives<i class="fa-solid fa-box-archive" aria-hidden="true" aria-labelledby="Archives"></i></a>
            @endif
        </div>
        <a href="javascript:history.go(-1)" class="btn_primary w-fit" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>Retour</a>

        <div class="flex flex-col gap-4">
            @if ($sheets->isNotEmpty())
            {{-- Barre de recherche + filtres --}}
            <form class="flex flex-col md:flex-row gap-4 md:gap-2" method="GET" action="{{ route('sheet.search') }}">
                <div class="relative w-full">
                    <label for="query" id="query-label" class="absolute label_recherche">Recherche :</label>
                    <input type="text" id="query" name="query"  class="input_textarea_recherche pl-9" placeholder="Faire une recherche..." aria-labelledby="query-label">
                    <div class="absolute left-3 inset-y-0 flex items-center text-secondary pb-1">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
                <div class="relative w-full">
                    <label for="category" id="category-label" class="absolute label_form">Filtrer par catégorie :</label>
                        <option value="" selected disabled hidden>Sélectionner une catégorie</option>
                        @foreach($categories as $category)
                            <input type="checkbox" id="category{{ $category->id }}" name="categories[]" value="{{ $category->id }}">
                            <label for="category{{ $category->id }}" class="ml-2">{{ $category->name }}</label>
                        @endforeach
                </div>
                <div class="relative w-full">
                    <label for="state" id="state-label" class="absolute label_form">Filtrer par état d'avancement :</label>
                    @foreach($states as $state)
                        <div class="flex items-center">
                            <input type="checkbox" id="state{{ $state->id }}" name="states[]" value="{{ $state->id }}">
                            <label for="state{{ $state->id }}" class="ml-2">{{ $state->name }}</label>
                        </div>
                    @endforeach
                </div>
                <button class="btn_tertiary" type="submit" aria-label="Faire une recherche">Rechercher</button>
            </form>
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
                            <p class="text-center">&#40;{{ $sheet->area->name }} / {{ $sheet->category->name }}&#41;</p>
                        </div>
                        {{-- all btns --}}
                        <div class="flex flex-row items-center gap-2">
                            {{-- état de la fiche --}}
                            @if ($sheet->state->name == "À traiter")
                                <div class="bg-status-to_do text-white px-2 py-1 rounded flex items-center text-center gap-3 justify-center border-none whitespace-nowrap" aria-label="Fiche à traiter">À traiter</div>
                            @elseif ($sheet->state->name == "En cours")
                                <div class="bg-status-in_progress text-white px-2 py-1 rounded flex items-center text-center gap-3 justify-center border-none whitespace-nowrap" aria-label="Fiche en cours">En cours</div>
                            @elseif ($sheet->state->name == "Terminé")
                                <div class="bg-status-done text-white px-2 py-1 rounded flex items-center text-center gap-3 justify-center border-none whitespace-nowrap" aria-label="Fiche terminée">Terminée</div>
                            @endif
                            {{-- select état de la fiche --}}
                            {{-- @if ($sheet->state->id == 1)
                                <select class="bg-status-to_do text-white px-2 py-1 rounded flex items-center text-center gap-3 cursor-pointer justify-center capitalize border-none" name="state" id="state-select" onchange="location = this.value;">
                            @elseif ($sheet->state->id == 2)
                                <select class="bg-status-in_progress text-white px-2 py-1 rounded flex items-center text-center gap-3 cursor-pointer justify-center capitalize border-none" name="state" id="state-select" onchange="location = this.value;">
                            @elseif ($sheet->state->id == 3)
                                <select class="bg-status-done text-white px-2 py-1 rounded flex items-center text-center gap-3 cursor-pointer justify-center capitalize border-none" name="state" id="state-select" onchange="location = this.value;">
                            @elseif ($sheet->state->id == 4)
                                <select class="bg-status-archive text-white px-2 py-1 rounded flex items-center text-center gap-3 cursor-pointer justify-center capitalize border-none" name="state" id="state-select" onchange="location = this.value;">
                            @endif
                                <option value="{{ route('sheet.index') }}" @if ($sheet->state->id == null) selected @endif disabled>---------------</option>
                                <option value="{{ route('sheet.index', ['state' => 1]) }}" @if ($sheet->state->id == 1) selected @endif class="capitalize bg-white text-primary-dark">
                                    à traiter
                                </option>
                                <option value="{{ route('sheet.index', ['state' => 2]) }}" @if ($sheet->state->id == 2) selected @endif class="capitalize bg-white text-primary-dark">
                                    en cours
                                </option>
                                <option value="{{ route('sheet.index', ['state' => 3]) }}" @if ($sheet->state->id == 3) selected @endif class="capitalize bg-white text-primary-dark">
                                    terminée
                                </option>
                                <option value="{{ route('sheet.index', ['state' => 4]) }}" @if ($sheet->state->id == 4) selected @endif class="capitalize bg-white text-primary-dark">
                                    archivée
                                </option>
                            </select> --}}
                            {{-- btns --}}
                            <div class="flex gap-2">
                                {{-- btn view --}}
                                <a class="bg-view hover:bg-view-dark text-white py-1 px-4 rounded w-fit h-fit" href="{{ route('sheet.show', $sheet) }}" aria-label="Voir la fiche d'amélioration"><i class="fa-solid fa-eye" aria-hidden="true"></i></a>
                                {{-- btn edit --}}
                                <a class="bg-edit hover:bg-edit-dark text-white py-1 px-2 rounded w-fit h-fit" href="{{ route('sheet.edit', ['sheet' => $sheet->id])}}" aria-label="Modifier la fiche d'amélioration"><i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></a>
                                {{-- btn delete --}}
                                @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                                    <form action="{{ route('sheet.destroy', ['sheet' => $sheet->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-status-archive hover:bg-status-archive-hover text-white py-1 px-2 rounded w-fit h-fit"  aria-label="Supprimer la fiche d'amélioration" type="submit"><i class="fa-solid fa-box-archive" aria-hidden="true"></i></button>
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



            <a href="{{ route('sheet.create') }}" class="btn_primary w-full" title="Ajouter une fiche d'amélioration"><i class="fa-solid fa-plus" aria-hidden="true"></i>Ajouter une fiche d'amélioration</a>
        </div>
    </div>
</x-app-layout>
