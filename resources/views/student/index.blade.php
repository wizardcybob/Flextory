<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Étudiants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <p><a href="{{ route('student.create') }}">Create new student</a></p>

                @if ($students->isNotEmpty())
                    <ul>
                        @foreach ($students as $student)
                                <li><a href="{{ route('student.show', $student) }}">{{ $student->name }} </a></li>
                                <p><a href="{{ route('student.edit', ['student' => $student->id])}}">Edit</a></p>

                            <form action="{{ route('student.destroy', ['student' => $student->id]) }}" method="POST">
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
