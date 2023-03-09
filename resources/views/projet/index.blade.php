<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <p><a href="{{ route('projet.create') }}">Create new projet</a></p>

                @if ($projets->isNotEmpty())
                    <ul>
                        @foreach ($projets as $projet)
                                <li><a href="{{ route('projet.show', $projet) }}">{{ $projet->title }}</a></li>
                                <p><a href="{{ route('projet.edit', ['projet' => $projet->id])}}">Edit</a></p>
                                <form action="{{ route('projet.destroy', ['projet' => $projet->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
