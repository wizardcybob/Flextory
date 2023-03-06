<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projet') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p><a href="{{ route('projet.index') }}">Back</a></p>
            <h1>{{ $projet->title }}</h1>
            <p>Description : {{ $projet->description }}</p>
            <p>Lien Seafile : {{ $projet->link }}</p>

            <h2>étudiant(s) assigné :</h2>
            @foreach ($projet->student as $student)
            <ul>
                <li><a href="{{route('student.show', ['student' => $student])}}">{{$student->name}}</a></li>
            </ul>
            @endforeach

        </div>
    </div>
</x-app-layout>
