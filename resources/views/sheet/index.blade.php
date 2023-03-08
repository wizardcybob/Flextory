<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sheets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <p><a href="{{ route('sheet.create') }}">Create new sheet</a></p>
                @if ($sheets->isNotEmpty())
                    <ul>
                        @foreach ($sheets as $sheet)
                                <li><a href="{{ route('sheet.show', $sheet) }}">{{ $sheet->title }} </a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
