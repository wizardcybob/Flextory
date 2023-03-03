<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @can('create', \App\Models\Projet::class)
                    <p><a href="{{ route('student.create') }}">Create new projet</a></p>
                @endcan

                @if ($projets->isNotEmpty())
                    <ul>
                        @foreach ($projets as $projet)
                            @can('view', $projet)
                                <li><a href="{{ route('projet.show', $projet) }}">{{ $projet->name }} {{ $projet->description }}</a></li>
                            @endcan
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
