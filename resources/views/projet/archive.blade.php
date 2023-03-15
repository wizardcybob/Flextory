<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="javascript:history.go(-1)" class="">Retour</a>
                <form method="GET" action="{{ route('projet.searchArchive') }}">
                    <input type="text" name="query" placeholder="Recherche...">
                    <button type="submit">Search</button>
                </form>
                @if(str_contains(url()->current(), 'search'))
                    <a class="btn_primary w-fit" href="{{ route('projet.archive') }}" aria-label="Supprimer la recherche" title="Supprimer la recherche">
                    Supprimer la recherche</a>
                @endif


                @if ($projets->isNotEmpty())
                    <ul>
                        @foreach ($projets as $projet)
                                <li><a href="{{ route('projet.show', $projet) }}">{{ $projet->title }}</a></li>
                                <p><a aria-labelledby="Modifier" href="{{ route('projet.restore', ['projet' => $projet->id])}}">Restore</a></p>
                                <form action="{{ route('projet.forcedelete', ['projet' => $projet->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button aria-labelledby="Supprimer" type="submit">Supprimer</button>
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
