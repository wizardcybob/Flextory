<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zone') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <p><a href="{{ route('area.create') }}">Create new area</a></p>

                @if ($areas->isNotEmpty())
                    <ul>
                        @foreach ($areas as $area)
                                <li><a href="{{ route('area.show', $area) }}">{{ $area->name }} </a></li>
                                <p><a href="{{ route('area.edit', ['area' => $area->id])}}">Edit</a></p>

                            <form action="{{ route('area.destroy', ['area' => $area->id]) }}" method="POST">
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
