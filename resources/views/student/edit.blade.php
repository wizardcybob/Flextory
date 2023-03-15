<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier l\'étudiant') }}
        </h2>
    </x-slot>

    {{-- VIEW --}}
    <div class="w-full mx-auto flex flex-col gap-8">
        <h1 class="titre_page">Modification de {{ $student->name }}</h1>
        <button class="btn_primary w-fit" onclick="window.history.back()" role="button" aria-label="Retour à la page précédente" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
            Retour</button>

        {{-- FORMULAIRE --}}
        <form action="{{ route('student.update', ['student' => $student]) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nom --}}
            <div class="relative">
                <label for="name" id="name-label" class="absolute label_form">Nom<span class="text-tertiary">*</span> :</label>
                <input type="text" id="name" name="name" class="input_textarea_form" placeholder="Nom" value="{{ $student->name }}" aria-labelledby="name-label" required aria-required="true">
            </div>

            {{-- Actif --}}
            <div class="relative text-primary-darker mt-4">
                <label for="actif" class="font-semibold mb-2" id="actif-label">Etudiant<span class="text-tertiary">*</span></label>
                <div class="flex items-center gap-8">
                    <div>
                        <label for="actif-true" id="actif-true-label">Actif</label>
                        <input value="1" type="radio" id="actif-true" name="actif" class="checkbox_form ml-2" aria-labelledby="actif-true-label" @if ( $student->actif === 1) checked @endif>
                    </div>
                    <div>
                        <label for="actif-false" id="actif-false-label">Inactif</label>
                        <input value="0" type="radio" id="actif-false" name="actif" class="checkbox_form ml-2" aria-labelledby="actif-false-label" @if ($student->actif === 0) checked @endif>
                    </div>
                </div>
            </div>

            {{-- Projets --}}
            <div class="relative text-primary-darker mt-4">
                <label for="projet" class="font-semibold mb-2" id="actif-label">Projets<span class="text-tertiary">*</span></label>
                <div class="flex items-center gap-8">
                    @foreach ($projets as $projet)
                        <div>
                            <label for="student{{ $projet->id }}" id="projet{{ $projet->id }}-label">{{ $projet->title }}</label>
                            <input type="checkbox" name="projet[]" class="checkbox_form ml-2" id="projet{{ $projet->id }}" value="{{ $projet->id }}" aria-labelledby="projet{{ $projet->id }}-label" @if(in_array($projet->id, $student->projets->pluck('id')->toArray())) checked @endif>
                        </div>
                    @endforeach
                </div>
            </div>

            <p class="text-tertiary text-xs mt-4">*Champs obligatoires.</p>

            <div class="flex justify-end w-full">
                <button class="btn_primary flex justify-center" type="submit" aria-label="Enregistrer les modifications">Enregistrer</button>
            </div>
        </form>
    </div>
</x-app-layout>
