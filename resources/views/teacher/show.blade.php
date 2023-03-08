<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enseignant') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p><a href="{{ route('teacher.index') }}">Back</a></p>
            <h1>{{ $teacher->name }}</h1>
            <p>Permanent : {{ $teacher->permanent }}</p>

            <h2>Département : {{ $teacher->department->name }}</h2>
            <h2>Statut : {{ $teacher->status->name }}</h2>

        </div>
    </div>
</x-app-layout>
