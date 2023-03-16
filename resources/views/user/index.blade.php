<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilisateur') }}
        </h2>
    </x-slot>

    <div class="w-full mx-auto flex flex-col gap-8">
        <a href="javascript:history.go(-1)" class="btn_primary w-fit" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>Retour</a>
        <div class="flex flex-col md:flex-row gap-2 md:gap-0 w-full justify-between items-start md:items-center">
            <h1 class="titre_page">Listes</h1>
            <div class="flex flex-col md:flex-row gap-2">
                <a href="{{ route('student.index') }}" class="btn_tertiary w-fit" title="Liste des étudtiants">Liste des étudiants<i class="fa-solid fa-graduation-cap" aria-hidden="true" aria-labelledby="Etudiants"></i></a>
                <a href="{{ route('teacher.index') }}" class="btn_tertiary w-fit" title="Liste des professeurs">Liste des professeurs<i class="fa-solid fa-chalkboard-user" aria-hidden="true" aria-labelledby="Professeurs"></i></a>
            </div>
        </div>
        {{-- BARRE DE RECHERCHE --}}
        <form method="GET" action="{{ route('user.search') }}">
            <div class="flex flex-col md:flex-row items-center gap-2">
                <div class="relative w-full">
                    <label for="query" id="query-label" class="absolute label_recherche">Recherche :</label>
                    <input type="text" id="query" name="query"  class="input_textarea_recherche pl-10" placeholder="Faire une recherche..." aria-labelledby="query-label">
                    <div class="absolute left-3 inset-y-0 flex items-center text-secondary pb-1">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
                <button class="btn_tertiary w-fit" type="submit" aria-label="Faire une recherche">Rechercher</button>
            </div>
        </form>

        @if ($users->isNotEmpty())
            {{-- Tableau des users --}}
            <ul class="border-2 border-primary rounded overflow-hidden max-h-[500px] overflow-y-scroll mt-2">
                @php
                    $bgClass = 'bg-secondary';
                @endphp
                @foreach ($users as $user)
                    <li class="{{ $bgClass }} flex flex-col gap-2 md:gap-3 items-center justify-center md:flex-row md:justify-between md:items-center min-h-12 px-3 py-[10px]">
                        <a href="{{ route('user.show', $user) }}">{{ $user->name }}</a>
                        {{-- btns --}}
                        <div class="flex items-center gap-2">
                            @if ($user->role == 1)
                                <p class="bg-role-superadmin text-white px-2 py-1 rounded flex items-center text-center gap-3 justify-center border-none whitespace-nowrap" aria-label="SuperAdmin">SuperAdmin</p>
                            @elseif ($user->role == 2)
                                <p class="bg-role-admin text-white px-2 py-1 rounded flex items-center text-center gap-3 justify-center border-none whitespace-nowrap" aria-label="Admin">Admin</p>
                            @elseif ($user->role == 3)
                                <p class="bg-role-professor text-white px-2 py-1 rounded flex items-center text-center gap-3 justify-center border-none whitespace-nowrap" aria-label="Éditeur">Éditeur</p>
                            @elseif ($user->role == 4 || $user->role == 0 || $user->role == 'NULL')
                                <p class="bg-role-student text-white px-2 py-1 rounded flex items-center text-center gap-3 justify-center border-none whitespace-nowrap" aria-label="Étudiant">Étudiant</p>
                            @endif
                            {{-- btn edit --}}
                            <a class="bg-edit hover:bg-edit-dark text-white py-1 px-2 rounded w-fit h-fit" href="{{ route('user.edit', ['user' => $user->id])}}" aria-label="Modifier la fiche d'amélioration"><i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></a>
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
</x-app-layout>
