<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sheet') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p><a href="{{ route('sheet.index') }}">Back</a></p>
            <h1>{{ $sheet->title }}</h1>
            <p>Description : {{ $sheet->description }}</p>
            <p>Idée : {{ $sheet->link }}</p>
            <p>État : {{ $sheet->state }}</p>

            @endforeach

        </div>
    </div>
</x-app-layout>
