<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la fiche') }}
        </h2>
    </x-slot>

    <div class="w-full mx-auto flex flex-col gap-8">
        <h1 class="titre_page">Modification de la fiche d'amélioration</h1>
        <button class="btn_primary w-fit" onclick="window.history.back()" role="button" aria-label="Retour à la page précédente" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
            Retour</button>

        {{-- FORMULAIRE --}}
        <form action="{{ route('sheet.update', ['sheet' => $sheet]) }}" method="POST" class="flex flex-col gap-4">
            @csrf
            {{-- Créateur de la fiche (à cacher) --}}
            <input type="text" placeholder="creator" name="creator" class="hidden" value="{{ $creator }}">

            {{-- Titre fiche d'amélioration --}}
            <div class="relative">
                <label for="title" id="title-label" class="absolute label_form">Intitulé<span class="text-tertiary">*</span> :</label>
                <input type="text" id="title" name="title" class="input_textarea_form" placeholder="Titre de la fiche d'amélioration" value="{{ $sheet->title }}" aria-labelledby="title-label" required aria-required="true">
            </div>

            {{-- Description --}}
            <div class="relative">
                <label for="description" class="absolute label_form" id="description-label">Description :</label>
                <textarea class="input_textarea_form" rows="5" id="description" name="description" placeholder="Votre description" aria-labelledby="description-label">{{ $sheet->description }}</textarea>
            </div>

            {{-- Idées de résolution --}}
            <div class="relative">
                <label for="idea" id="idea-label" class="absolute label_form">Idées de résolution :</label>
                <textarea rows="5" id="idea" name="idea" class="input_textarea_form" placeholder="Indiquez vos idées de résolution" aria-labelledby="idea-label">{{ $sheet->idea }}</textarea>
            </div>

            <div class="flex flex-col md:flex-row gap-4">
                {{-- Emplacement --}}
                <div class="relative w-full">
                    <label for="area" id="area-label" class="absolute label_form">Emplacement<span class="text-tertiary">*</span> :</label>
                    <select class="select_form" id="area" name="area" aria-labelledby="area-label" required aria-required="true">
                        <option value="" selected disabled hidden>Sélectionner une zone</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}" @if ($sheet->area_id == $area->id) selected @endif>
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
                            <option value="{{ $category->id }}" @if ($sheet->category_id == $category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            {{-- Enseignant(s) assigné(s) --}}
            <div class="relative flex flex-col gap-1">
                <p class="label_form">Enseignant(s) assigné(s)<span class="text-tertiary">*</span> :</p>
                <ul class="flex flex-wrap gap-x-6 gap-y-1 items-center">
                    @foreach ($teachers as $teacher)
                    <li class="flex gap-2 items-center">
                        <input class="checkbox_form" type="checkbox" name="teacher[]" id="teacher{{ $teacher->id }}"
                            value="{{ $teacher->id }}"><label class="capitalize whitespace-nowrap" for="sheet{{ $teacher->id }}" @if ($sheet->teacher_id == $teacher->id) checked @endif>{{ $teacher->name }}</label>
                    </li>
                    @endforeach
                </ul>
            </div>


            {{-- Sélectionner une image --}}
            <div class="relative">
                <label for="image" id="image-label" class="absolute label_form">Sélectionner une image :</label>
                <select class="select_form" name="image" id="image" name="image" aria-labelledby="image-label">
                    <option value="" selected disabled hidden>Sélectionner une image</option>></option>
                    @foreach ($images as $image)
                        <option value="{{ $image->id }}" @if ($sheet->image_id == $image->id) selected @endif>
                            {{ $image->image }}</option>
                    @endforeach
                </select>
            </div>


            {{-- Etat de résolution d'une fiche --}}
            <div class="relative">
                <label for="state" id="state-label" class="absolute label_form">Etat de résolution de la fiche<span class="text-tertiary">*</span> :</label>
                <select class="select_form" id="state" name="state" aria-labelledby="state-label" required aria-required="true">
                    <option value="" selected disabled hidden>Sélectionner un état</option>
                    @foreach ($states as $state)
                    <option value="{{ $state->id }}" @if ($sheet->state_id == $state->id) selected @endif>
                        {{ $state->name }}</option>
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
