<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sheets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="GET" action="{{ route('sheet.search') }}">
                    <input type="text" name="query" placeholder="Search...">
                    <button type="submit">Search</button>
                </form>
                    <p><a href="{{ route('sheet.create') }}">Create new sheet</a></p>
                    @if ($sheets->isNotEmpty())
                    <ul>
                        @foreach ($sheets as $sheet)
                            <li><a href="{{ route('sheet.show', $sheet) }}">{{ $sheet->title }} </a></li>
                            <p><a href="{{ route('sheet.edit', ['sheet' => $sheet->id])}}">Edit</a></p>
                            <form action="{{ route('sheet.destroy', ['sheet' => $sheet->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        @endforeach
                    </ul>
                @else
                    <p>Aucun résultat</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
