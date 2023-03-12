<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un étudiant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('student.store') }}" method="POST">
                    @csrf
                    <p><input type="text" aria-labelledby="Nom" placeholder="Nom" name="name" value="{{ old('name') }}"></p>
                    <p><input type="text" aria-labelledby="Actif" placeholder="Actif" name="actif" value="{{ old('actif') }}"></p>
                    @foreach ($projets as $projet)
                        <p><input type="checkbox" name="projet[]" id="projet{{ $projet->id }}" value="{{ $projet->id }}"><label for="student{{ $projet->id }}">{{ $projet->title }}</label></p>
                    @endforeach
                    <p><button aria-labelledby="Modifier" type="submit">Modifier</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
