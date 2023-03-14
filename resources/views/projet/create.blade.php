<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un projet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('projet.store') }}" method="POST">
                    @csrf
                    <p><input type="text" aria-labelledby="Titre"  placeholder="Titre" name="title" value="{{ old('title') }}"></p>
                    <p>
                        <textarea rows="5" aria-labelledby="Description"  placeholder="Description" name="description">{{ old('description') }}</textarea>
                    </p>
                    Ressources :
                    <p><input type="text" placeholder="Ressource" name="ressource" value="{{ old('ressource') }}"></p>
                    Lien Pistar :
                    <p><input type="text" placeholder="Matériel" name="pistar" value="{{ old('pistar') }}"></p>
                    Image :
                    <p><input type="text" placeholder="Image" name="image" value="{{ old('image') }}"></p>
                    Année :
                    <p><input type="text" placeholder="Année" name="year" value="{{ old('year') }}"></p>
                    Enseignants :
                    @foreach ($teachers as $teacher)
                        <p><input type="checkbox" name="teacher[]" id="teacher{{ $teacher->id }}" value="{{ $teacher->id }}"><label for="projet{{ $teacher->id }}">{{ $teacher->name }}</label></p>
                    @endforeach
                    Étudiants :
                    @foreach ($students as $student)
                        <p><input aria-labelledby="Etudiant" type="checkbox" name="student[]" id="student{{ $student->id }}" value="{{ $student->id }}"><label for="projet{{ $student->id }}">{{ $student->name }}</label></p>
                    @endforeach
                    <p>Zone :</p>
                    @foreach ($areas as $area)
                        <p><input aria-labelledby="Zone" type="checkbox" name="area[]" id="area{{ $area->id }}" value="{{ $area->id }}"><label for="projet{{ $area->id }}">{{ $area->name }}</label></p>
                    @endforeach
                    <p>
                        <select name="image">
                            <option value=""></option>
                            @foreach ($images as $image)
                                <option value="{{ $image->id }}" @if (old('image') == $image->id) selected @endif>
                                    {{ $image->image }}</option>
                            @endforeach
                        </select>
                    </p>
                    <p><button aria-labelledby="Valider" type="submit">Valider</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
