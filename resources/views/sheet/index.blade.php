<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fiches') }}
        </h2>
    </x-slot>

    <div class="w-full mx-auto flex flex-col gap-8">
        <h1 class="titre_page">Fiches d'améliorations</h1>
        <a href="javascript:history.go(-1)" class="btn_primary w-fit" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>Retour</a>

        {{-- Tableau des fiches --}}
        <div class="flex flex-col gap-4">
            @if ($sheets->isNotEmpty())
            <form method="GET" action="{{ route('sheet.search') }}">
                <input type="text" name="query" placeholder="Recherche...">
                <select name="category">
                    <option value="">Catégories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <select name="state">
                    <option value="">États</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
                <button type="submit">Rechercher</button>
            </form>
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
                                <div class="bg-status-to_do text-white px-2 py-1 rounded flex items-center text-center gap-3 {{-- cursor-pointer --}} justify-center capitalize border-none" aria-label="Fiche à traiter">à traiter</div>
                            @elseif ($sheet->state->id == 2)
                                <div class="bg-status-in_progress text-white px-2 py-1 rounded flex items-center text-center gap-3 {{-- cursor-pointer --}} justify-center capitalize border-none" aria-label="Fiche en cours">en cours</div>
                            @elseif ($sheet->state->id == 3)
                                <div class="bg-status-done text-white px-2 py-1 rounded flex items-center text-center gap-3 {{-- cursor-pointer --}} justify-center capitalize border-none" aria-label="Fiche terminée">terminée</div>
                            @elseif ($sheet->state->id == 4)
                                <div class="bg-status-archive text-white px-2 py-1 rounded flex items-center text-center gap-3 {{-- cursor-pointer --}} justify-center capitalize border-none" aria-label="Fiche archivée">archivée</div>
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
                                <a class="bg-view hover:bg-view-dark text-white py-1 px-4 rounded" href="{{ route('sheet.show', $sheet) }}" aria-label="Voir la fiche d'amélioration"><i class="fa-solid fa-eye" aria-hidden="true"></i></a>
                                <a class="bg-edit hover:bg-edit-dark text-white py-1 px-2 rounded" href="{{ route('sheet.edit', ['sheet' => $sheet->id])}}" aria-label="Modifier la fiche d'amélioration"><i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></a>
                                <form action="{{ route('sheet.destroy', ['sheet' => $sheet->id]) }}" method="POST">
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
                <p>Aucun résultat</p>
            @endif



            <a href="{{ route('sheet.create') }}" class="btn_primary w-full" title="Ajouter une fiche d'amélioration"><i class="fa-solid fa-plus" aria-hidden="true"></i>Ajouter une fiche d'amélioration</a>
        </div>
    </div>
</x-app-layout>
