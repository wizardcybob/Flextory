<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une fiche') }}
        </h2>
    </x-slot>

    {{-- VIEW --}}
    <div class="w-full mx-auto flex flex-col gap-8">
        <button class="btn_primary w-fit" onclick="window.history.back()" role="button" aria-label="Retour à la page précédente" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
            Retour</button>
        <h1 class="titre_page">Création d'une fiche d'amélioration</h1>

        {{-- FORMULAIRE --}}
        <form action="{{ route('sheet.store') }}" method="POST" class="flex flex-col gap-4">
            @csrf
            {{-- Créateur de la fiche (à cacher) --}}
            <input type="text" placeholder="creator" name="creator" class="hidden" value="{{ $creator }}">

            {{-- Titre fiche d'amélioration --}}
            <div class="relative">
                <label for="title" id="title-label" class="absolute label_form">Intitulé<span class="text-tertiary">*</span> :</label>
                <input type="text" id="title" name="title" class="input_textarea_form" placeholder="Titre de la fiche d'amélioration" value="{{ old('title') }}" aria-labelledby="title-label" required aria-required="true">
            </div>

            {{-- Description --}}
            <div class="relative">
                <label for="description" class="absolute label_form z-10" id="description-label">Description :</label>
                <textarea class="input_textarea_form mytextarea" rows="5" id="description" name="description" placeholder="Votre description" aria-labelledby="description-label">{{ old('description') }}</textarea>
            </div>

            {{-- Idées de résolution --}}
            <div class="relative">
                <label for="idea" id="idea-label" class="absolute label_form z-10">Idée(s) de résolution :</label>
                <textarea type="text" id="idea" name="idea" class="input_textarea_form mytextarea" placeholder="Indiquez vos idées de résolution" aria-labelledby="idea-label">{{ old('idea') }}</textarea>
            </div>

            <div class="flex flex-col md:flex-row gap-4">
                {{-- Emplacement --}}
                <div class="relative w-full">
                    <label for="area" id="area-label" class="absolute label_form">Emplacement<span class="text-tertiary">*</span> :</label>
                    <select class="select_form" id="area" name="area" aria-labelledby="area-label" required aria-required="true">
                        <option value="" selected disabled hidden>Sélectionner une zone</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}" @if (old('area')==$area->id) selected @endif>
                                {{ $area->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Catégorie --}}
                <div class="relative w-full">
                    <label for="category" id="category-label" class="absolute label_form">Catégorie<span class="text-tertiary">*</span> :</label>
                    <select class="select_form" id="category" name="category" aria-labelledby="category-label" required aria-required="true">
                        <option value="" selected disabled hidden>Sélectionner une catégorie</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (old('category')==$category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            {{-- Enseignant(s) assigné(s) --}}
            <div class="relative flex flex-col gap-1">
                <p class="label_form">Enseignant(s) assigné(s)<span class="text-tertiary">*</span> :</p>
                <div class="flex flex-wrap gap-x-6 gap-y-1 items-center">
                    @foreach ($teachers as $teacher)
                    <div class="flex gap-2 items-center">
                        <input class="checkbox_form" type="checkbox" name="teacher[]" id="teacher{{ $teacher->id }}"
                            value="{{ $teacher->id }}"><label class="capitalize" for="teacher{{ $teacher->id }}">{{ $teacher->name }}</label>
                    </div>
                    @endforeach
                </div>
            </div>


            {{-- Image --}}
            <div class="relative w-full">
                <label for="image" id="image-label" class="absolute label_form">Image :</label>
                <select class="select_form" id="image" name="image" aria-labelledby="image-label">
                    <option value="" selected disabled hidden>Sélectionner une image</option>
                    @foreach ($images as $image)
                        <option value="{{ $image->id }}" @if (old('image')==$image->id) selected @endif>
                            {{ $image->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            {{-- Etat de résolution d'une fiche --}}
            <div class="relative">
                <label for="state" id="state-label" class="absolute label_form">Etat de résolution de la fiche<span class="text-tertiary">*</span> :</label>
                <select class="select_form" id="state" name="state" aria-labelledby="state-label" required aria-required="true">
                    <option value="" selected disabled hidden>Sélectionner un état</option>
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}" @if (old('state')==$state->id) selected @endif>
                            {{ $state->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <p class="text-tertiary text-xs">*Champs obligatoires.</p>

            <div class="flex justify-end w-full">
                <button class="btn_primary flex justify-center" type="submit" aria-label="Enregistrer les modifications">Enregistrer</button>
            </div>
        </form>
    </div>
</x-app-layout>
