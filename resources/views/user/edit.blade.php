<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier utilisateur') }}
        </h2>
    </x-slot>

    {{-- VIEW --}}
    <div class="w-full mx-auto flex flex-col gap-8">
        <h1 class="titre_page">Modification du rôle</h1>
        <a href="javascript:history.go(-1)" class="btn_primary w-fit" title="Retour à la page précédente"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i>Retour</a>

        <p class="italic">Vous vous apprêtez à modifier le rôle de <span class="font-semibold text-tertiary">{{ $user->name }}</span>&nbsp;!</p>

        <form action="{{ route('user.update', ['user' => $user]) }}" method="POST" class="flex flex-col gap-4">
            @csrf
            @method('PUT')

            {{-- RÔLE --}}
            <div class="relative">
                <label for="role" id="role-label" class="absolute label_form">Rôle :</label>
                <select class="select_form" id="role" name="role" aria-labelledby="role-label" required aria-required="true">
                    <option value="" selected disabled hidden>Sélectionner un rôle</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @if ($user->role == $role->id) selected @endif>
                            {{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end w-full">
                <button class="btn_primary flex justify-center" type="submit" aria-label="Enregistrer les modifications">Enregistrer</button>
            </div>
        </form>
    </div>
</x-app-layout>
