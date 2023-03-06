<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le projet') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('projet.update', ['projet' => $projet]) }}" method="PUT">
                    @csrf
                    <p><input type="text" placeholder="title" name="title" value="{{ $projet->title }}"></p>
                    <p>
                        <textarea rows="5" placeholder="description" name="description">{{ $projet->description  }}</textarea>
                    </p>
                    <p><input type="text" placeholder="actif" name="actif" value="{{ $projet->link }}"></p>
                    @foreach ($students as $student)
                        @if ($projet->students->pluck('id')->contains($student->id))
                            <p><input type="checkbox" name="student[]" id="{{ $student->id }}" value="{{ $student->id }}" checked><label for="projet_{{ $student->id }}">{{ $student->name }}</label></p>
                        @else
                            <p><input type="checkbox" name="student[]" id="{{ $student->id }}" value="{{ $student->id }}"><label for="projet_{{ $student->id }}">{{ $student->name }}</label></p>
                        @endif
                    @endforeach

                    <p><button type="submit">Save</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
