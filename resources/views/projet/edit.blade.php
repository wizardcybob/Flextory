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
                    <p><input type="text" placeholder="title" name="title" value="{{ $projet->title }}"></p>
                    <p>
                        <textarea rows="5" placeholder="description" name="description">{{ $projet->description }}</textarea>
                    </p>
                    <p><input type="text" placeholder="Ressources" name="ressource" value="{{ $projet->ressource }}"></p>
                    <p><input type="text" placeholder="Matériels" name="pistar" value="{{ $projet->pistar }}"></p>
                    <p><input type="text" placeholder="image" name="image" value="{{ $projet->image }}"></p>
                    <p><input type="text" placeholder="Année" name="year" value="{{ $projet->year }}"></p>
                    @foreach ($teachers as $teacher)
                        <p>
                            <input type="checkbox" name="teacher[]" id="teacher_{{ $teacher->id }}" value="{{ $teacher->id }}"
                                {{ in_array($teacher->id, $projet->teachers->pluck('id')->toArray()) ? 'checked' : '' }}>
                            <label for="teacher_{{ $teacher->id }}">{{ $teacher->name }}</label>
                        </p>
                    @endforeach
                    @foreach ($students as $student)
                        <p>
                            <input type="checkbox" name="student[]" id="student_{{ $student->id }}" value="{{ $student->id }}"
                                {{ in_array($student->id, $projet->students->pluck('id')->toArray()) ? 'checked' : '' }}>
                            <label for="student_{{ $student->id }}">{{ $student->name }}</label>
                        </p>
                    @endforeach
                    @foreach ($areas as $area)
                        <p>
                            <input type="checkbox" name="area[]" id="area_{{ $area->id }}" value="{{ $area->id }}"
                                {{ in_array($area->id, $projet->areas->pluck('id')->toArray()) ? 'checked' : '' }}>
                            <label for="area_{{ $area->id }}">{{ $area->name }}</label>
                        </p>
                    @endforeach
                    <p><button type="submit">Save</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
