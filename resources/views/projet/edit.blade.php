<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le projet') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('projet.update', ['projet' => $projet]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p><input type="text" aria-labelledby="Titre" placeholder="Titre" name="title" value="{{ $projet->title }}"></p>
                    <p>
                        <textarea rows="5" aria-labelledby="Description" placeholder="Description" name="description">{{ $projet->description }}</textarea>
                    </p>
                    <p><input type="text" aria-labelledby="Lien" placeholder="Lien" name="link" value="{{ $projet->link }}"></p>
                    @foreach ($students as $student)
                        <p>
                            <input aria-labelledby="Etudiant" type="checkbox" name="student[]" id="student_{{ $student->id }}" value="{{ $student->id }}"
                                {{ in_array($student->id, $projet->students->pluck('id')->toArray()) ? 'checked' : '' }}>
                            <label for="student_{{ $student->id }}">{{ $student->name }}</label>
                        </p>
                    @endforeach
                    @foreach ($areas as $area)
                        <p>
                            <input aria-labelledby="Zone" type="checkbox" name="area[]" id="area_{{ $area->id }}" value="{{ $area->id }}"
                                {{ in_array($area->id, $projet->areas->pluck('id')->toArray()) ? 'checked' : '' }}>
                            <label for="area_{{ $area->id }}">{{ $area->name }}</label>
                        </p>
                    @endforeach
                    <p><button aria-labelledby="Valider" type="submit">Valider</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
