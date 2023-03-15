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
        <div class="flex flex-col gap-2 md:gap-0 md:flex-row md:items-center md:justify-between">
            {{-- TEXTES --}}
            <div class="flex flex-col gap-1 md:gap-2">
                <h1 class="titre_page">{{ $projet->title }}</h1>
            </div>
            {{-- btn --}}
            <a class="bg-tertiary hover:bg-tertiary-dark text-white py-1 px-4 rounded" href="" aria-label="Voir les ressources du projet">Ressources<i class="fa-solid fa-file"></i></a>
        </div>

        {{-- INFORMATIONS --}}
        <div class="flex flex-col gap-2">
            <p><span class="font-semibold">Année : </span>{{ $projet->year }}</p>
            <p><span class="font-semibold">Emplacement : </span>{{ $projet->area->name }}</p>
            <p><span class="font-semibold">Responsable(s) : </span>
            @foreach ($projet->teachers as $projet)
            <ul>
                <li><a href="{{route('teacher.show', ['teacher' => $teacher])}}">{{$teacher->name}}</a></li>
            </ul>
            @endforeach</p>
        </div>

        {{-- DESCRIPTION --}}
        <div>
            <p class="font-semibold">Description : </p>
            <p>{{ $projet->description }}</p>
        </div>

        {{-- IMAGES --}}
        <div class="flex flex-col gap-2">
            <p class="font-semibold">Image(s) :</p>
            {{-- @foreach ($projet->images as $image)
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
