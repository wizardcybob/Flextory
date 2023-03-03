<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a teacher') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('teacher.store') }}" method="POST">
                    @csrf
                    <p><input type="text" placeholder="name" name="name" value="{{ old('name') }}"></p>
                    <p><input type="text" placeholder="permanent" name="permanent" value="{{ old('permanent') }}"></p>
                    @foreach ($departments as $department)
                        <p><input type="checkbox" name="department[]" id="department{{ $department->id }}" value="{{ $department->id }}"><label for="teacher_{{ $department->id }}">{{ $department->name }}</label></p>
                    @endforeach
                    @foreach ($status as $status)
                        <p><input type="checkbox" name="status[]" id="status{{ $status->id }}" value="{{ $status->id }}"><label for="teacher_{{ $status->id }}">{{ $status->name }}</label></p>
                    @endforeach
                    <p><button type="submit">Save</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
