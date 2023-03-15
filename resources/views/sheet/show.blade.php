<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fiche d\'amélioration') }}
        </h2>
    </x-slot>

    {{-- VIEW --}}
    <div class="w-full mx-auto flex flex-col gap-7 md:gap-8">
        <a class="btn_primary w-fit" href="{{ route('sheet.index') }}" aria-label="Retour à la page précédente" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
            Retour</a>

        {{-- HEADER VIEW --}}
        <div class="flex flex-col gap-2 md:gap-0 md:flex-row md:items-center md:justify-between">
            {{-- TEXTES --}}
            <div class="flex flex-col gap-1 md:gap-2">
                <h1 class="titre_page">{{ $sheet->title }}</h1>
                <p>Fiche créée par {{ $sheet->creator }}</p>
            </div>
            {{-- btns --}}
            <div class="flex gap-2">
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
                {{-- btn delete --}}
                <form action="{{ route('sheet.destroy', ['sheet' => $sheet]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-delete hover:bg-delete-dark text-white py-1 px-2 rounded w-fit h-fit"  aria-label="Supprimer la fiche d'amélioration" type="submit"><i class="fa-solid fa-trash" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>

        {{-- INFORMATIONS --}}
        <div class="flex flex-col gap-2">
            <p><span class="font-semibold">Emplacement : </span>{{ $sheet->area->name }}</p>
            <div>
                <p><span class="font-semibold">Catégorie(s) : </span>???????????</p>
                {{-- @foreach ($sheet->categories as $category)
                <ul>
                    <li>{{$category->name}}</a></li>
                </ul>
                @endforeach --}}
            </div>
        </div>

        {{-- DESCRIPTION --}}
        <div>
            <p class="font-semibold">Description : </p>
            <p>{{ $sheet->description }}</p>
        </div>

        {{-- IDÉE(S) DE RÉSOLUTION --}}
        <div>
            <p class="font-semibold">Idée(s) de résolution : </p>
            <p>{{ $sheet->idea }}</p>
        </div>

        {{-- ENSIGNANT(S) ASSIGNÉ(S) --}}
        <div>
            <p class="font-semibold">Enseignant(s) assigné(s) :</p>
            @foreach ($sheet->teachers as $teacher)
            <ul>
                <li><a href="{{route('teacher.show', ['teacher' => $teacher])}}">{{$teacher->name}}</a></li>
            </ul>
            @endforeach
        </div>

        {{-- IMAGES --}}
        <div class="flex flex-col gap-2">
            <p class="font-semibold">Image(s) :</p>
            {{-- @foreach ($sheet->images as $image)
            <ul>
                <li><img src="{{$image->url}}" /></li>
            </ul>
            @endforeach --}}
            <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2">
                <li class="relative bg-tertiary cursor-pointer group flex justify-center items-center">
                    <img class="clickable-image group-hover:opacity-40" src="{{ asset('storage/images/flextory_login.jpg') }}" alt="" />
                    <div class="text-primary hidden group-hover:block absolute"><i class="fa-solid fa-magnifying-glass-plus w-14 h-14"></i></div>
                </li>
                <li class="relative bg-tertiary cursor-pointer group flex justify-center items-center">
                    <img class="clickable-image group-hover:opacity-40" src="{{ asset('storage/images/flextory_login.jpg') }}" alt="" />
                    <div class="text-primary hidden group-hover:block absolute"><i class="fa-solid fa-magnifying-glass-plus w-14 h-14"></i></div>
                </li>
                <li class="relative bg-tertiary cursor-pointer group flex justify-center items-center">
                    <img class="clickable-image group-hover:opacity-40" src="{{ asset('storage/images/flextory_login.jpg') }}" alt="" />
                    <div class="text-primary hidden group-hover:block absolute"><i class="fa-solid fa-magnifying-glass-plus w-14 h-14"></i></div>
                </li>
                <li class="relative bg-tertiary cursor-pointer group flex justify-center items-center">
                    <img class="clickable-image group-hover:opacity-40" src="{{ asset('storage/images/flextory_login.jpg') }}" alt="" />
                    <div class="text-primary hidden group-hover:block absolute"><i class="fa-solid fa-magnifying-glass-plus w-14 h-14"></i></div>
                </li>
            </ul>
        </div>
        {{-- DIV POUR PLACER L'IMAGE ZOOMÉ --}}
        <div class="parent_zoomed_img parent_zoomed_img_show">
        </div>
    </div>
</x-app-layout>
