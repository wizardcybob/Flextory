<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a projet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('projet.store') }}" method="POST">
                    @csrf
                    <p><input type="text" placeholder="title" name="title" value="{{ old('title') }}"></p>
                    <p>
                        <textarea rows="5" placeholder="description" name="description">{{ old('description') }}</textarea>
                    </p>
                    <p><input type="text" placeholder="link" name="link" value="{{ old('link') }}"></p>
                    @foreach ($students as $student)
                        <p><input type="checkbox" name="student[]" id="student{{ $student->id }}" value="{{ $student->id }}"><label for="projet{{ $student->id }}">{{ $student->name }}</label></p>
                    @endforeach
                    <p>Zone :</p>
                    @foreach ($areas as $area)
                        <p><input type="checkbox" name="area[]" id="area{{ $area->id }}" value="{{ $area->id }}"><label for="projet{{ $area->id }}">{{ $area->name }}</label></p>
                    @endforeach
                    <p><button type="submit">Save</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
