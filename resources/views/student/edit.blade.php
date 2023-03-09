<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier l\'étudiant') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('student.update', ['student' => $student]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p><input type="text" placeholder="name" name="name" value="{{ $student->name }}"></p>
                    <p><input type="text" placeholder="actif" name="actif" value="{{ $student->actif }}"></p>
                    @foreach ($projets as $projet)
                        <p><input type="checkbox" name="projet[]" id="projet_{{ $projet->id }}" value="{{ $projet->id }}" @if(in_array($projet->id, $student->projets->pluck('id')->toArray())) checked @endif><label for="projet_{{ $projet->id }}">{{ $projet->title }}</label></p>
                    @endforeach
                    <p><button type="submit">Save</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
