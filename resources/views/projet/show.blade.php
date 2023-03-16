<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projet') }}
        </h2>
    </x-slot>


    {{-- VIEW --}}
    <div class="w-full mx-auto flex flex-col gap-7 md:gap-8">
        <a class="btn_primary w-fit" href="{{ route('projet.index') }}"  aria-label="Retour à la page précédente" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
            Retour</a>

        {{-- HEADER VIEW --}}
        <div class="flex flex-col gap-2 md:gap-4 md:flex-row md:items-center md:justify-between">
            {{-- TEXTES --}}
            <div class="flex flex-col gap-1 md:gap-2">
                <h1 class="titre_page">{{ $projet->title }}</h1>
            </div>
            {{-- btns --}}
            <div class="flex gap-2">
                @if ($projet->ressource)
                    <a class="btn_tertiary w-fit" href="{{ $projet->ressource }}" aria-label="Voir les ressources du projet">Ressources<i class="fa-solid fa-file"></i></a>
                @endif
                {{-- btn dupplicate --}}
                <a class="bg-dupplicate hover:bg-dupplicate-dark text-white py-1 px-2 rounded" href="" aria-label="Duppliquer le projet"><i class="fa-solid fa-copy" aria-hidden="true"></i></a>
                {{-- btn edit --}}
                <a class="bg-edit hover:bg-edit-dark text-white py-1 px-2 rounded w-fit h-fit" href="{{ route('projet.edit', ['projet' => $projet])}}" aria-label="Modifier le projet"><i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></a>
                {{-- btn archive --}}
                @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                    <form action="{{ route('projet.destroy', ['projet' => $projet->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-status-archive hover:bg-status-archive-hover text-white py-1 px-2 rounded w-fit h-fit"  aria-label="Supprimer le projet" type="submit"><i class="fa-solid fa-box-archive" aria-hidden="true"></i></button>
                    </form>
                @endif
            </div>
        </div>

        {{-- INFORMATIONS --}}
        <div class="flex flex-col gap-7 md:gap-8">
            {{-- ANNÉE --}}
            @if ($projet->year)
                <p><span class="font-semibold">Année : </span>{{ $projet->year }}</p>
            @endif

            {{-- EMPLACEMENT --}}
            @if (count($projet->areas) > 0)
                <div class="flex flex-col gap-1">
                    <p class="font-semibold">Emplacement :</p>
                    <ul class="flex flex-col gap-1">
                        @foreach ($projet->areas as $area)
                            <li class="capitalize">- {{ $area->name }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- RESPONSABLE --}}
            @if (count($projet->teachers) > 0)
                <div class="flex flex-col gap-1">
                    <p class="font-semibold">Responsable(s) :</p>
                    <ul class="flex flex-col gap-1">
                        @foreach ($projet->teachers as $teacher)
                            <li class="capitalize">- {{$teacher->name}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        {{-- DESCRIPTION --}}
        @if ($projet->description)
            <div class="flex flex-col gap-1">
                <p class="font-semibold">Description : </p>
                <p>{{ $projet->description }}</p>
            </div>
        @endif

        {{-- IMAGES --}}
        @if ($projet->url)
            <div class="flex flex-col gap-1">
                <p class="font-semibold">Image(s) :</p>
                <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2">
                    <li class="relative bg-tertiary cursor-pointer group flex justify-center items-center">
                        <img class="clickable-image group-hover:opacity-40" src="{{$image->url}}" alt="Image du projet" />
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
