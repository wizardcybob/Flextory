<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une sous-zone') }}
        </h2>
    </x-slot>

    {{-- VIEW --}}
    <div class="w-full mx-auto flex flex-col gap-8">
        <button class="btn_primary w-fit" onclick="window.history.back()" role="button" aria-label="Retour à la page précédente" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
            Retour</button>
        <h1 class="titre_page">Création d'une sous-zone</h1>

        {{-- FORMULAIRE --}}
        <form action="{{ route('area.store') }}" method="POST" class="flex flex-col gap-4">
            @csrf
            {{-- Nom de la zone --}}
            <div class="relative">
                <label for="name" id="name-label" class="absolute label_form">Nom<span class="text-tertiary">*</span> :</label>
                <input type="text" id="name" name="name" class="input_textarea_form" placeholder="Nom de la sous-zone" value="{{ old('name') }}" aria-labelledby="name-label" required aria-required="true">
            </div>

            {{-- Description --}}
            <div class="relative">
                <label for="description" class="absolute label_form" id="description-label">Description :</label>
                <textarea class="input_textarea_form" rows="5" id="description" name="description" placeholder="Description de la zous-zone" aria-labelledby="description-label">{{ old('description') }}</textarea>
            </div>

            {{-- Image --}}
            <div class="relative w-full">
                <label for="image" id="image-label" class="absolute label_form">Image :</label>
                <select class="select_form" id="image" name="image" aria-labelledby="image-label">
                    <option value="" selected disabled hidden>Sélectionner une image</option>
                    @foreach ($images as $image)
                        <option value="{{ $image->id }}" @if (old('image')==$image->id) selected @endif>
                            {{ $image->image }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Zone --}}
            <div class="relative w-full">
                <label for="adearea" id="adearea-label" class="absolute label_form">Zone<span class="text-tertiary">*</span> :</label>
                <select class="select_form" id="adearea" name="adearea" aria-labelledby="adearea-label" required aria-required="true">
                    <option value="" selected disabled hidden>Sélectionner une zone</option>
                    @foreach ($adeareas as $adearea)
                        <option value="{{ $adearea->id }}" @if (old('adearea')==$adearea->id) selected @endif>
                            {{ $adearea->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Projets --}}
            <div class="relative flex flex-col gap-1">
                <p class="label_form">Projet(s) :</p>
                <div class="flex flex-wrap gap-x-6 gap-y-1">
                    @foreach ($projets as $projet)
                    <div class="flex gap-2 items-center">
                        <input class="checkbox_form" type="checkbox" name="projet[]" id="projet{{ $projet->id }}"
                            value="{{ $projet->id }}"><label class="capitalize" for="projet{{ $projet->id }}">{{ $projet->title }}</label>
                    </div>
                    @endforeach
                </div>
            </div>

            <p class="text-tertiary text-xs">*Champs obligatoires.</p>

            <div class="flex justify-end w-full">
                <button class="btn_primary flex justify-center" type="submit" aria-label="Enregistrer les modifications">Enregistrer</button>
            </div>
        </form>
    </div>
</x-app-layout>
