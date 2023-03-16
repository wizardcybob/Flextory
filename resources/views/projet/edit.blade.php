<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le projet') }}
        </h2>
    </x-slot>

    <div class="w-full mx-auto flex flex-col gap-8">
        <button class="btn_primary w-fit" onclick="window.history.back()" role="button" aria-label="Retour à la page précédente" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
            Retour</button>
        <h1 class="titre_page">Modification d'un projet</h1>

        {{-- FORMULAIRE --}}
                <form action="{{ route('projet.update', ['projet' => $projet]) }}" method="POST" class="flex flex-col gap-4">
                    @csrf
                    @method('PUT')

                    {{-- Titre projet --}}
                    <div class="relative">
                        <label for="title" id="title-label" class="absolute label_form">Intitulé<span class="text-tertiary">*</span> :</label>
                        <input type="text" id="title" name="title" class="input_textarea_form" placeholder="Titre du projet" value="{{ $projet->title }}" aria-labelledby="title-label" required aria-required="true">
                    </div>

                    {{-- Description --}}
                    <div class="relative">
                        <label for="description" class="absolute label_form z-10" id="description-label">Description :</label>
                        <textarea class="input_textarea_form mytextarea" rows="5" id="description" name="description" placeholder="Votre description" aria-labelledby="description-label">{{ $projet->description }}</textarea>
                    </div>

                    {{-- Ressources --}}
                    <div class="relative">
                        <label for="ressource" id="ressource-label" class="absolute label_form">Ressources :</label>
                        <input type="text" id="ressource" name="ressource" class="input_textarea_form" placeholder="Insérer le lien Seafile" value="{{ $projet->ressource }}" aria-labelledby="ressource-label">
                    </div>

                    {{-- Lien Pistar --}}
                    {{-- <div class="relative">
                        <label for="pistar" id="pistar-label" class="absolute label_form">Pistar :</label>
                        <input type="text" id="pistar" name="pistar" class="input_textarea_form" placeholder="Insérer le lien Pistar" value="{{ $projet->pistar }}" aria-labelledby="pistar-label">
                    </div> --}}

                    {{-- Année --}}
                    @php
                    $years = [];
                    foreach (range(date('Y'), 1990) as $year) {
                        $year = $year . '-' . ($year + 1);
                        array_push($years, $year);
                    }
                    @endphp

                    <div class="relative">
                        <label for="year" id="year-label" class="absolute label_form">Année scolaire :</label>
                        <select class="select_form" id="year" name="year" aria-labelledby="year-label">
                            <option value="" selected disabled hidden>Sélectionner une image</option>
                            @foreach ($years as $year)
                                <option value="{{ $year }}" @if ($projet->year === $year) selected @endif>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Enseignant(s) référent(s) --}}
                    <div class="relative flex flex-col gap-1">
                        <p class="label_form">Enseignant(s) référent(s) :</p>
                        <div class="flex flex-wrap gap-x-6 gap-y-1">
                            @foreach ($teachers as $teacher)
                            <div class="flex gap-2 items-center">
                                <input class="checkbox_form" type="checkbox" name="teacher[]" id="teacher{{ $teacher->id }}"
                                    value="{{ $teacher->id }}" {{ in_array($teacher->id, $projet->teachers->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    <label class="capitalize" for="teacher{{ $teacher->id }}">{{ $teacher->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Étudiants --}}
                    <div class="relative flex flex-col gap-1">
                        <p class="label_form">Étudiants :</p>
                        <div class="flex flex-wrap gap-x-6 gap-y-1">
                            @foreach ($students as $student)
                            <div class="flex gap-2 items-center">
                                <input class="checkbox_form" type="checkbox" name="student[]" id="student{{ $student->id }}"
                                    value="{{ $student->id }}" {{ in_array($student->id, $projet->students->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    <label class="capitalize" for="student{{ $student->id }}">{{ $student->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Sous-zones --}}
                    <div class="relative flex flex-col gap-1">
                        <p class="label_form">Sous-zones<span class="text-tertiary">*</span> :</p>
                        <div class="flex flex-wrap gap-x-6 gap-y-1">
                            @foreach ($areas as $area)
                            <div class="flex gap-2 items-center">
                                <input class="checkbox_form" type="checkbox" name="area[]" id="area{{ $area->id }}"
                                    value="{{ $area->id }}" {{ in_array($area->id, $projet->areas->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    <label class="capitalize" for="area{{ $area->id }}">{{ $area->name }}</label>
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
                                <option value="{{ $image->id }}" @if ($projet->image_id == $image->id) selected @endif>
                                {{ $image->image }}</option>
                            @endforeach
                        </select>
                    </div>

                    <p class="text-tertiary text-xs">*Champs obligatoires.</p>

                    <div class="flex justify-end w-full">
                        <button class="btn_primary flex justify-center" type="submit" aria-label="Enregistrer les modifications">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
