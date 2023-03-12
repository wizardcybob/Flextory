<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la fiche') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('sheet.update', ['sheet' => $sheet]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p><input type="text" placeholder="title" name="title" value="{{ old('title', $sheet->title) }}"></p>
                    <p>
                        <textarea rows="5" placeholder="description" name="description">{{ old('description', $sheet->description) }}</textarea>
                    </p>
                    <p>
                        <textarea rows="5" placeholder="idea" name="idea">{{ old('idea', $sheet->idea) }}</textarea>
                    </p>
                    <p>
                        <select name="area">
                            <option value=""></option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}" @if ($sheet->area_id == $area->id) selected @endif>
                                    {{ $area->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    <p>
                        <select name="category">
                            <option value=""></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($sheet->category_id == $category->id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    @foreach ($teachers as $teacher)
                        <p>
                            <input type="checkbox" name="teacher[]" id="teacher_{{ $teacher->id }}" value="{{ $teacher->id }}"
                                {{ in_array($teacher->id, old('teacher', $sheet->teachers->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <label for="teacher_{{ $teacher->id }}">{{ $teacher->name }}</label>
                        </p>
                    @endforeach
                    <p>
                        <select name="state">
                            <option value=""></option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}" @if ($sheet->state_id == $state->id) selected @endif>
                                    {{ $state->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    <p><button type="submit">Save</button></p>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
