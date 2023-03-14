<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une zone') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('area.store') }}" method="POST">
                    @csrf
                    <p><input type="text" placeholder="Nom" name="name" value="{{ old('name') }}" aria-labelledby="Nom"></p>
                    <p>
                        <textarea rows="5" placeholder="Description" aria-labelledby="Description" name="description">{{ old('description') }} </textarea>
                    </p>
                    <p><input type="text" placeholder="Image" name="image" value="{{ old('image') }}" aria-labelledby="Image"></p>
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
                        <p><input  type="checkbox" name="projet[]" id="projet{{ $projet->id }}" value="{{ $projet->id }}"><label for="student{{ $projet->id }}">{{ $projet->title }}</label></p>
                    @endforeach
                    <p>
                        <select name="image">
                            <option value=""></option>
                            @foreach ($images as $image)
                                <option value="{{ $image->id }}" @if (old('image') == $image->id) selected @endif>
                                    {{ $image->image }}</option>
                            @endforeach
                        </select>
                    </p>
                    <p><button type="submit" aria-labelledby="Valider">Valider</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
