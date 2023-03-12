<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier l\'enseignant') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('teacher.update', ['teacher' => $teacher]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p><input aria-labelledby="Nom" type="text" placeholder="Nom" name="name" value="{{ $teacher->name }}"></p>
                    <p><input aria-labelledby="Permanent" type="text" placeholder="Permanent" name="permanent" value="{{ $teacher->permanent }}"></p>
                    <p>
                        <select name="department_id">
                            <option value=""></option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" @if ($teacher->department_id == $department->id) selected @endif>
                                    {{ $department->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    <p>
                        <select name="status_id">
                            <option value=""></option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}" @if ($teacher->status_id == $status->id) selected @endif>
                                    {{ $status->name }}</option>
                            @endforeach
                        </select>
                    </p>

                    <p><button aria-labelledby="Valider" type="submit">Valider</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
