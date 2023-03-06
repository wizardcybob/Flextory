<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enseignant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @can('create', \App\Models\Teacher::class)
                    <p><a href="{{ route('teacher.create') }}">Create new teacher</a></p>
                @endcan

                @if ($teachers->isNotEmpty())
                    <ul>
                        @foreach ($teachers as $teacher)
                            @can('view', $teacher)
                                <li><a href="{{ route('teacher.show', $teacher) }}">{{ $teacher->name }}</a></li>
                            @endcan
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
