<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p><a href="{{ route('student.index') }}">Back</a></p>
            <h1>{{ $student->name }} {{ $slayer->lastname }}</h1>
            <p>Actif : {{ $student->actif }}</p>

            <h2>projet(s) assigné :</h2>
            @foreach ($student->projets as $projet)
            <ul>
                <li><a href="{{route('projet.show', ['projet' => $projet])}}">{{$projet->title}}</a></li>
            </ul>
            @endforeach

        </div>
    </div>
</x-app-layout>
