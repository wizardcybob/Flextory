<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zone') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p><a href="{{ route('area.index') }}">Back</a></p>
            <h1>{{ $area->name }}</h1>
            <p>Description : {{ $area->description }}</p>
            <p>Image : {{ $area->image }}</p>

            <h2>projet(s) assigné :</h2>
            @foreach ($area->projets as $projet)
            <ul>
                <li><a href="{{route('projet.show', ['projet' => $projet])}}">{{$projet->title}}</a></li>
            </ul>
            @endforeach

            <p><a href="{{ route('area.edit', ['area' => $area])}}">Edit</a></p>

            <form action="{{ route('area.destroy', ['area' => $area]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>

        </div>
    </div>
</x-app-layout>
