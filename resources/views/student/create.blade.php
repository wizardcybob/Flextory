<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('student.store') }}" method="POST">
                    @csrf
                    <p><input type="text" placeholder="name" name="name" value="{{ old('name') }}"></p>
                    <p><input type="text" placeholder="actif" name="actif" value="{{ old('actif') }}"></p>
                    @foreach ($projets as $projet)
                        <p><input type="checkbox" name="projet[]" id="projet{{ $projet->id }}" value="{{ $projet->id }}"><label for="student{{ $projet->id }}">{{ $projet->title }}</label></p>
                    @endforeach
                    <p><button type="submit">Save</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
