<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier l\'enseignant') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('teacher.update', ['teacher' => $teacher]) }}" method="PUT">
                    @csrf
                    <p><input type="text" placeholder="name" name="name" value="{{ $teacher->name }}"></p>
                    <p><input type="text" placeholder="permanent" name="permanent" value="{{ $teacher->permanent }}"></p>
                    @foreach ($departments as $department)
                        @if ($teacher->department->pluck('id')->contains($department->id))
                            <p><input type="checkbox" name="department[]" id="{{ $department->id }}" value="{{ $department->id }}" checked><label for="teacher_{{ $department->id }}">{{ $department->name }}</label></p>
                        @else
                            <p><input type="checkbox" name="department[]" id="{{ $department->id }}" value="{{ $department->id }}"><label for="teacher_{{ $department->id }}">{{ $department->name }}</label></p>
                        @endif
                    @endforeach
                    @foreach ($status as $status)
                        @if ($teacher->status->pluck('id')->contains($status->id))
                            <p><input type="checkbox" name="status[]" id="{{ $status->id }}" value="{{ $status->id }}" checked><label for="teacher_{{ $status->id }}">{{ $status->name }}</label></p>
                        @else
                            <p><input type="checkbox" name="status[]" id="{{ $status->id }}" value="{{ $status->id }}"><label for="teacher_{{ $status->id }}">{{ $status->name }}</label></p>
                        @endif
                    @endforeach

                    <p><button type="submit">Save</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
