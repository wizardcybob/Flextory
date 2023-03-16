<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un enseignant') }}
        </h2>
    </x-slot>

    {{-- VIEW --}}
    <div class="w-full mx-auto flex flex-col gap-8">
        <button class="btn_primary w-fit" onclick="window.history.back()" role="button" aria-label="Retour à la page précédente" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
            Retour</button>
        <h1 class="titre_page">Modification de {{ $teacher->name }}</h1>

        {{-- FORMULAIRE --}}
        <form action="{{ route('teacher.update', ['teacher' => $teacher]) }}" method="POST" class="flex flex-col gap-7 md:gap-8">
            @csrf
            @method('PUT')

            {{-- Nom --}}
            <div class="relative">
                <label for="name" id="name-label" class="absolute label_form">Nom<span class="text-tertiary">*</span> :</label>
                <input type="text" id="name" name="name" class="input_textarea_form" placeholder="Nom" value="{{ $teacher->name }}" aria-labelledby="name-label" required aria-required="true">
            </div>

            {{-- Permanent --}}
            <div class="relative text-primary-darker">
                <label for="permanent" class="font-semibold mb-2" id="permanent-label">Enseignant :</label>
                <div class="flex items-center gap-8">
                    <div class="flex items-center gap-2">
                        <input value="1" type="radio" id="permanent-true" name="permanent" class="checkbox_form" aria-labelledby="permanent-true-label" @if ($teacher->permanent === 1) checked @endif>
                        <label for="permanent-true" id="permanent-true-label">Permanent</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input value="2" type="radio" id="permanent-false" name="permanent" class="checkbox_form" aria-labelledby="permanent-false-label" @if ($teacher->permanent === 2) checked @endif>
                        <label for="permanent-false" id="permanent-false-label">Non permanent</label>
                    </div>
                </div>
            </div>

            {{-- Departements --}}
            <div class="relative w-full mt-4">
                <label for="department" id="department-label" class="absolute label_form">Département<span class="text-tertiary">*</span> :</label>
                <select class="select_form" id="department" name="department_id" aria-labelledby="department-label" required aria-required="true">
                    <option value="" selected disabled hidden>Sélectionner un département</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" @if ($teacher->department_id === $department->id) selected @endif>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Statuts --}}
            <div class="relative w-full mt-4">
                <label for="status" id="status-label" class="absolute label_form">Statuts<span class="text-tertiary">*</span> :</label>
                <select class="select_form" id="status" name="status_id" aria-labelledby="status-label" required aria-required="true">
                    <option value="" selected disabled hidden>Sélectionner un statut</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->id }}" @if ($teacher->status_id === $status->id) selected @endif>
                            {{ $status->name }}
                        </option>
                    @endforeach
                </select>

            <p class="text-tertiary text-xs mt-4">*Champs obligatoires.</p>

            <div class="flex justify-end w-full">
                <button class="btn_primary flex justify-center" type="submit" aria-label="Enregistrer les modifications">Enregistrer</button>
            </div>
        </form>
    </div>
</x-app-layout>
