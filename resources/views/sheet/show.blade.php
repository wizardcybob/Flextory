<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fiche d\'amélioration') }}
        </h2>
    </x-slot>

    {{-- VIEW --}}
    <div class="w-full mx-auto flex flex-col gap-7 md:gap-8">
        <a class="btn_primary w-fit" href="javascript:history.go(-1)" aria-label="Retour à la page précédente" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
            Retour</a>

        {{-- HEADER VIEW --}}
        <div class="flex flex-col gap-1 md:gap-4 md:flex-row md:items-center md:justify-between">
            {{-- TEXTES --}}
            <div class="flex flex-col gap-1 md:gap-2">
                <h1 class="titre_page">{{ $sheet->title }}</h1>
                <p>Fiche créée par <span class="text-tertiary font-semibold">{{ $sheet->creator }}</span></p>
            </div>
            {{-- btns --}}
            <div class="flex items-center gap-2">
                {{-- état de la fiche --}}
                @if ($sheet->state->id == 1)
                    <div class="bg-status-to_do text-white px-2 py-1 rounded flex items-center text-center gap-3 justify-center capitalize border-none whitespace-nowrap" aria-label="Fiche à traiter">{{ $sheet->state->name }}</div>
                @elseif ($sheet->state->id == 2)
                    <div class="bg-status-in_progress text-white px-2 py-1 rounded flex items-center text-center gap-3 justify-center capitalize border-none whitespace-nowrap" aria-label="Fiche en cours">{{ $sheet->state->name }}</div>
                @elseif ($sheet->state->id == 3)
                    <div class="bg-status-done text-white px-2 py-1 rounded flex items-center text-center gap-3 justify-center capitalize border-non whitespace-nowrape" aria-label="Fiche terminée">{{ $sheet->state->name }}</div>
                @elseif ($sheet->state->id == 4)
                    <div class="bg-status-archive text-white px-2 py-1 rounded flex items-center text-center gap-3 justify-center capitalize border-none whitespace-nowrap" aria-label="Fiche archivée">{{ $sheet->state->name }}</div>
                @endif
                {{-- btn edit --}}
                <a class="bg-edit hover:bg-edit-dark text-white py-1 px-2 rounded w-fit h-fit" href="{{ route('sheet.edit', ['sheet' => $sheet])}}" aria-label="Modifier la fiche d'amélioration"><i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></a>
                {{-- btn archive --}}
                @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                    <form action="{{ route('sheet.destroy', ['sheet' => $sheet->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-status-archive hover:bg-status-archive-hover text-white py-1 px-2 rounded w-fit h-fit"  aria-label="Supprimer la fiche d'amélioration" type="submit"><i class="fa-solid fa-box-archive" aria-hidden="true"></i></button>
                    </form>
                @endif
            </div>
        </div>

        {{-- INFORMATIONS --}}
        <div class="flex flex-col gap-1">
            {{-- EMPLACEMENT --}}
            @if ($sheet->area)
                <p><span class="font-semibold">Emplacement : </span>{{ $sheet->area->name }}</p>
            @endif
            {{-- CATEGORIE --}}
            @if ($sheet->category)
                <p><span class="font-semibold">Catégorie : </span>{{ $sheet->category->name }}</p>
            @endif
        </div>

        {{-- DESCRIPTION --}}
        @if ($sheet->description)
            <div class="flex flex-col gap-1">
                <p class="font-semibold">Description : </p>
                <p>{{ $sheet->description }}</p>
            </div>
        @endif

        {{-- IDÉE(S) DE RÉSOLUTION --}}
        @if ($sheet->idea)
            <div class="flex flex-col gap-1">
                <p class="font-semibold">Idée(s) de résolution : </p>
                <p>{{ $sheet->idea }}</p>
            </div>
        @endif

        {{-- ENSIGNANT(S) ASSIGNÉ(S) --}}
        @if (count($sheet->teachers) > 0)
            <p class="font-semibold">Enseignant(s) assigné(s) :</p>
            <ul class="flex flex-col gap-1">
                @foreach ($sheet->teachers as $teacher)
                    <li><a href="{{route('teacher.show', ['teacher' => $teacher])}}">{{$teacher->name}}</a></li>
                @endforeach
            </ul>
        @endif

        {{-- IMAGES --}}
        @if ($sheet->url)
            <div class="flex flex-col gap-1">
                <p class="font-semibold">Image(s) :</p>
                <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2">
                    <li class="relative bg-tertiary cursor-pointer group flex justify-center items-center">
                        <img class="clickable-image group-hover:opacity-40" src="{{$image->url}}" alt="Image de la fiche d'amélioration" />
                        <div class="text-primary hidden group-hover:block absolute"><i class="fa-solid fa-magnifying-glass-plus w-14 h-14"></i></div>
                    </li>
                </ul>
            </div>
            {{-- DIV POUR PLACER L'IMAGE ZOOMÉ --}}
            <div class="parent_zoomed_img parent_zoomed_img_show">
            </div>
        @endif
    </div>
</x-app-layout>
