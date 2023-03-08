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
                    <p>
                        <select name="department">
                            <option value=""></option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" @if (old('department') == $department->id) selected @endif>
                                    {{ $department->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    <p>
                        <select name="status">
                            <option value=""></option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}" @if (old('status') == $status->id) selected @endif>
                                    {{ $status->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    <p><button type="submit">Save</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
