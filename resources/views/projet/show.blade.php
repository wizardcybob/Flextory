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

            <h2>zone(s) assignée(s) :</h2>
            @foreach ($projet->areas as $area)
            <ul>
                <li><a href="{{route('area.show', ['area' => $area])}}">{{$area->name}}</a></li>
            </ul>
            @endforeach

            <h2>étudiant(s) assigné :</h2>
            @foreach ($projet->students as $student)
            <ul>
                <li><a href="{{route('student.show', ['student' => $student])}}">{{$student->name}}</a></li>
            </ul>
            @endforeach


            <p><a href="{{ route('projet.edit', ['projet' => $projet])}}">Edit</a></p>

            <form action="{{ route('projet.destroy', ['projet' => $projet]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>

        </div>
    </div>
</x-app-layout>
