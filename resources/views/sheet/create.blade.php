<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a sheet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('sheet.store') }}" method="POST">
                    @csrf
                    <p><input type="text" placeholder="title" name="title" value="{{ old('title') }}"></p>
                    <p>
                        <textarea rows="5" placeholder="description" name="description">{{ old('description') }}</textarea>
                    </p>
                    <p><input type="text" placeholder="idea" name="idea" value="{{ old('idea') }}"></p>
                    <p><input type="int" placeholder="state" name="state" value="{{ old('state') }}"></p>
                    <p>
                        <select name="area">
                            <option value=""></option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}" @if (old('area') == $area->id) selected @endif>
                                    {{ $area->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    <p><button type="submit">Save</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
