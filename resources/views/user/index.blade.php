<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilisateur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="GET" action="{{ route('user.search') }}">
                    <input type="text" name="query" placeholder="Search...">
                    <button type="submit">Rechercher</button>
                </form>
                    <p><a href="{{ route('user.create') }}">Create new user</a></p>

                @if ($users->isNotEmpty())
                    <ul>
                        @foreach ($users as $user)
                                <li><a href="{{ route('user.show', $user) }}">{{ $user->name }}</a></li>
                                @if ($user->role == 1)
                                <li>SuperAdmin</li>
                                @elseif ($user->role == 2)
                                <li>Admin</li>
                                @elseif ($user->role == 3)
                                <li>Éditeur</li>
                                @elseif ($user->role == 4)
                                <li>Étudiant</li>
                                @endif
                                <p><a aria-labelledby="Modifier" href="{{ route('user.edit', ['user' => $user->id])}}">Modifier</a></p>

                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
