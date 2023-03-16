<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zone') }}
        </h2>
    </x-slot>


    <div class="w-full mx-auto flex flex-col gap-8">
        <a href="{{ route('adearea.index') }}" aria-labelledby="Retour" class="btn_primary w-fit" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>Retour</a>
        <div class="flex flex-col gap-2">
            <div class="flex flex-col gap-1 md:gap-4 md:flex-row md:items-center md:justify-between">
                <h1 class="titre_page">{{ $area->name }}</h1>
                {{-- btns --}}
                <div class="flex items-center gap-2">
                    <a class="btn_tertiary w-fit" href="{{ route('area.sheets', ['area' => $area])}}">Fiches d'amélioration<i class="fa-solid fa-file" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="flex items-center gap-2">
                @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                    {{-- btn edit --}}
                    <a class="bg-edit hover:bg-edit-dark text-white py-1 px-2 rounded w-fit h-fit" href="{{ route('area.edit', ['area' => $area])}}" aria-label="Modifier la zone"><i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></a>
                    {{-- btn delete --}}
                    <form action="{{ route('area.destroy', ['area' => $area]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-delete hover:bg-delete-hover text-white py-1 px-2 rounded w-fit h-fit"  aria-label="Supprimer la zone" type="submit"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                    </form>
                @endif
                {{-- btn archive --}}
                @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                    <a href="{{ route('projet.archive') }}" class="btn_archive w-fit" title="Archives">Archives<i class="fa-solid fa-box-archive" aria-hidden="true" aria-labelledby="Archives"></i></a>
                @endif
            </div>
        </div>

        {{-- VIEW --}}
        <div class="flex flex-col gap-4">
            {{-- DESCRIPTION --}}
            @if ($area->description)
                <div class="flex flex-col gap-1">
                    <p class="font-semibold">Description : </p>
                    <p>{{ $area->description }}</p>
                </div>
            @endif

            <h2 class="sous-titre_page">Projet(s) assigné(s) :</h2>
            {{-- Tableau des fiches --}}
            @if ($area->projets->isNotEmpty())
            <ul class="border-2 border-primary rounded overflow-hidden max-h-[500px] overflow-y-scroll">
                @php
                    $bgClass = 'bg-secondary';
                @endphp

                @foreach ($area->projets as $projet)
                    <li class="{{ $bgClass }} flex flex-col gap-2 md:gap-3 items-center justify-center md:flex-row md:justify-between md:items-center min-h-12 px-3 py-[10px]">
                        {{-- textes --}}
                        <div class="flex flex-col md:flex-row items-center flex-wrap gap-1 md:gap-2">
                            <p class="font-semibold text-center md:text-left">{{ $projet->title }}</p>
                        </div>
                        {{-- btns --}}
                        <div class="flex gap-2">
                            {{-- btn ressource --}}
                            @if ($projet->ressource)
                                <a class="bg-primary hover:bg-primary-dark text-white py-1 px-2 rounded" href="{{ $projet->ressource }}" aria-label="Voir les ressources du projet">Ressources</a>
                            @endif
                            {{-- btn view --}}
                            <a class="bg-view hover:bg-view-dark text-white py-1 px-4 rounded" href="{{ route('projet.show', $projet) }}" aria-label="Voir le projet"><i class="fa-solid fa-eye" aria-hidden="true"></i></a>
                            @if (Auth::user()->role === 1 || Auth::user()->role === 2 || Auth::user()->role === 3)
                            {{-- btn dupplicate --}}
                            <a class="bg-dupplicate hover:bg-dupplicate-dark text-white py-1 px-2 rounded" href="{{ route('projet.replicate', ['projet' => $projet->id])}}" aria-label="Duppliquer le projet"><i class="fa-solid fa-copy" aria-hidden="true"></i></a>
                            {{-- btn edit --}}
                            <a class="bg-edit hover:bg-edit-dark text-white py-1 px-2 rounded" href="{{ route('projet.edit', ['projet' => $projet->id])}}" aria-label="Modifier le projet"><i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></a>
                            {{-- btn delete --}}
                                <form action="{{ route('projet.destroy', ['projet' => $projet->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-status-archive hover:bg-status-archive-hover text-white py-1 px-2 rounded w-fit h-fit"  aria-label="Supprimer le projet" type="submit"><i class="fa-solid fa-box-archive" aria-hidden="true"></i></button>
                                </form>
                            @endif
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
            @if (Auth::user()->role === 1 || Auth::user()->role === 2 || Auth::user()->role === 3)
            <a href="{{ route('projet.create') }}" class="btn_primary w-full" title="Ajouter un projet"><i class="fa-solid fa-plus" aria-hidden="true"></i>Ajouter un projet</a>
            @endif
        </div>
    </div>
</x-app-layout>
