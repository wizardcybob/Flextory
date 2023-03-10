<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create an area') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('area.store') }}" method="POST">
                    @csrf
                    <p><input type="text" placeholder="name" name="name" value="{{ old('name') }}"></p>
                    <p>
                        <textarea rows="5" placeholder="description" name="description">{{ old('description') }}</textarea>
                    </p>
                    <p><input type="text" placeholder="image" name="image" value="{{ old('image') }}"></p>
                    <p>
                        <select name="adearea">
                            <option value=""></option>
                            @foreach ($adeareas as $adearea)
                                <option value="{{ $adearea->id }}" @if (old('adearea') == $adearea->id) selected @endif>
                                    {{ $adearea->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    @foreach ($projets as $projet)
                        <p><input type="checkbox" name="projet[]" id="projet{{ $projet->id }}" value="{{ $projet->id }}"><label for="student{{ $projet->id }}">{{ $projet->title }}</label></p>
                    @endforeach
                    <p><button type="submit">Save</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
