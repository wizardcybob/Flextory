<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une fiche') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('sheet.store') }}" method="POST">
                    @csrf
                    <p><input type="text" placeholder="title" name="title" value="{{ old('title') }}"></p>
                    <p><input type="text" placeholder="creator" name="creator" class="hidden" value="{{ $creator }}"></p>
                    <p>
                        <textarea rows="5" placeholder="description" name="description">{{ old('description') }}</textarea>
                    </p>
                    <p><input type="text" placeholder="idea" name="idea" value="{{ old('idea') }}"></p>
                    <p>
                        <select name="area">
                            <option value=""></option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}" @if (old('area') == $area->id) selected @endif>
                                    {{ $area->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    <p>
                        <select name="category">
                            <option value=""></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if (old('category') == $category->id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    Enseignants :
                    @foreach ($teachers as $teacher)
                        <p><input type="checkbox" name="teacher[]" id="teacher{{ $teacher->id }}" value="{{ $teacher->id }}"><label for="sheet{{ $teacher->id }}">{{ $teacher->name }}</label></p>
                    @endforeach
                </select>
            </div>

            <p class="text-tertiary text-xs">*Champs obligatoires.</p>

            <div class="flex justify-end w-full">
                <button class="btn_primary flex justify-center" type="submit" aria-label="Enregistrer les modifications">Enregistrer</button>
            </div>
        </form>
    </div>
</x-app-layout>
